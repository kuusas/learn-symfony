<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Welcome to Symfony', $crawler->filter('#container h1')->text());
    }

    public function testIndexAndProfile()
    {
        $client = static::createClient();
        $client->enableProfiler();

        $crawler = $client->request('GET', '/');

        $profile = $client->getProfile();

        $this->assertLessThan(
            1,
            $profile->getCollector('db')->getQueryCount()
        );

        $this->assertLessThan(
            1,
            $profile->getCollector('db')->getQueryCount(),
            sprintf(
                'Checks that query count is less than 1 (token %s)',
                $profile->getToken()
            )
        );
    }
}
