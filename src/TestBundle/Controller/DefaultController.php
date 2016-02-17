<?php

namespace TestBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TestBundle\Entity\Task;
use TestBundle\Entity\Tag;
use TestBundle\Form\Type\TaskType;



class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {

        // end dummy code
        $task = new Task();
        $tag = new Tag();

        $task->getTags()->add($tag);
        $form = $this->createForm(TaskType::class, $task);


        $form->handleRequest($request);
        dump('test');

        if ($form->isValid() && $form->isSubmitted()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($task);
            $em->persist($tag);
            $em->flush();

            return $this->redirectToRoute('test_homepage');
        }


        return $this->render('TestBundle:Default:index.html.twig', array(
            'form' => $form->createView(),
        ));

    }
}
