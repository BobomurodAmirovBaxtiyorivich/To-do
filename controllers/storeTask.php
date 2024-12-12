<?php
if (isset($_POST['title']) && isset($_POST['due_date'])) {
    $title = $_POST['title'];
    $dueDate = new \DateTime($_POST['due_date']);
    (new App\ToDo())->store($title, $dueDate->format('Y-m-d H:i:s'),$_SESSION['user']['id']);
    header('Location: /todos');
    exit();
}