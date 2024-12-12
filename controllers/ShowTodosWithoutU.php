<?php
if(!$_SESSION['user']){
    header('location: /login');
    exit();
}
$tasks = (new App\ToDo())->getTodosWithoutU();
require 'views/todos.php';