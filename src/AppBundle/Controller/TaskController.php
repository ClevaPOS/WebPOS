<?php
/**
 * Created by PhpStorm.
 * User: vphucpham
 * Date: 5/2/16
 * Time: 2:42 PM
 */

namespace AppBundle\Controller;


use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Task;
use AppBundle\Entity\Tag;
use AppBundle\Form\Type\TaskType;


class TaskController extends Controller
{
    public function newAction(Request $request)
    {
        $task = new Task();

        // dummy code - this is here just so that the Task has some tags
        // otherwise, this isn't an interesting example
        $tag1 = new Tag();
        $tag1->setName('tag1');

        $tag1->addTask($task);
        $task->getTags()->add($tag1);


        $form = $this->createForm(TaskType::class, $task, array('roles' => 1));


        $form->handleRequest($request);



//        $tags = $description->getTa

        if ($form->isValid()) {

            $data = $form->getData();

            $description = $data->getDescription();

            $tags = new ArrayCollection();

            $tags = $data->getTags();

            foreach ($tags as $tag) {
                $tag->addTask($description);
            }


            $em = $this->getDoctrine()->getManager();
            $em->persist($tag);
            $em->flush();
        }

        return $this->render('AppBundle:Task:new.html.twig', array(
            'form' => $form->createView(),
        ));

    }

}