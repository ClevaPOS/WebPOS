<?php
/**
 * Created by PhpStorm.
 * User: vphucpham
 * Date: 5/2/16
 * Time: 2:42 PM
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Task;
use AppBundle\Entity\Tag;
use AppBundle\Form\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class TaskController extends Controller
{
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $task = $em->getRepository('AppBundle:Task')
            ->findOneByDescription('van pham');


        $tag1 = new Tag();
        $tag1->setName('tag1');
        $tag1->setTask($task);



        $form = $this->createForm(TaskType::class, $task);


        $form->handleRequest($request);

        if ($form->isValid()) {


            $em->persist($task);
            $em->flush();



            return new Response('<html><head></head><body>Submitted</body></html>');
        }


        return $this->render('AppBundle:Task:new.html.twig', array(
            'form' => $form->createView(),
        ));



    }

}