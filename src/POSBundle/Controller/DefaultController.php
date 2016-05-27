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
        $user->setUsername('Test');

        $user->setRole($role);

        $role->addUser($user);
        $form = $this->createForm(RoleType::class, $role);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            $em = $this->getDoctrine()->getManager();
            $em->persist($role);
            $em->flush();
        }




        return $this->render('POSBundle:Default:register.html.twig',array(
            'form' => $form->createView(),
        ));

    }





}
