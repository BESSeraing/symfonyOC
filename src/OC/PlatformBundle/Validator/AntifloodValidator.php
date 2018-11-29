<?php
/**
 * Created by PhpStorm.
 * User: demo
 * Date: 22/11/18
 * Time: 11:28
 */

namespace OC\PlatformBundle\Validator;


use OC\PlatformBundle\Entity\Comment;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class AntifloodValidator extends ConstraintValidator
{

    /**
     * Checks if the passed value is valid.
     *
     * @param mixed $value The value that should be validated
     * @param Constraint $constraint The constraint for the validation
     */
    public function validate($value, Constraint $constraint)
    {
        if (strlen($value->getContent())<3){
            $this->context->buildViolation($constraint->message)
//                ->setParameter('{{ string }}', $value)
                ->addViolation();    
        }
        
    }
}