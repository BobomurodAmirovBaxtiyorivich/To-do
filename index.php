<?php
date_default_timezone_set('Asia/Tashkent');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
require 'src/ToDo.php';
require 'src/Router.php';

$todo = new ToDo();
$router = new Router();

$router->get('/', function () {
    require 'views/home.php';
});

$router->post('/todos',function ()use($todo){
    if (isset($_POST['title']) && isset($_POST['due_date'])) {
        $title = $_POST['title'];
        $due_date = new DateTime($_POST['due_date']);

        $todo->store($title, $due_date->format('Y-m-d H:i:s'));
        header('Location: /todos');
        exit();
    }
});

$router->get('/todos',function ()use($todo){
    $tasks = $todo->getAllTodos();
    require 'views/main.php';
});

$router->get('/complete',function ()use($todo){
    if (isset($_GET['id'])) {
        $todo->completed($_GET['id']);
        header('Location: /todos');
        exit();
    }
});

$router->get('/progress',function ()use($todo){
    if (isset($_GET['id'])) {
        $todo->progress($_GET['id']);
        header('Location: /todos');
        exit();
    }
});

$router->get('/pending',function ()use($todo){
    if (isset($_GET['id'])) {
        $todo->pending($_GET['id']);
        header('Location: /todos');
        exit();
    }
});

$router->get('/delete',function ()use($todo){
    if (isset($_GET['id'])) {
        $todo->delete($_GET['id']);
        header('Location: /todos');
        exit();
    }
});


