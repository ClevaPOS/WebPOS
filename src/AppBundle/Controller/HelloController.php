<?php
/**
 * Created by PhpStorm.
 * User: thelinhuk
 * Date: 01/04/2016
 * Time: 23:06
 */

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class HelloController extends Controller
{
    public function indexAction($name)
    {
        return new Response('<html><body>Hello '.$name.'!</body></html>');
    }

}