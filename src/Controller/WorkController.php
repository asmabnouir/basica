<?php
/*
  ./src/Controller/WorkController.php
*/
namespace App\Controller;
use Ieps\Core\GenericController;
use App\Entity\Work;
use Symfony\Component\HttpFoundation\Request;

class WorkController extends GenericController {
/**
 * [indexAction La liste des works]
 * @return [la vue index des works]
 */
public function indexAction(string $vue= 'index' , int $limit = null){
  $works = $this->_repository->findBy([],['date'=> 'DESC'], $limit);
  return $this->render('works/'.$vue.'.html.twig',[
    'works'=> $works,
    'limit'=> $limit

  ]);
}
public function similarAction(Work $param, string $vue= 'index' ){
  $works = $this->_repository->findSimilarByTag($param->getTags());
  return $this->render('works/'.$vue.'.html.twig',[
    'works'=> $works,
    'param'=>$param

  ]);
}


function oldersAction(int $limit = null, Request $request){
  $offset = $request->request->get('offset');
  $works = $this->_repository->findBy([],['date'=> 'DESC'], $limit =6 , $offset
  );
  return $this->render('works/index.html.twig',[
    'works'=> $works,
  ]);
}


}
