<?php

namespace App\Http\Controllers;

use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    protected function flushMessage($message, $type): void
    {
        session()->flash('message', $message);
        session()->flash('alert-class', "alert-$type");
    }
}
