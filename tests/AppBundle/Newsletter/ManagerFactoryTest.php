<?php

namespace Tests\AppBundle\Newsletter;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ManagerFactoryTest extends WebTestCase
{
    public function testStaticManagerFactoryCreatesManagerInstance()
    {
        $manager = static::createClient()->getContainer()->get('newsletter_manager');
        $this->assertInstanceOf('AppBundle\Newsletter\Manager', $manager);
        $this->assertNull($manager->getTemplating());
    }

    public function testManagerFactoryAsServiceCreatesManagerInstance()
    {
        $manager = static::createClient()->getContainer()->get('newsletter_manager_2');
        $this->assertInstanceOf('AppBundle\Newsletter\Manager', $manager);
        $this->assertInstanceOf(
            'Symfony\Component\Templating\EngineInterface',
            $manager->getTemplating()
        );
    }
}
