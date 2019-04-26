<?php
/*
  ./src/Controller/CategoryController.php
*/
namespace App\Controller;
use Ieps\Core\GenericController;
use App\Entity\Category;


/**
 * Class CategoryController
 * @package App\Controller
 */
class CategoryController extends GenericController {

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * Vue index des categorys avec sa variable
     */
    public function indexAction(){
      $categories = $this->_repository->findAll();
      return $this->render('categorys/index.html.twig',[
        'categorys' => $categories
      ]);
    }

}
