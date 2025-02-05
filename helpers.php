<?php

use App\Models\User;

// function dump(...$vars){
//     echo '<pre>';
//     var_dump(...$vars);
//     echo '</pre>';
// }

// function dd(...$vars){
//     dump(...$vars);
//     die;
// }

function redirect($path){
    header("Location: $path");
}

function view($viewName, $vars=[]){
    extract($vars);
    include __DIR__ . "/views/$viewName.php"; 
}

function auth(){
    if(!isset($_SESSION['userId'])){
        return false;
    }
    $user = User::find($_SESSION['userId']);
    if($user){
        return $user;
    }
    return false;
}