<?php
namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class AdvertController extends Controller
{
    private function getAdverts(){
      return [
          ['id'=>1,"title"=>"title 1","author"=>"Gauthier","date"=>new \DateTime(),"content"=>"Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker."],
          ['id'=>2,"title"=>"title 2","author"=>"Fanny","date"=>new \DateTime("1/4/1999"),"content"=>"Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker."],
          ['id'=>3,"title"=>"title 3","author"=>"Anthony","date"=>new \DateTime("1/4/1998"),"content"=>"Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker."],
      ];  
    } 
    
    public function indexAction($page, Request $request) {
        
        
        return $this->render("@OCPlatform/Default/index.html.twig",["listAdverts"=>$this->getAdverts()]);
    }
    
    
    
    public function viewAction($id){
        
        
        return $this->render("@OCPlatform/Default/view.html.twig",['advert'=>$this->getAdverts()[$id-1]]);
//        
//        return $this->get('twig')->render("@OCPlatform/Default/index.html.twig");
//        
        
        
    }
    
    public function addAction(){
        return $this->redirectToRoute("oc_platform_homepage");
    }

    public function editAction($id){    
//        $responseContent = json_encode(['format'=>["message"=>"this is a json format","toto"=>"yolo"]]);
//        $response = new Response();
//        $response->headers->set('Content-Type', 'application/json');
//
//        $response->setContent($responseContent);
//        
//        return $response;
        
        return new JsonResponse(['format'=>["message"=>"this is a json format","toto"=>"yolo"]]);
    }
    
    public function deleteAction($id){

    }
    
    public function menuAction(){
        return $this->render("@OCPlatform/Default/menu.html.twig");
    }
    

}