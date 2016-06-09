<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Task;
use AppBundle\Form\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/templating")
 */
class TemplatingController extends Controller
{
    /**
     * @Route("/includes", name="templating_includes")
     */
    public function includesAction()
    {
        return $this->render(
            'templating/includes.html.twig',
            [
                'name' => 'Raccoon'
            ]
        );
    }

    /**
     * @Route("/includes/with-no-context", name="templating_includes_with_no_context")
     */
    public function includesWithNoContextAction()
    {
        return $this->render(
            'templating/includes-with-no-context.html.twig',
            [
                'name' => 'Raccoon'
            ]
        );
    }

    /**
     * @Route("/for-loop", name="templating_for_loop")
     */
    public function forLoopAction()
    {
        return $this->render(
            'templating/for-loop.html.twig',
            [
                'list' => [
                    'one',
                    'two',
                    'three',
                    'four',
                    'five',
                    'six',
                    'seven',
                    'eight',
                    'nine',
                    'ten'
                ]
            ]
        );
    }

}