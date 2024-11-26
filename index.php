<?php
require 'view.php';
require 'src/ToDo.php';
$todo = new ToDo();
date_default_timezone_set('Asia/Tashkent');

if (isset($_POST['title']) && ($_POST['status'])){
    $title = $_POST['title'];
    $status = $_POST['status'];
    $crDate = new DateTime();


    $todo->store($title, $status, $crDate);

    header('Location: /');
    exit();
}


