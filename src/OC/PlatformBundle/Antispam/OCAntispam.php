<?php
namespace OC\PlatformBundle\Antispam;

/**
 * Created by PhpStorm.
 * User: demo
 * Date: 23/10/18
 * Time: 9:32
 */
class OCAntispam
{
    /**
     * @var int
     */
    private $spamLength;

    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    /**
     * @var String
     */
    private $locale;

    /**
     * OCAntispam constructor.
     * @param $spamLength
     * @param $mailer
     * @param $locale
     */
    public function __construct(int $spamLength, \Swift_Mailer $mailer, String $locale)
    {
        $this->spamLength = $spamLength;
        $this->mailer = $mailer;
        $this->locale = $locale;
    }


    /**
     * @param $text
     * @return bool
     */
    public function isSpam($text): bool {
        
        return strlen($text)<$this->spamLength;
    }

}