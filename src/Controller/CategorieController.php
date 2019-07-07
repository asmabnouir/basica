<?php
/*
  ./src/Controller/PostController.php
*/
namespace App\Controller;
use Ieps\Core\GenericController;
use App\Entity\Categorie;
use Symfony\Component\HttpFoundation\Request;

class CategorieController extends GenericController {
  /**
   * [indexAction La liste des categories]
   * @return [la vue index des categories]
   */
public function indexAction(string $vue = 'index' , int $limit = null ){
  $categories = $this->_repository->findBy([],[],$limit
  );
  //var_dump($categories[0]->getNomFr());
  return $this->render('categories/'.$vue.'.html.twig',[
    'vue'  => $vue,
    'categories'=> $categories,
    'limit'=> $limit
  ]);
}


}
