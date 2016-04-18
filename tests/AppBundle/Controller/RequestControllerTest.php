<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RequestControllerTest extends WebTestCase
{
    public function setUp()
    {
        $this->client = static::createClient();
    }

    public function testSimple()
    {
        $crawler = $this->client->request('GET', '/request/simple');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertContains('Hello Mr. Simple', $crawler->filter('body')->text());
    }

    public function testIsNotAjax()
    {
        $crawler = $this->client->request('GET', '/request/is-ajax');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertContains('false', $this->client->getResponse()->getContent());
    }

    public function testIsAjax()
    {
        $crawler = $this->client->request('GET', '/request/is-ajax', [], [], ['HTTP_X-Requested-With' => 'XMLHttpRequest']);
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertContains('true', $this->client->getResponse()->getContent());
    }

    public function testPreferredLanguage()
    {
        $crawler = $this->client->request('GET', '/request/preferred-language');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertContains('en', $this->client->getResponse()->getContent());
    }

    public function testGETParameters()
    {
        $crawler = $this->client->request('GET', '/request/query', ['foo' => 'bar']);
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertContains('bar', $this->client->getResponse()->getContent());
    }

    public function testGETParametersDoestNotContainRequestParameters()
    {
        $crawler = $this->client->request('POST', '/request/query', ['foo' => 'bar']);
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertContains('NULL', $this->client->getResponse()->getContent());   
    }

    public function testPOSTParameters()
    {
        $crawler = $this->client->request('POST', '/request/request', ['bar' => 'foo']);
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertContains('foo', $this->client->getResponse()->getContent());
    }

    public function testPOSTParametersDoestNotContainQueryParameters()
    {
        $crawler = $this->client->request('GET', '/request/request?bar=foo');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertContains('NULL', $this->client->getResponse()->getContent());
    }

    public function testServerVariables()
    {
        $crawler = $this->client->request('GET', '/request/server');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertContains('localhost', $this->client->getResponse()->getContent());
    }
}
