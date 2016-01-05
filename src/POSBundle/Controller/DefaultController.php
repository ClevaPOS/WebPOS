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

        //return $response;
        return $this->render('POSBundle:Default:index.html.twig');
    }





}
