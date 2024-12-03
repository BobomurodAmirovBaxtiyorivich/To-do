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
    require 'views/todos.php';
});

$router->get('/complete/{id}',function ($todoId)use($todo){
        $todo->completed($todoId);
        header('Location: /todos');
        exit();
});

$router->get('/progress/{id}',function ($todoId)use($todo){
        $todo->progress($todoId);
        header('Location: /todos');
        exit();
});

$router->get('/pending/{id}',function ($todoId)use($todo){
        $todo->pending($todoId);
        header('Location: /todos');
        exit();
});

$router->get('/delete/{id}',function ($todoId)use($todo){
        $todo->delete($todoId);
        header('Location: /todos');
        exit();
});


