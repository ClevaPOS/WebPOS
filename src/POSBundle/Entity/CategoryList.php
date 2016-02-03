<?php
/**
 * Created by PhpStorm.
 * User: thelinhuk
 * Date: 29/01/2016
 * Time: 20:01
 */

namespace POSBundle\Entity;


use Doctrine\Common\Collections\ArrayCollection;

class CategoryList
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var ArrayCollection
     */
    protected $categories;


    public function __construct()
    {
        $this->categories = new ArrayCollection();
    }

    /**
     * @param $categories
     *
     * Set categories
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    /**
     * @return ArrayCollection
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


}