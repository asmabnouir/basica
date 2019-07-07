<?php
/*
  ./src/Controller/PageController.php
*/
namespace App\Controller;
use Ieps\Core\GenericController;
use App\Entity\Page;
use Symfony\Component\HttpFoundation\Request;

class PageController extends GenericController {
/**
 * [indexAction La liste des pages]
 * @return [la vue index des pages]
 */
public function indexAction(Request $request, $current_path, $currentId){
  $pages = $this->_repository->findAll();
  return $this->render('pages/index.html.twig',[
    'pages'=> $pages,
     'currentId' => $currentId,
     'current_path' => $current_path
  ]);

}

}
