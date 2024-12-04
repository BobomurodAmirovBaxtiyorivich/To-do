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

$router->get('/todos/{id}/edit',function ($todoId)use($todo){
    $tasks = $todo->edit($todoId);
    require 'views/edit.php';
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

$router->post('/todos/{id}/edit',function ()use($todo){
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

$router->get('/todos/{id}/complete',function ($todoId)use($todo){
        $todo->completed($todoId);
        header('Location: /todos');
        exit();
});



$router->get('/todos/{id}/progress',function ($todoId)use($todo){
        $todo->progress($todoId);
        header('Location: /todos');
        exit();
});

$router->get('/todos/{id}/pending',function ($todoId)use($todo){
        $todo->pending($todoId);
        header('Location: /todos');
        exit();
});

$router->get('/todos/{id}/delete',function ($todoId)use($todo){
        $todo->delete($todoId);
        header('Location: /todos');
        exit();
});