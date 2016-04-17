<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppBundle:Default:index.html.twig');
    }

    public function createAction()
    {
//          $product = new Product();
//        $product->setName('Keyboard');
//        $product->setPrice(19.99);
//        $product->setDescription('Ergonomic and stylish:');
//
//        $em = $this->getDoctrine()->getManager();
//        $em->persist($product);
//
//        $em->flush();
//
//        return new Response('Saved new product with id '.$product->getId());

    }
}
