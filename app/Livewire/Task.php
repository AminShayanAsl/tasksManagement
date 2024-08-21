<?php

namespace App\Livewire;

use App\Entities\User;
use Doctrine\ORM\EntityManager;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Task extends Component
{
    public $tasks;
    public $title;
    public $explanation;
    public $status;
    public $priority;
    public $deadline;

    protected EntityManager $em;

    public function __construct()
    {
        $this->em = app(EntityManager::class);
    }

    public function save()
    {
        $arg = [
            'title' => $this->title,
            'explanation' => $this->explanation,
            'deadline' => $this->deadline == '' ? null : (new \DateTime())->setTimestamp(Verta::parse($this->deadline)->timestamp),
            'status' => $this->status == '' ? 'to_do' : $this->status,
            'priority' => $this->priority == '' ? 'high' : $this->priority,
        ];

        $user = $this->em->getRepository(User::class)->find(Auth::id());
        $user->addTask(
            new \App\Entities\Task($arg['title'], $arg['explanation'], $arg['deadline'], $arg['status'], $arg['priority'])
        );
        $this->em->persist($user);
        $this->em->flush();

        return view('home');
    }

    public function render()
    {
        $this->tasks = $this->normalizeTasks($this->em->getRepository(\App\Entities\Task::class)->findAll());
        return view('livewire.task');
    }

    protected function normalizeTasks($task_objs)
    {
        $tasks = [];
        foreach ($task_objs as $task) {
            $tasks[] = [
                'id' => $task->getId(),
                'title' => $task->getTitle(),
                'explanation' => $task->getExplanation(),
                'deadline' => verta($task->getDeadline())->format('Y/m/d'),
                'status' => \App\Entities\Task::getStatusTypes()[$task->getStatus()],
                'priority' => \App\Entities\Task::getPriorityTypes()[$task->getPriority()],
                'username' => $task->getUser()->getUserName(),
            ];
        }
        return $tasks;
    }
}
