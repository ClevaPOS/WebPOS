<?php

namespace POSBundle\DataFixtures\ORM;

/**
 * Created by PhpStorm.
 * User: vphucpham
 * Date: 1/4/16
 * Time: 5:00 PM
 */


use POSBundle\Entity\Categories;
use Doctrine\Common\Persistence\ObjectManager;
use POSBundle\Entity\Category;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $em)
    {
        $category = new Category();
        $category->setName('Starter');
        $em->persist($category);




        $em->flush();

        
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }


}