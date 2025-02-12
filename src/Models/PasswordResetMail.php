<?php

namespace App\Models;

class PasswordResetMail {
    public static function send($email, $resetLink){
        // for testing only
        error_log("Password reset link for $email: $resetLink");
        $_SESSION['reset_link'] = $resetLink;
    }
}