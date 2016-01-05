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
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $em)
    {
        $category = new Categories();
        $category->setName('Starter');
        $em->persist($category);


        $category_one = new Categories();
        $category_one->setName('Soup');
        $em->persist($category_one);

        $category_main = new Categories();
        $category_main->setName('Main');
        $em->persist($category_main);

        $category_desert = new Categories();
        $category_desert->setName('Desert');
        $em->persist($category_desert);



        $em->flush();

        
    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 1;
    }


}