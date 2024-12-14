<?php

use App\Router;
use App\ToDo;

$router = new Router();

$todo = new ToDo();

$todos = $todo->getAllTodosOfUser();

echo json_encode($todos);