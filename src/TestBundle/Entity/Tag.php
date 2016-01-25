<?php

namespace TestBundle\Entity;

/**
 * Tag
 */
class Tag
{

    public $name;

    /**
     * @var int
     */
    private $id;


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

