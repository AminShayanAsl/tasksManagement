<?php

namespace App\Entities;

use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Task")
 */
class Task {
    const HIGH = 'high';
    const MIDDLE = 'middle';
    const LOW = 'low';
    const TO_DO = 'to_do';
    const DOING = 'doing';
    const DONE = 'done';

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $explanation;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    public $deadline;

    /**
     * @ORM\Column(type="string")
     */
    protected $status;

    /**
     * @ORM\Column(type="string")
     */
    protected $priority;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="tasks")
     * @var User
     */
    protected $user;

    public function __construct($title, $explanation, $deadline, $status, $priority)
    {
        $this->title = $title;
        $this->explanation = $explanation;
        $this->deadline = $deadline;
        $this->status = $status;
        $this->priority = $priority;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function getExplanation()
    {
        return $this->explanation;
    }
    public function setExplanation($explanation)
    {
        $this->explanation = $explanation;
    }
    public function getDeadline()
    {
        return $this->deadline;
    }
    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;
    }
    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }
    public function getPriority()
    {
        return $this->priority;
    }
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }
    public function setUser(User $user)
    {
        $this->user = $user;
    }
    public function getUser()
    {
        return $this->user;
    }

    public static function getPriorityTypes ()
    {
        return [
            self::HIGH => __('task.high'),
            self::MIDDLE => __('task.middle'),
            self::LOW => __('task.low'),
        ];
    }
    public static function getStatusTypes ()
    {
        return [
            self::TO_DO => __('task.to-do'),
            self::DOING => __('task.doing'),
            self::DONE => __('task.done'),
        ];
    }
}
