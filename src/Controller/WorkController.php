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

    public function sliderAction(string $vue){
      $works = $this->_repository->findBy(["vitrine" => 1], ["date" => "DESC"]);
      return $this->render('works/'. $vue .'.html.twig',[
        'works' => $works
      ]);
    }

    public function similarAction(string $vue) {
        $works = $this->_repository->findByTags();
        return $this->render('works/'. $vue .'.html.twig',[
          'works' => $works
        ]);
    }

    public function moreAction(string $vue = 'more', int $limit = null, int $offest = null) {
        $works = $this->_repository->findBy([],["date" => "DESC"], $limit = 6, $offset = 6);
        return $this->render('works/'.$vue.'.html.twig',[
          'works' => $works
        ]);
    }

}
