<?php

namespace POSBundle\Entity;

/**
 * Category
 */
class Category
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get Name
     *
     * @return int
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set Name
     *
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $item;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->item = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Category
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Add item
     *
     * @param \POSBundle\Entity\item $item
     *
     * @return Category
     */
    public function addItem(\POSBundle\Entity\item $item)
    {
        $this->item[] = $item;

        return $this;
    }

    /**
     * Remove item
     *
     * @param \POSBundle\Entity\item $item
     */
    public function removeItem(\POSBundle\Entity\item $item)
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
