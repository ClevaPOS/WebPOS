<?php

namespace TestBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use TestBundle\Entity\Task;


class Tag
{
    public $name;

    public $id;

    private $tasks;

    public function __construct()
    {
        $this->tasks = new ArrayCollection();
    }

    public function addTask(\TestBundle\Entity\TaskTask $task)
    {
        if (!$this->tasks->contains($task)) {
            $this->tasks->add($task);
        }
    }
}