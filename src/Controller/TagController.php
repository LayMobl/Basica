<?php
/*
  ./src/Controller/TagController.php
*/
namespace App\Controller;
use Ieps\Core\GenericController;
use App\Entity\Tag;


/**
 * Class TagController
 * @package App\Controller
 */
class TagController extends GenericController {

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * Vue index des tags avec sa variable
     */
    public function indexAction(){
      $tags = $this->_repository->findAll();
      return $this->render('tags/index.html.twig',[
        'tags' => $tags
      ]);
    }

}
