<?php

namespace AppBundle\Newsletter;

use Symfony\Component\Templating\EngineInterface;

class ManagerFactory
{
    public function createNewsletterManager(EngineInterface $templating)
    {
        $manager = new Manager($templating);

        return $manager;
    }
}
