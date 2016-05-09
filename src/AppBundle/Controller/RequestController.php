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
     *
     * @Route("/is-ajax", name="request")
     */
    public function isAjaxAction(Request $request)
    {
        return $this->response($request->isXmlHttpRequest(), true);
    }

    /**
     * Get preferred language
     *
     * @Route("/preferred-language", name="request_preferred_language")
     */
    public function preferredLanguageAction(Request $request)
    {
        return $this->response($request->getPreferredLanguage(array('lt', 'en', 'fr')));
    }

    /**
     * Retrieve GET variables
     *
     * @Route("/query", name="request_query")
     */
    public function queryAction(Request $request)
    {
        return $this->response($request->query->get('foo'));
    }

    /**
     * Retrieve POST variables
     *
     * @Route("/request", name="request_request")
     */
    public function requestAction(Request $request)
    {
        return $this->response($request->request->get('bar'));
    }

    /**
     * Retrieve SERVER variables
     *
     * @Route("/server", name="request_server")
     */
    public function serverAction(Request $request)
    {
        return $this->response($request->server->get('HTTP_HOST'));
    }

    /**
     * Retrieve COOKIE values
     *
     * @Route("/cookie", name="request_cookie")
     */
    public function cookieAction(Request $request)
    {
        return $this->response($request->cookies->get('fizz'));
    }

    /**
     * Retrieve HEADER value
     *
     * @Route("/header-custom", name="request_header_custom")
     */
    public function headerCustomAction(Request $request)
    {
        return $this->response($request->headers->get('fizz'));
    }

    /**
     * Retrieve HEADER value
     *
     * @Route("/header-host", name="request_header_host")
     */
    public function headerContentTypeAction(Request $request)
    {
        return $this->response($request->headers->get('host'));
    }

    /**
     * Retrieve files
     *
     * @Route("/file", name="request_file")
     */
    public function fileAction(Request $request)
    {
        return $this->response($request->files->get('photo')->getClientOriginalName());
    }

    /**
     * @Route("/simple", name="simple")
     */
    public function simpleAction(Request $request)
    {
        return new Response('<html><body>Hello Mr. Simple!</body></html>');
    }

    private function response($value)
    {
        return new Response(var_export($value, true));
    }
}
