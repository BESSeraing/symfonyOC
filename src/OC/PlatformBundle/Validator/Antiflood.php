<?php
namespace OC\PlatformBundle\Validator;

use Doctrine\Common\Annotations\Annotation\Target;
use Symfony\Component\Validator\Constraint;


/**
 * @Annotation
 */
class Antiflood extends Constraint
{
    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
    
    public function validatedBy()
    {
        return get_class($this).'Validator'; 
    }


    public $message = "espèce de petit flooder, on va te chercher et te retrouver,..";
}