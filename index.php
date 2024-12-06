<?php
date_default_timezone_set('Asia/Tashkent');
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

require 'bootstrap.php';

use App\ToDo;
use App\Router;
use App\ToDoController;

$todo = new ToDo();
$router = new Router();
$controller = new ToDoController($todo);

$router->get('/', fn() => require 'views/home.php');
$router->get('/bot', fn() => require 'app/bot.php');
$router->get('/todos', fn() => $controller->showAll());
$router->get('/todos/{id}/delete', fn($id) => $controller->delete($id));
$router->get('/todos/{id}/edit', fn($id) => $controller->showEdit($id));
$router->put('/todos/{id}/update', fn($id) => $controller->update($id) );
$router->post('/todos', fn() => $controller->store());
