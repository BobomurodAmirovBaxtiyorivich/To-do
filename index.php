<?php
date_default_timezone_set('Asia/Tashkent');
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

require 'bootstrap.php';

use App\ToDo;
use App\Router;
use App\Users;
$todo = new ToDo();
$router = new Router();
$users = new Users();

$router->get('/', fn() => require 'views/home.php');
$router->get('/logout', fn() => require 'controllers/logout.php');
$router->get('/bot', fn() => require 'app/bot.php');
$router->get('/register', fn() => require 'views/register.php');
$router->get('/login', fn() => require 'views/login.php');
$router->get('/todos', fn() => require 'controllers/showAll.php');
$router->get('/todos/{id}/delete', fn($id) => require 'controllers/delete.php');
$router->get('/todos/{id}/edit', fn($id) => require 'controllers/edit.php');
$router->put('/todos/{id}/update', fn($id) => require 'controllers/update.php');
$router->post('/todos', fn() => require 'controllers/store.php');
$router->post('/register', fn() => require 'controllers/storeUser.php');
$router->post('/login', fn() => require 'controllers/login.php');