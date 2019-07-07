<?php
/*
  ./src/Controller/PostController.php
*/
namespace App\Controller;
use Ieps\Core\GenericController;
use App\Entity\Tag;
use Symfony\Component\HttpFoundation\Request;

class TagController extends GenericController {
/**
 * [indexAction La liste des tags]
 * @return [la vue index des tags]
 */
public function indexAction(string $vue = 'index' , int $limit = null ){
  $tags = $this->_repository->findBy([],[],$limit
  );
  return $this->render('tags/'.$vue.'.html.twig',[
    'vue'  => $vue,
    'tags'=> $tags,
    'limit'=> $limit
  ]);
}


}
