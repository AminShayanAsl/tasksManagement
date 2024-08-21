<?php

namespace App\Http\Controllers;

use App\Entities\User;
use App\Http\Repositories\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private UserRepository $userRepository;

    public function __construct(EntityManagerInterface $entityManager, UserRepository $userRepository)
    {
        parent::__construct($entityManager);

        $this->userRepository = $userRepository;
    }
    public function userAccount()
    {
        if(auth()->check())
            return redirect()->route('home');

        return view('user.account');
    }

    public function signup()
    {
        $email = request('email');
        $password = request('password');
        $repeatPassword = request('repeat-password');

        $existEmail = $this->userRepository->existEmail($email);
        $matchPasswords = $password == $repeatPassword;

        if (!$existEmail and $matchPasswords) {
            $user = new User($email, Hash::make($password));
            $this->em->persist($user);
            $this->em->flush();

            Auth::attempt(['username' => $email, 'password' => $password]);

            $this->flushMessage(__('user.signup-success'), 'success');

            return redirect()->route('home');
        }
        elseif ($existEmail)
            $this->flushMessage(__('user.exist-email'), 'danger');
        elseif (!$matchPasswords)
            $this->flushMessage(__('user.not-matched-passwords'), 'danger');
        return redirect()->route('home');
    }

    public function login()
    {
        $email = request('email');
        $password = request('password');

        if (auth()->attempt(['username' => $email, 'password' => $password])) {
            session()->regenerate();
            $this->flushMessage(__('user.welcome'), 'success');
        }
        else {
            $this->flushMessage(__('user.login-failed'), 'danger');
        }

        return redirect()->route('home');
    }

    public function logout()
    {
        if (auth()->check()) {
            Auth::logout();
            request()->session()->invalidate();
            session()->regenerate();
        }
        return redirect()->route('home');
    }
}
