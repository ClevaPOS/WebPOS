<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Categories;
use AppBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $categories = new Categories();
        $categories->setName('Computer Peripherals');

        $product = new Product();
        $product->setName('Keyboard');
        $product->setPrice(19.99);
        $product->setDescription('Ergonomic and stylish!');

        $product->setCategory($categories);

        $em = $this->getDoctrine()->getManager();
        $em->persist($categories);
        $em->persist($product);

        $em->flush();


        return new Response('<html><head></head><body>Test</body></html>');
    }
}