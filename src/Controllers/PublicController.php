<?php

namespace App\Controllers;

use App\DB;
use App\Models\Post;
use App\Models\User;

class PublicController
{
    public function index() {
        $perPage = 5;
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $totalPosts = Post::count();
        $totalPages = ceil($totalPosts / $perPage);
        $offset = ($currentPage - 1) * $perPage;

        $posts = Post::paginate($perPage, $offset);

        view('index', compact('posts', 'currentPage', 'totalPages'));
    }

    public function us()
    {
        $perPage = 5;
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $totalPosts = Post::count();
        $totalPages = ceil($totalPosts / $perPage);
        $offset = ($currentPage - 1) * $perPage;

        $posts = Post::paginate($perPage, $offset);

        view('us', compact('posts', 'currentPage', 'totalPages'));
    }

    public function form()
    {
        // $fname = '';
        // if(isset($_GET['fname'])){
        //     $fname = $_GET['fname'];
        // }
        // $fname = isset($_GET['fname']) ? $_GET['fname'] : '';
        dump($_GET, $_POST);
        $fname = $_GET['fname'] ?? $_POST['fname'] ?? '';
        view('form');
    }
    public function answer()
    {
        dump($_GET, $_POST, $_REQUEST);
    }
}
