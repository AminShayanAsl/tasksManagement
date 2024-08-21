<?php

namespace App\Http\Repositories;

use App\Entities\User;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Illuminate\Support\Facades\Auth;


class UserRepository extends EntityRepository
{
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, $em->getClassMetadata(User::class));
    }

    public function existEmail($email)
    {
        $qb = $this->createQueryBuilder('u')
            ->where('u.username = :email')
            ->setParameter('email', $email);
        return !(count($qb->getQuery()->getResult()) == 0);
    }

    public function getAuthUser()
    {
        $id = Auth::id();
        $qb = $this->createQueryBuilder('u')
            ->where('u.id = :id')
            ->setParameter('id', $id);
        return $qb->getQuery()->getResult()[0];
    }

    public function getAuthUserNameById()
    {
        return $this->getAuthUser()->getUsername();
    }
}
