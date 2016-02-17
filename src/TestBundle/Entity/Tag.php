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
    /**
     * @var \TestBundle\Entity\Task
     */
    private $task;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Tag
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set task
     *
     * @param \TestBundle\Entity\Task $task
     *
     * @return Tag
     */
    public function setTask(\TestBundle\Entity\Task $task = null)
    {
        $this->task = $task;

        return $this;
    }

    /**
     * Get task
     *
     * @return \TestBundle\Entity\Task
     */
    public function getTask()
    {
        return $this->task;
    }
}
