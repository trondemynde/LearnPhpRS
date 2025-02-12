<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\PasswordReset;
use App\Models\PasswordResetMail;

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
            $_SESSION['alert'] = 'Registration successful. Please log in.';
            redirect('/login');
        } else {
            $_SESSION['alert'] = 'Registration failed. Passwords do not match.';
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
                $_SESSION['alert'] = 'Login successful.';
                redirect('/');
            } else {
                $_SESSION['alert'] = 'Login failed. Invalid email or password.';
                redirect('/login');
            }
        } else {
            $_SESSION['alert'] = 'Login failed. Please fill in all fields.';
            redirect('/login');
        }
    }

    public function logout(){
        unset($_SESSION['userId']);
        $_SESSION['alert'] = 'You have been logged out.';
        redirect('/');
    }

    public function profileForm(){
        $user = User::find($_SESSION['userId']);
        view('auth/profile', compact('user'));
    }

    public function updateProfile(){
        if($_POST['email']){
            $user = User::find($_SESSION['userId']);
            $user->email = $_POST['email'];
            if ($_POST['password']) {
                if ($_POST['current_password'] && password_verify($_POST['current_password'], $user->password)) {
                    $user->password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                } else {
                    $_SESSION['alert'] = 'Profile update failed. Current password is incorrect.';
                    redirect('/profile');
                    return;
                }
            }
            $user->save();
            $_SESSION['alert'] = 'Profile updated successfully.';
            redirect('/profile');
        } else {
            $_SESSION['alert'] = 'Profile update failed. Please fill in all fields.';
            redirect('/profile');
        }
    }
    public function deleteAccount() {
        $userId = $_SESSION['userId'];
        $user = User::find($userId);

        if ($user) {
            $user->delete();
            session_destroy();
            redirect('/login');
        } else {
            redirect('/profile');
        }
    }

    public function passwordResetRequestForm(){
        view('auth/PasswordResetRequest');
    }

    public function passwordResetRequest(){
        if($_POST['email']){
            $user = User::findByEmail($_POST['email']);
            if($user){
                $token = bin2hex(random_bytes(50));
                PasswordReset::create($user->email, $token);

                // Use the correct base URL for generating the reset link
                $resetLink = "http://localhost:8000/PasswordReset?token=$token";
                PasswordResetMail::send($user->email, $resetLink);

                $_SESSION['alert'] = 'Password reset link has been generated. Check the logs or session for the link.';
                redirect('/PasswordResetRequest');
            } else {
                $_SESSION['alert'] = 'No user found with that email address.';
                redirect('/PasswordResetRequest');
            }
        } else {
            $_SESSION['alert'] = 'Please enter your email address.';
            redirect('/PasswordResetRequest');
        }
    }
    public function passwordResetForm(){
        view('auth/PasswordReset');
    }

    public function passwordReset(){
        if($_POST['token'] && $_POST['password'] && $_POST['password'] === $_POST['password_confirm']){
            $passwordReset = PasswordReset::findByToken($_POST['token']);
            if($passwordReset){
                $user = User::findByEmail($passwordReset->email);
                if($user){
                    User::updatePassword($user->id, password_hash($_POST['password'], PASSWORD_BCRYPT));

                    // Delete the password reset token
                    PasswordReset::deleteByEmail($passwordReset->email);

                    $_SESSION['alert'] = 'Password reset successful. Please log in.';
                    redirect('/login');
                } else {
                    $_SESSION['alert'] = 'Invalid token.';
                    redirect('/PasswordReset?token=' . $_POST['token']);
                }
            } else {
                $_SESSION['alert'] = 'Invalid token.';
                redirect('/PasswordReset?token=' . $_POST['token']);
            }
        } else {
            $_SESSION['alert'] = 'Passwords do not match.';
            redirect('/PasswordReset?token=' . $_POST['token']);
        }
    }
}