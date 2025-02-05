<?php

namespace App\Controllers;

use App\Models\User;

class AuthController {
    public function registerForm(){
        view('auth/register');
    }

    public function register(){
        if($_POST['email'] && $_POST['password'] && $_POST['password'] === $_POST['password_confirm']){
            $user = new User();
            $user->email = $_POST['email'];
            $user->password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $user->save();
            redirect('/login');
        } else {
            redirect('/register');
        }
    }

    public function loginForm(){
        view('auth/login');
    }

    public function login(){
        if($_POST['email'] && $_POST['password']){
            $users = User::where('email', $_POST['email']);
            $user = $users[0] ?? null;
            if($user && password_verify($_POST['password'], $user->password)){
                $_SESSION['userId'] = $user->id;
                redirect('/');
            } else {
                redirect('/register');
            }
        } else {
            redirect('/register');
        }
    }

    public function logout(){
        unset($_SESSION['userId']);
        redirect('/');
    }
}
