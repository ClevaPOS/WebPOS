<?php

namespace POSBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Role
 */
class Role
{
    /**
     * @var int
     */
    private $id;


    private $users;


    private $role;


    public function __construct()
    {
        $this->users = new ArrayCollection();
    }


    /**
     * Get $user
     *
     * @return user
     */
    public function getUsers()
    {
        return $this->users;

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
    /**
     * @var string
     */


    /**
     * Set role
     *
     * @param string $role
     *
     * @return Role
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }


    /**
     * add user to role
     *
     * @param $user
     *
     */
    public function addUser($user)
    {
        $this->users->add($user);
        $user->setRole($this);

    }


    public function addRole($user)
    {
        if (!$this->roles->contains($user)) {
            $this->roles->add($user);
        }
    }


    /**
     * Remove user
     *
     * @param \POSBundle\Entity\User $user
     */
    public function removeUser(\POSBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }
}
