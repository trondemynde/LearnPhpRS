<?php
namespace App;

use App\Route;


class Router {
    public static $routes = [];
    public $path;
    public $method;
    public function __construct($path, $method)
    {   
        $this->path = parse_url($path, PHP_URL_PATH);
        $this->method = $method;
    }

    public function match(){
        foreach(self::$routes as $route){
            if($route->path === $this->path && $route->method === $this->method){
                return $route;
            }
        }
        return false;
    }

    public static function addRoute($method, $path, $action){
        self::$routes[] = new Route($method, $path, $action);
    }
}