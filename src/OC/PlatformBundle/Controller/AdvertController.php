<?php
namespace OC\PlatformBundle\Controller;

use OC\PlatformBundle\Entity\Advert;
use OC\PlatformBundle\Entity\Comment;
use OC\PlatformBundle\Repository\AdvertRepository;
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
        
        
        return $this->render("@OCPlatform/Advert/index.html.twig",["listAdverts"=>$this->getAdverts()]);
    }
    
    
    
    public function viewAction($id){
        $advertRepository = $this->get('doctrine.orm.entity_manager')->getRepository("OCPlatformBundle:Advert");
        $commentRepo = $this->get('doctrine.orm.entity_manager')->getRepository("OCPlatformBundle:Comment");
        
        $advert = $advertRepository->findOneBy([],['id'=>"DESC"]);
        $comments = $commentRepo->findBy(['advert'=>$advert]);
        
        
        return $this->render("@OCPlatform/Advert/view.html.twig",['advert'=>$advert,'comments'=>$comments]);
  
    }
    
    public function addAction(){
        
        $advert = new Advert();
        $advert->setAuthor("Gauthier");
        $advert->setTitle("Une vache est morte ce matin avec comment."); // Inspiration de Gauthier.
        $advert->setContent("une sombre histoire de chevalier noir, de tête détachée du corps. Cela s'est passé à Seraing. ");
        
        $comment = new Comment();
        $comment->setAuthor('Cédric');
        $comment->setContent('Je ne pense pas grand chose de cette histoire sans queue ni tête');
        $comment->setAdvert($advert);
        
        
        
        $this->get('doctrine.orm.entity_manager')->persist($advert);
        $this->get('doctrine.orm.entity_manager')->persist($comment);
        $this->get('doctrine.orm.entity_manager')->flush();
            
        
        return $this->render("@OCPlatform/Advert/add.html.twig");
    }

    public function editAction($id){

        $advert = $this->getAdverts()[$id-1];
        return $this->render("@OCPlatform/Advert/edit.html.twig",['advert'=>$advert]);   
    }
    
    public function deleteAction($id){

    }
    
    public function menuAction(){
        return $this->render("@OCPlatform/Advert/menu.html.twig");
    }
    

}