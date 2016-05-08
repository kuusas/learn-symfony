<?php

namespace Tests\AppBundle;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FrameworkObjectsAccessTest extends WebTestCase
{
    public function setUp()
    {
        $this->client = static::createClient();
    }

    public function testHistoryObjectAccess()
    {
        $object = $this->client->getHistory();
        $this->assertInstanceOf('Symfony\Component\BrowserKit\History', $object);
    }

    public function testCookieJarAccess()
    {
        $object = $this->client->getCookieJar();
        $this->assertInstanceOf('Symfony\Component\BrowserKit\CookieJar', $object);
    }

    public function testHttpKernelRequestAccess()
    {
        $object = $this->client->getRequest();
        $this->assertNull($object);
        
        $this->client->request('GET', '/');
        $object = $this->client->getRequest();
        $this->assertInstanceOf('Symfony\Component\HttpFoundation\Request', $object);
    }

    public function testInternalBrowserKitRequestAccess()
    {
        $object = $this->client->getInternalRequest();
        $this->assertNull($object);

        $this->client->request('GET', '/');
        $object = $this->client->getRequest();
        $this->assertInstanceOf('Symfony\Component\HttpFoundation\Request', $object);
    }

    public function testHttpKernelResponseAccess()
    {
        $object = $this->client->getResponse();
        $this->assertNull($object);
        
        $this->client->request('GET', '/');
        $object = $this->client->getResponse();
        $this->assertInstanceOf('Symfony\Component\HttpFoundation\Response', $object);
    }

    public function testInternalBrowserKitResponseAccess()
    {
        $object = $this->client->getInternalResponse();
        $this->assertNull($object);

        $this->client->request('GET', '/');
        $object = $this->client->getInternalResponse();
        $this->assertInstanceOf('Symfony\Component\BrowserKit\Response', $object);
    }

    public function testCrawlerObjectAccess()
    {
        $object = $this->client->getCrawler();
        $this->assertNull($object);

        $this->client->request('GET', '/');
        $object = $this->client->getCrawler();
        $this->assertInstanceOf('Symfony\Component\DomCrawler\Crawler', $object);
    }

    public function testContainerAccess()
    {
        $object = $this->client->getContainer();
        $this->assertInstanceOf('appTestDebugProjectContainer', $object);
    }
}
