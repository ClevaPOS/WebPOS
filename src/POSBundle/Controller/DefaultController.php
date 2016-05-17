<?php

namespace POSBundle\Controller;

use POSBundle\Entity\Categories;
use POSBundle\Entity\User;
use POSBundle\Entity\Role;
use POSBundle\Form\RoleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    public function indexAction()
    {

        //return $response;
        return $this->render('POSBundle:Default:index.html.twig');
    }

    public function registerAction(Request $request)
    {
        $role = new Role();
        $role->setRole('staff');

        $user = new User();
        $user->setUsername('');

        $user->setRole($role);

        $form = $this->createForm(RoleType::class, $role);


        return $this->render('POSBundle:Default:register.html.twig',array(
            'form' => $form->createView(),
        ));

    }





}
