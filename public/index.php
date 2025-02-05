<?php

if (preg_match('/\.(?:png|jpg|jpeg|gif|css|js)$/', $_SERVER["REQUEST_URI"])) {
    return false;    // serve the requested resource as-is.
}

require __DIR__ . '/../vendor/autoload.php';

session_start();

require __DIR__ . '/../helpers.php';
require __DIR__ . '/../routes.php';

$router = new App\Router($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
$match = $router->match();

if($match){
    if(is_callable($match->action)){
        call_user_func($match->action);
    } elseif(is_array($match->action) && count($match->action) === 2){
        $class = $match->action[0];
        $controller = new $class();
        $method = $match->action[1];
        $controller->$method();
    } else {
        echo 'invalid route definition';
    }
    
} else {
    http_response_code(404);
    echo '404';
}
