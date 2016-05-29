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

        $path = $request->getPathInfo();

        $role = $this->generateRole($path);
        $user = new User();

        $user->setRole($role);

        $role->addUser($user);

        $form = $this->createForm(RoleType::class, $role);
        $form->handleRequest($request);




        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $data = $form->getData();
            $role = $data->getRole();
            $users = $data->getUsers();

            foreach ($users as $user) {
                $password = $this->get('security.password_encoder')
                    ->encodePassword($user, $user->getPlainPassword());
                $user->setPassword($password);
                $user->setRole($role);
                $em->persist($user);
            }
            $em->flush();
        }


        return $this->render('POSBundle:Default:register.html.twig',array(
            'form' => $form->createView(),
        ));

    }

    /**
     * Return role base on path
     *
     * @param $path
     *
     * @return Role $role
     */
    private function generateRole($path)
    {
        $role = new Role();

        switch ($path) {
            case '/register':
                $role->setRole('staff');
                break;

            default:
        }
        return $role;
    }





}
