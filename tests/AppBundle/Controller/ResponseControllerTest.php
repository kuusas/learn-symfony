<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ResponseControllerTest extends WebTestCase
{
    public function setUp()
    {
        $this->client = static::createClient();
    }

    public function testSuccess()
    {
        $crawler = $this->client->request('GET', '/response/success');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertContains('Great success!', $crawler->filter('body')->text());
    }

    public function testShittySuccess()
    {
        $crawler = $this->client->request('GET', '/response/success/Shitty');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertContains('Shitty success!', $crawler->filter('body')->text());
    }

    public function testJsonHardWay()
    {
        $crawler = $this->client->request('GET', '/response/json-hard');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertContains('{"name":"John"}', $this->client->getResponse()->getContent());
        $this->assertTrue(
            $this->client->getResponse()->headers->contains('Content-Type', 'application/json')
        );
    }

    public function testJson()
    {
        $crawler = $this->client->request('GET', '/response/json');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertContains('{"name":"John"}', $this->client->getResponse()->getContent());
        $this->assertTrue(
            $this->client->getResponse()->headers->contains('Content-Type', 'application/json')
        );
    }

    public function testRedirectToExactUrl()
    {
        $crawler = $this->client->request('GET', '/response/redirect');
        $this->assertTrue(
            $this->client->getResponse()->isRedirect('/response/success')
        );
    }

    public function testRedirectToAnyUrl()
    {
        $crawler = $this->client->request('GET', '/response/redirect');
        $this->assertTrue(
            $this->client->getResponse()->isRedirect()
        );
    }

    public function testForward()
    {
        $crawler = $this->client->request('GET', '/response/forward');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertContains('Success!', $crawler->filter('body')->text());
    }
}
