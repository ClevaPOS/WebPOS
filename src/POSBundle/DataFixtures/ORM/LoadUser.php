<?php

namespace POSBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use POSBundle\Entity\User;
use POSBundle\Entity\Role;


class LoadUser implements FixtureInterface {

    public function load(ObjectManager $manager) {
        $role = new Role();
        $role->setRole('staff');


        $user = new User();
        $user->setUsername('Test');
        $user->setPlainPassword('hello');
        $user->setPassword('test');
        $user->setRole($role);
        $user->setEmail('thelinhuk@gmail.com');
        $user->setIsActive(false);

        $role->addUser($user);


        $manager->persist($role);
        $manager->flush();

    }

}