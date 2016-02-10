<?php

namespace TestBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Task
 */
class Task
{
    protected $description;
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

    public function addTag(Tag $tag)
    {
        $this->tags->add($tag);

    }

    public function removeTag(Tag $tag)
    {
        $this->tags->removeElement($tag);

    }

}

