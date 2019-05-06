<?php
/*
  ./src/Controller/WorkController.php
*/
namespace App\Controller;
use Ieps\Core\GenericController;
use App\Entity\Work;
use App\Form\WorkType;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class WorkController
 * @package App\Controller
 */
class WorkController extends GenericController {


    /**
     * @param int|null $limit
     * @param string $vue
     * @return \Symfony\Component\HttpFoundation\Response
     * Vue index des works avec sa variable
     */


    public function indexAction(int $limit = null, string $vue = 'index'){
      $works = $this->_repository->findBy([], ["date" => "DESC"], $limit);
      return $this->render('works/'. $vue .'.html.twig',[
        'works' => $works
      ]);
    }

    /**
     * @param string $vue
     * @return \Symfony\Component\HttpFoundation\Response
     * Vue slider des works avec sa variable vitrine
     */
    public function sliderAction(string $vue){
      $works = $this->_repository->findBy(["vitrine" => 1], ["date" => "DESC"]);
      return $this->render('works/'. $vue .'.html.twig',[
        'works' => $works
      ]);
    }

    /**
     * @param Work $entity
     * @param string $vue
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\Response
     * Vue index des works en fonction des tags
     */
    public function similarAction(Work $entity, string $vue, int $id) {
        $works = $this->_repository->findByTags($entity->getTags(), $id);
        return $this->render('works/'. $vue .'.html.twig',[
          'works' => $works
        ]);
    }

    /**
     * @param string $vue
     * @param int|null $limit
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * Vue index des works avec sa variable pour l'ajax
     */
    public function moreAction(string $vue = 'more', int $limit = null, Request $request) {
        $offset = $request->request->get('offset');
        $works = $this->_repository->findBy([], ["date" => "DESC"],$limit=6,$offset);
        return $this->render('works/'.$vue.'.html.twig',[
          'works' => $works
        ]);
    }

}
