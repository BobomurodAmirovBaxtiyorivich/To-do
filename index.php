<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
require 'src/ToDo.php';
$todo = new ToDo();
$tasks = $todo->get();
date_default_timezone_set('Asia/Tashkent');

if ($uri == '/'){
    if (isset($_POST['title']) && isset($_POST['due_date'])) {
        $title = $_POST['title'];
        $due_date = new DateTime($_POST['due_date']);

        $todo->store($title, $due_date->format('Y-m-d H:i:s'));
        header('Location: /');
        exit();

    }
    require 'view.php';

}elseif($uri == '/complete'){
    if (isset($_GET['id'])) {
        $todo->completed($_GET['id']);
        header('Location: /');
        exit();
    }
}elseif($uri == '/progress'){
    if (isset($_GET['id'])) {
        $todo->progress($_GET['id']);
        header('Location: /');
        exit();
    }
}elseif($uri == '/pending'){
    if (isset($_GET['id'])) {
        $todo->pending($_GET['id']);
        header('Location: /');
        exit();
    }
} elseif($uri == '/delete') {
    if (isset($_GET['id'])) {
        $todo->delete($_GET['id']);
        header('Location: /');
//        exit();
    }
}



