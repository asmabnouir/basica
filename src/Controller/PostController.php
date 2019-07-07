<?php
/*
  ./src/Controller/PostController.php
*/
namespace App\Controller;
use Ieps\Core\GenericController;
use App\Entity\Post;
use Symfony\Component\HttpFoundation\Request;
Use Knp\Component\Pager\PaginatorInterface;

class PostController extends GenericController {
/**
 * [indexAction La liste des posts]
 * @return [la vue index des posts]
 */
public function indexAction(Request $request, PaginatorInterface $paginator, int $limit = null, string $vue = 'index' ){
  $request = Request::createFromGlobals();
  $all = $this->_repository->findBy([], ["date" => "DESC"]);
  $posts = $paginator->paginate(
    $all,
    $request->query->getInt('page', 1),
    $limit
  );
  return $this->render('posts/'.$vue.'.html.twig',[
    'vue'  => $vue,
    'posts'=> $posts,
    'limit'=> $limit
  ]);
}

}
