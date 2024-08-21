<?php

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;
use Illuminate\Contracts\Auth\Authenticatable;

/**
 * @ORM\Entity
 * @ORM\Table(name="User")
 */
class User implements Authenticatable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    protected $username;

    /**
     * @ORM\Column(type="string")
     */
    protected $password;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $rememberToken;

    /**
     * @ORM\OneToMany(targetEntity="Task", mappedBy="user", cascade={"persist"})
     * @var ArrayCollection|Task[]
     */
    protected $tasks;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
        $this->tasks = new ArrayCollection();
    }
    public function getId()
    {
        return $this->id;
    }
    public function getUserName()
    {
        return $this->username;
    }
    public function getrememberToken()
    {
        return $this->rememberToken;
    }
    public function setrememberToken($rememberToken)
    {
        $this->rememberToken = $rememberToken;
    }
    public function addTask(Task $task)
    {
        if(!$this->tasks->contains($task)) {
            $task->setUser($this);
            $this->tasks->add($task);
        }
    }
    public function getTask()
    {
        return $this->tasks;
    }

    public function getAuthIdentifierName()
    {
        // TODO: Implement getAuthIdentifierName() method.
    }

    public function getAuthIdentifier()
    {
        // TODO: Implement getAuthIdentifier() method.
    }

    public function getAuthPasswordName()
    {
        // TODO: Implement getAuthPasswordName() method.
    }

    public function getAuthPassword()
    {
        // TODO: Implement getAuthPassword() method.
    }

    public function getRememberTokenName()
    {
        // TODO: Implement getRememberTokenName() method.
    }
}
