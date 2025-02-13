<?php
namespace App\Models;

use App\DB;

class Post extends Model {
    public static $table = 'posts';
    
    public $id;
    public $title;
    public $body;

    public static function count() {
        $db = new DB();
        $stmt = $db->query("SELECT COUNT(*) as count FROM " . self::$table);
        $result = $stmt->fetch();
        return $result['count'];
    }

    public static function paginate($limit, $offset) {
        $db = new DB();
        $stmt = $db->prepare("SELECT * FROM " . self::$table . " LIMIT :limit OFFSET :offset");
        $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, self::class);
    }
    public function comments() {
        $db = new DB();
        return $db->where('comments', Comment::class, 'post_id', $this->id);
    }
}