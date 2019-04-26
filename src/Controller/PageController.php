<?php
/*
  ./src/Controller/PageController.php
*/
namespace App\Controller;
use Ieps\Core\GenericController;
use App\Entity\Page;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class PageController
 * @package App\Controller
 */
class PageController extends GenericController {

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * Vue index des pages avec sa variable
     */
    public function indexAction(){
      $pages = $this->_repository->findAll();
      return $this->render('pages/index.html.twig',[
        'pages' => $pages
      ]);
    }

}
