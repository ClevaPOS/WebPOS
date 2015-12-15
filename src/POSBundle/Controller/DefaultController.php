<?php

namespace POSBundle\Controller;

use POSBundle\Entity\Categories;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use POSBundle\Entity\Product;

class DefaultController extends Controller
{
    public function indexAction()
    {


        $this->createProductAction();
        $response = $this->createRecord();

        return $response;
        //return $this->render('POSBundle:Default:index.html.twig');
    }

    private function createProductAction()
    {
        $product = new Product();

        $product->setName('A Foo Bar');
        $product->setPrice('19.99');
        $product->setName('A Foo Bar');
        $product->setPrice('19.99');
        $product->setDescription('Lorem ipsum dolor');

        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $em->flush();
    }

    private function createRecord()
    {
        $category = new Categories();
        $category->setName('Main Product');

        $product = new Product();
        $product->setName('Foo');
        $product->setPrice(19.99);
        $product->setDescription('Lorem dolor');
        $product->setCategories($category);

        $em = $this->getDoctrine()->getManager();
        $em->persist($category);
        $em->persist($product);
        $em->flush();

        return new Response(
            'Created product id: '. $product->getId()
            .' and category id: '.$category->getId()

        );




    }

    private function showAction($id)
    {
        $product = $this->getDoctrine()
            ->getRepository('POSBundle:Product')
            ->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id'. $id
            );
        }
    }
}
