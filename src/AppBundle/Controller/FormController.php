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
 * @Route("/form")
 */
class FormController extends Controller
{
    /**
     * @Route("/simple", name="form_simple")
     */
    public function simpleAction(Request $request)
    {
        $task = new Task();
        $task->setTitle('Make it work!');
        $task->setDateCreated(new \DateTime());

        $form = $this->createFormBuilder($task)
            ->add('title', TextType::class)
            ->add('dateCreated', DateType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Task'))
            ->getForm();

        return $this->render('form/new.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/class", name="form_class")
     */
    public function classAction(Request $request)
    {
        $task = new Task();
        $task->setTitle('Make it work!');
        
        $form = $form = $this->createForm(TaskType::class, $task);

        return $this->render('form/new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}