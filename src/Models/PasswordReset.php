<?php

namespace App\Models;

use App\DB;

class PasswordReset {
    protected static $table = 'password_resets';

    public static function create($email, $token) {
        $db = new DB();
        $db->insert(self::$table, ['email' => $email, 'token' => $token]);
    }

    public static function findByToken($token) {
        $db = new DB();
        return $db->where(self::$table, self::class, 'token', $token)[0] ?? null;
    }

    public static function deleteByEmail($email) {
        $db = new DB();
        $db->deleteByEmail(self::$table, $email);
    }
}