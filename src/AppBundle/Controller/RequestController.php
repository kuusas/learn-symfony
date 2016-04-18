<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/request")
 */
class RequestController extends Controller
{
    /**
     * Is it an ajax request?
     * @Route("/is-ajax", name="request")
     */
    public function isAjaxAction(Request $request)
    {
        return $this->response($request->isXmlHttpRequest(), true);
    }

    /**
     * Get preferred language
     * @Route("/preferred-language", name="request_preferred_language")
     */
    public function preferredLanguageAction(Request $request)
    {
        return $this->response($request->getPreferredLanguage(array('lt', 'en', 'fr')));
    }

    /**
     * Retrieve GET variables
     * @Route("/query", name="request_query")
     */
    public function queryAction(Request $request)
    {
        return $this->response($request->query->get('foo'));
    }

    /**
     * Retrieve POST variables
     * @Route("/request", name="request_request")
     */
    public function requestAction(Request $request)
    {
        return $this->response($request->request->get('bar'));
    }

    /**
     * Retrieve SERVER variables
     * @Route("/server", name="request_server")
     */
    public function serverAction(Request $request)
    {
        return $this->response($request->server->get('HTTP_HOST'));
    }

    /**
     * @Route("/simple", name="simple")
     */
    public function simpleAction(Request $request)
    {
        // retrieves an instance of UploadedFile identified by foo
        $request->files->get('foo');

        // retrieve a COOKIE value
        $request->cookies->get('PHPSESSID');

        // retrieve an HTTP request header, with normalized, lowercase keys
        $request->headers->get('host');
        $request->headers->get('content_type');

        return new Response('<html><body>Hello Mr. Simple!</body></html>');
    }

    private function response($value)
    {
        return new Response(var_export($value, true));
    }
}
