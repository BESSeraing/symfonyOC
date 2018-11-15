<?php

namespace OC\PlatformBundle\Command;

use OC\PlatformBundle\Entity\Advert;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class FixNullSlugCommand extends ContainerAwareCommand
{
    const ARGUMENT_SAVE = "s";
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('ocplatform:fix_null_slug')
            ->addArgument(self::ARGUMENT_SAVE,InputArgument::OPTIONAL,"pour dire s'il faut sauver",false)
            ->setDescription('This will fix null slug on existings items');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');
        $repo = $em->getRepository(Advert::class);
        /**
         * @var Advert[] $adverts
         */
        $adverts = $repo->findAll();
        
        foreach ($adverts as $advert){
            $newTitle = $advert->getTitle()." ";
            $output->writeln("advert slug set to ".$newTitle);
            $advert->setTitle($newTitle);
        }
        if ($input->getArgument(self::ARGUMENT_SAVE)){
            $output->writeln("saving all modifications");
            $em->flush();    
        }
        else{
            $output->writeln("This was a warmup round. To save modification add -s argument");
        }
        
    }
}
