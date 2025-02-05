<?php

namespace App\Controllers;

use App\DB;
use App\Models\Post;
use App\Models\User;

class PublicController
{
    public function index() {
        $posts = Post::all();
        view('index', compact('posts'));
    }

    public function us()
    {
        $posts = Post::all();
        view('us', compact('posts'));
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
