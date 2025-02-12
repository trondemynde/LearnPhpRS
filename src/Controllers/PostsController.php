<?php

namespace App\Controllers;


use App\Models\Post;

class PostsController
{
    public function index() {
        $perPage = 5;
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $totalPosts = Post::count();
        $totalPages = ceil($totalPosts / $perPage);
        $offset = ($currentPage - 1) * $perPage;

        $posts = Post::paginate($perPage, $offset);
        view('posts/index', compact('posts', 'currentPage', 'totalPages'));
    }

    public function create(){
        view('posts/create');
    }

    public function show(){
        $post = Post::find($_GET['id']);
        view('posts/show', compact('post'));
    }

    public function store(){
        $post = new Post();
        $post->title = $_POST['title'];
        $post->body = $_POST['body'];
        $post->save();
        redirect('/admin/posts');
    }

    public function edit(){
        $post = Post::find($_GET['id']);
        view('posts/edit', compact('post'));
    }

    public function update(){
        $post = Post::find($_GET['id']);
        $post->title = $_POST['title'];
        $post->body = $_POST['body'];
        $post->save();
        redirect('/admin/posts');
    }

    public function destroy(){
        $post = Post::find($_GET['id']);
        $post->delete();
        redirect('/admin/posts');
    }

}
