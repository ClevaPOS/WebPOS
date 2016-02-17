<?php

namespace TestBundle\Entity;

use TestBundle\Entity\Tag;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Task
 */


class Task
{
    protected $name;

    protected $tags;

    private $id;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getTags()
    {
        return $this->tags;
    }

    public function addTag(Tag $tag)
    {
        $tag->addTask($this);

        $this->tags->add($tag);
    }

    public function removeTag(\TestBundle\Entity\Tag $tag)
    {
        $this->tags->removeElement($tag);

    }

    public function getTag()
    {
        return $this->tags;
    }

    public function getID()
    {
        return $this->id;
    }

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $item;


    /**
     * Add item
     *
     * @param \TestBundle\Entity\Tag $item
     *
     * @return Task
     */
    public function addItem(\TestBundle\Entity\Tag $item)
    {
        $this->item[] = $item;

        return $this;
    }

    /**
     * Remove item
     *
     * @param \TestBundle\Entity\Tag $item
     */
    public function removeItem(\TestBundle\Entity\Tag $item)
    {
        $this->item->removeElement($item);
    }

    /**
     * Get item
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getItem()
    {
        return $this->item;
    }
}
