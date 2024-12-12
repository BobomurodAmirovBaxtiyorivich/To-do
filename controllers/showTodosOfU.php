<?php
$tasks = (new App\ToDo())->getAllTodosOfUser();
require 'views/todos.php';