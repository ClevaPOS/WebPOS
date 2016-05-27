<?php
/**
 * Created by PhpStorm.
 * User: vphucpham
 * Date: 5/24/16
 * Time: 11:16 AM
 */

namespace AppBundle\DataFixtures\ORM;



use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Tag;
use AppBundle\Entity\Task;


class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $task = new Task();
        $task->setDescription('task one');

        // dummy code - this is here just so that the Task has some tags
        // otherwise, this isn't an interesting example
        $tag1 = new Tag();
        $tag1->setName('tag1');

        $tag1->addTask($task);
        $task->getTags()->add($tag1);

        $manager->persist($task);
        $manager->flush();
    }


}