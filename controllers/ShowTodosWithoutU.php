<?php
$tasks = (new App\ToDo())->getTodosWithoutU();
require 'views/todos.php';