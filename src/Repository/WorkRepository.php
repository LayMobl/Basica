<?php

namespace App\Repository;

use App\Entity\Work;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use App\Entity\Tag;

/**
 * @method Work|null find($id, $lockMode = null, $lockVersion = null)
 * @method Work|null findOneBy(array $criteria, array $orderBy = null)
 * @method Work[]    findAll()
 * @method Work[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WorkRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Work::class);
    }

    /**
     * @param $tags
     * @param int $id
     * @return mixed
     * Renvoie la liste des works ayant le meme tag
     */
    public function findByTags($tags, int $id)
    {
         $qb=$this->createQueryBuilder('w')
             ->select('w')
             ->leftJoin('w.tags','tags')
             ->addSelect('tags','w');
         // Si tags dispose de plusieurs enregitrements
         if(is_iterable($tags)){
            foreach ($tags as $tag) {
                // Je sélectionne les projets ayant les meme tags sauf le projet en show
                $qb->where($qb->expr()->notIn('w.id', $id))
                   ->andWhere(':tag MEMBER OF w.tags')->setParameter('tag', $tag);

            }
            // Sinon j'affiche le work ayant le même tag
        }else{
             // Je sélectionne le projet ayant les meme tags sauf le projet en show
             $qb->where($qb->expr()->notIn('w.id', $id))
                ->andWhere(':tag MEMBER OF w.tags')->setParameter('tag', $tags);
         }
            return $qb->getQuery()->getResult();
    }

}
