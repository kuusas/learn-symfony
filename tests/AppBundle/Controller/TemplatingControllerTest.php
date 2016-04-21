<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class TemplatingControllerTest extends WebTestCase
{
    public function setUp()
    {
        $this->client = static::createClient();
    }

    public function testStaticPageTemplate()
    {
        $crawler = $this->client->request('GET', '/contacts');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertContains('Contacts', $crawler->filter('h1')->text());
    }
}
