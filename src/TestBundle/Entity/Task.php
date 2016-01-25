<?php

namespace TestBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Task
 */
class Task
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var ArrayCollection
     */
    protected $tags;


    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }

    public function getDescription()
    {
        return $this->description;
    }


    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getTags()
    {
        return $this->tags;
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
}

