<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FormControllerTest extends WebTestCase
{
    public function setUp()
    {
        $this->client = static::createClient();
    }

    public function testSimpleForm()
    {
        $crawler = $this->client->request('GET', '/form/simple');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertContains('Make it work!', $crawler->filter('#form_title')->attr('value'));
        $this->assertContains('Create Task', $crawler->filter('button')->text());
    }

    public function testFormFromClass()
    {
        $crawler = $this->client->request('GET', '/form/class');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertContains('Make it work!', $crawler->filter('#task_title')->attr('value'));
        $this->assertContains('Create Task', $crawler->filter('button')->text());
    }
}
