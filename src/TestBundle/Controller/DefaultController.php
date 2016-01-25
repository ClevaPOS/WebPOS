<?php

namespace TestBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TestBundle\Entity\Task;
use TestBundle\Entity\Tag;
use TestBundle\Form\Type\TaskType;
use TestBundle\Form\Type\TagType;
use Symfony\Component\HttpFoundation\Request;




class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $task = new Task();

        // dummy code - this is here just so that the Task has some tags
        // otherwise, this isn't an interesting example
        $tag1 = new Tag();
        $tag1->name = 'tag1';
        $task->getTags()->add($tag1);
        $tag2 = new Tag();
        $tag2->name = 'tag2';
        $task->getTags()->add($tag2);
        // end dummy code

        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);

        if ($form->isValid()) {
            // ... maybe do some form processing, like saving the Task and Tag objects
        }

        return $this->render('TestBundle:Default:index.html.twig', array(
            'form' => $form->createView(),
        ));


    }
}
