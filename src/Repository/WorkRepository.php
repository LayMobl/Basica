<?php

namespace App\Repository;

use App\Entity\Work;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

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

    public function findByTags(object $tags, int $id)
    {
         $qb=$this->createQueryBuilder('w')
             ->select('w')
             ->leftJoin('w.tags','tags')
             ->addSelect('tags','w');
         if(is_iterable($tags)){
            foreach ($tags as $tag) {
                $qb->where($qb->expr()->notIn('w.id', $id))
                   ->andWhere(':val MEMBER OF w.tags')->setParameter('val', $tag);

            }
        }else{
             $qb->where($qb->expr()->notIn('w.id', $id))
                ->andWhere(':val MEMBER OF w.tags')->setParameter('val', $tags);
         }
            return $qb->getQuery() ->getResult();
    }

    // /**
    //  * @return Work[] Returns an array of Work objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Work
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
