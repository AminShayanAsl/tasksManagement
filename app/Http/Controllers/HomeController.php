<?php

namespace App\Http\Controllers;

use App\Http\Repositories\UserRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function home()
    {
        $arg = [];
        if (auth()->check())
            $arg = [
                'username' => $this->userRepository->getAuthUserNameById(),
            ];

        return view('home', $arg);
    }
}
