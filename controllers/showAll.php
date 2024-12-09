<?php
$tasks = (new App\ToDo())->getAllTodos();
require 'views/todos.php';