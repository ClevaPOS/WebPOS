<?php

namespace TestBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Tag
 */
class Tag
{

    public $name;
    protected $tasks;

    /**
     * @var int
     */
    private $id;


    public function __construct()
    {
        $this->tasks = new ArrayCollection();

    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function addTask(Task $task)
    {
        if (!$this->tasks->contains($task))
        {
            $this->tasks->add($task);
        }

    }
}

