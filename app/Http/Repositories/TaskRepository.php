<?php

namespace App\Http\Repositories;

use App\Entities\Task;
use App\Entities\User;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Facades\Auth;


class TaskRepository extends EntityRepository
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, $em->getClassMetadata(Task::class));
    }

    public function getAllTasks()
    {
        $qb = $this->createQueryBuilder('t')
            ->innerJoin('t.user', 'u')
            ->select(['t.title', 't.explanation', 't.deadline', 't.status', 't.priority', 'u.username']);
        return $qb->getQuery()->getResult();
    }

    public function getTaskById($id)
    {
        $qb = $this->createQueryBuilder('t')
            ->innerJoin('t.user', 'u')
            ->select(['t.id', 't.title', 't.explanation', 't.deadline', 't.status', 't.priority', 'u.username'])
            ->where('t.id = :id')
            ->setParameter('id', $id);
        return $qb->getQuery()->getResult();
    }

    public function addTask($arg)
    {
        $user = $this->getEntityManager()->getRepository(User::class)->find(Auth::id());
        $user->addTask(
            new Task($arg['title'], $arg['explanation'], $arg['deadline'], $arg['status'], $arg['priority'])
        );
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();
    }

    public function updateTask($arg, $id)
    {
        $task = $this->getEntityManager()->getRepository(Task::class)->find($id);
        foreach ($arg as $key => $value) {
            switch ($key) {
                case 'title':
                    $task->setTitle($value);
                    break;
                case 'explanation':
                    $task->setExplanation($value);
                    break;
                case 'deadline':
                    $task->setDeadline($value == '' ? null : (new \DateTime())->setTimestamp(Verta::parse($value)->timestamp));
                    break;
                case 'priority':
                    $task->setPriority($value);
                    break;
                case 'status':
                    $status_arr = Task::getStatusTypes();
                    $status = $value;
                    if (!array_search($value, array_keys($status_arr)))
                        $status = array_search($value, $status_arr);
                    $task->setStatus($status);
                    break;
            }
        }
        $this->getEntityManager()->persist($task);
        $this->getEntityManager()->flush();
    }

    public function deleteTask($id)
    {
        $task = $this->getEntityManager()->getRepository(Task::class)->find($id);
        $this->getEntityManager()->remove($task);
        $this->getEntityManager()->flush();
    }
}
