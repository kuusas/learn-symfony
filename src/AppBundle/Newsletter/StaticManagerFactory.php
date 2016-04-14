<?php

namespace AppBundle\Newsletter;

class StaticManagerFactory
{
    public static function createNewsletterManager()
    {
        $manager = new Manager();

        return $manager;
    }
}
