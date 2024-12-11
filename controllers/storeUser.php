<?php
if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])){
    if($_POST['password'] !== $_POST['confirm_password']){
        $_SESSION['error'] = 'Passwords do not match';
        header('Location: /register');
        exit();
    }
    $user = (new App\Users())->register($_POST['name'],$_POST['email'],$_POST['password']);
    if($user){
        unset($_SESSION['error']);
        unset($user['password']);
        $_SESSION['user'] = $user;
        header('Location: /todos');
        exit();
    }
    $_SESSION['error'] = 'Email already exists';
    header('Location: /register');
}