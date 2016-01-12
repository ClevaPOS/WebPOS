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

}

