<?php
/*
  ./src/Controller/PostController.php
*/
namespace App\Controller;
use Ieps\Core\GenericController;
use App\Entity\Post;
use App\Form\PostType;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


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
    public function indexAction(Request $request, PaginatorInterface $paginator, int $limit = null, string $vue = 'index'){
      $allPosts = $this->_repository->findBy([], ["date" => "DESC"]);
      $posts = $paginator->paginate(
        $allPosts,
        $request->query->getInt('page', substr($_SERVER["QUERY_STRING"],5) ),
        $limit
      );
      return $this->render('posts/'. $vue .'.html.twig',[
        'posts' => $posts
      ]);
    }

}
