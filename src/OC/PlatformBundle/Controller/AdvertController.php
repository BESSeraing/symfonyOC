<?php
namespace OC\PlatformBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class AdvertController extends Controller
{
    
    public function indexAction($page){
        dump($page);
        return new Response("Vous voyez la page ".$page);
    }
    
    public function viewAction($id){
        
    }
    
    public function addAction(){
        
    }

    public function editAction($id){

    }
    
    public function deleteAction($id){

    }

}