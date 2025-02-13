<?php

namespace App\Controllers;


use App\Models\Post;
use App\Models\Comment;
use App\DB;


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


    //comments
    public function storeComment()
    {
        try {
            $db = new DB();
            $db->insert('comments', [
                'post_id' => $_POST['post_id'],
                'body' => $_POST['body']
            ]);
            $lastInsertId = $db->getPdo()->lastInsertId();
            $comment = $db->find('comments', Comment::class, $lastInsertId);
            echo json_encode(['status' => 'success', 'comment' => $comment]);
        } catch (\Exception $e) {
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
    public function editComment()
    {
        $db = new DB();
        $comment = $db->find('comments', Comment::class, $_GET['id']);
        view('posts/editComment', compact('comment'));
    }
    
    public function updateComment()
    {
        $db = new DB();
        $db->update('comments', [
            'body' => $_POST['body']
        ], $_GET['id']);
        $comment = $db->find('comments', Comment::class, $_GET['id']);
        if ($comment) {
            redirect('/posts/show?id=' . $comment->post_id);
        } else {
            echo "Comment not found.";
        }
    }

    public function destroyComment()
    {
        $db = new DB();
        $comment = $db->find('comments', Comment::class, $_GET['id']);
        $postId = $comment->post_id;
        $db->delete('comments', $_GET['id']);
        redirect('/posts/show?id=' . $postId);

    }

}
