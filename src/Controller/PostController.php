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

  public function indexAction(Request $request, int $limit = null, string $vue = 'index'){
    $posts = $this->_repository->findBy([], ["date" => "DESC"], $limit);
    return $this->render('posts/'. $vue .'.html.twig',[
      'posts' => $posts
    ]);
  }

    /**
     * @param int|null $limit
     * @param string $vue
     * @return \Symfony\Component\HttpFoundation\Response
     * Vue index des posts avec sa variable
     */
    public function indexActionPage(Request $request, PaginatorInterface $paginator, int $limit = null, string $vue = 'index'){
      $request = Request::createFromGlobals();
      $allPosts = $this->_repository->findBy([], ["date" => "DESC"]);
      $posts = $paginator->paginate(
        $allPosts,
        $request->query->getInt('page', 1),
        $limit
      );
      return $this->render('posts/'. $vue .'.html.twig',[
        'posts' => $posts
      ]);
    }



}
