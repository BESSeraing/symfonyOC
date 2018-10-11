<?php
namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class AdvertController extends Controller
{
    
    public function indexAction($page, Request $request){
        
        dump($request->query->get('tag')); //variable $_GET['tag']
        dump($request->request->get('tag'));//variable $_POST['tag']
        dump($request);
        if ($request->isMethod(Request::METHOD_POST)){
            dump("methode post");
        }
        elseif ($request->isMethod(Request::METHOD_GET)){
            dump("methode get");
        }
        
        if ($request->isXmlHttpRequest()){
            dump("ajax request");
        }
        dump($page);
        
        return new Response("Vous voyez la page ".$page."</body>");
    }
    
    public function viewAction($id){
        
        //Réponse simple
        /* 
        $response = new Response();
        
        $response->setStatusCode(Response::HTTP_NOT_FOUND);
        $response->setContent("ekufhgaqfs");
        return $response;
        */
//        
//        $response = new Response(); //Methode sans raccourci
//        $response->setContent($this->get('twig')->render("@OCPlatform/Default/index.html.twig"));
//        return $response;
        //Raccourci de controller
        return $this->render("@OCPlatform/Default/index.html.twig",['id'=>$id]);
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
    

}