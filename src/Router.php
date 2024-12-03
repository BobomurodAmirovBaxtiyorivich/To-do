<?php

class Router
{
    public $currentRoute;
    public function __construct(){
        $this->currentRoute = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
    public function getResource(){
        if (isset(explode("/", $this->currentRoute)[2])) {
            $resourceID = (int)explode("/", $this->currentRoute)[2];
            return $resourceID;
        }
        return false;
    }
    public function get($route, $callback){
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $resourceID = $this->getResource();
            $route = str_replace("{id}", $resourceID, $route);
            if ($route == $this->currentRoute){
                $callback($resourceID);
                exit();
            }
        }
    }
    public function post($route, $callback){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($route == $this->currentRoute){
                $callback();
                exit();
            }
        }
    }
}