<?php
namespace App\Models;

use App\DB;

class User extends Model {
    public static $table = 'users';

    public $id;
    public $email;
    public $password;

    public static function findByEmail($email) {
        $db = new DB();
        return $db->where(self::$table, self::class, 'email', $email)[0] ?? null;
    }

    public static function updatePassword($id, $password) {
        $db = new DB();
        $db->update(self::$table, ['password' => $password], $id);
    }
}