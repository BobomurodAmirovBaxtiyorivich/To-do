<?php
if(!$_SESSION['user']){
    header('location: /login');
    exit();
}
$tasks = (new App\ToDo())->getAllTodosOfUser();
require 'views/todos.php';