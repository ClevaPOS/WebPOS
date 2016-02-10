<?php
/**
 * Created by PhpStorm.
 * User: thelinhuk
 * Date: 10/02/2016
 * Time: 22:49
 */

namespace TestBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;



class TaskController extends Controller
{
    public function editAction($id, Request $request)
    {
        return new Response($id);
    }

}