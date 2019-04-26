<?php
/*
  ./src/Controller/PostController.php
*/
namespace App\Controller;
use Ieps\Core\GenericController;
use App\Entity\Post;
use App\Form\PostType;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class PostController
 * @package App\Controller
 */
class PostController extends GenericController {


    /**
     * @param int|null $limit
     * @param string $vue
     * @return \Symfony\Component\HttpFoundation\Response
     * Vue index des posts avec sa variable
     */
    public function indexAction(int $limit = null, string $vue = 'index'){
      $posts = $this->_repository->findBy([], ["date" => "DESC"], $limit);
      return $this->render('posts/'. $vue .'.html.twig',[
        'posts' => $posts
      ]);
    }

}
