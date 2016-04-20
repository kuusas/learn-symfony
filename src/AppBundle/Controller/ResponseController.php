<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/response")
 */
class ResponseController extends Controller
{
    /**
     * Simple success response
     * @Route("/success/{kind}", name="response_success")
     */
    public function successAction($kind = 'Great')
    {
        return new Response($kind . ' success!', Response::HTTP_OK);
    }

    /**
     * Json response - hard way
     * @Route("/json-hard", name="response_json_hard")
     */
    public function jsonHardAction()
    {
        $response = new Response(json_encode(array('name' => 'John')));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * Json response
     * @Route("/json", name="response_json")
     */
    public function jsonAction()
    {
        return new JsonResponse(array('name' => 'John'));
    }

    /**
     * Redirect to another action
     * @Route("/redirect", name="response_redirect")
     */
    public function redirectAction()
    {
        return new RedirectResponse($this->generateUrl('response_success'));
    }

    /**
     * Forward to another action and finish handling aftewards
     * @Route("/forward", name="response_forward")
     */
    public function forwardAction()
    {
        $response = $this->forward('AppBundle:Response:success', ['kind' => 'Random']);
        $response->setContent('Success!');
        return $response;
    }
}
