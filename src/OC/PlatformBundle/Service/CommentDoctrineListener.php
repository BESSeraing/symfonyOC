<?php
namespace OC\PlatformBundle\Service;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\Event\LifecycleEventArgs;
use OC\PlatformBundle\Entity\Comment;


/**
 * Created by PhpStorm.
 * User: demo
 * Date: 8/11/18
 * Time: 12:15
 */
class CommentDoctrineListener
{
    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    private $mailerFrom;

    /**
     * CommentDoctrineListener constructor.
     * @param \Swift_Mailer $mailer
     * @param $mailerFrom
     */
    public function __construct(\Swift_Mailer $mailer, $mailerFrom)
    {
        $this->mailer = $mailer;
        $this->mailerFrom = $mailerFrom;
    }


    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        if ($entity instanceof Comment){
            $this->sendNewCommentEmail($entity);
        }
    }
    
    
    private function sendNewCommentEmail(Comment $comment){
        $message = new \Swift_Message();
        $message->setSubject("NOUVEAU COMMENTAIRE");
        $message->setBody("Nouveau commentaire qui dit ceci : '".$comment->getContent()."'");
        $message->setTo("jonathan.cambier@gmail.com");
        $message->setFrom($this->mailerFrom);
        
        $this->mailer->send($message);
    }
    
}