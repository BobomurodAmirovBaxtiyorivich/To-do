<?php
if(!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = (new App\Users())->login($email, $password);
    if(!$user) {
        $_SESSION['error'] = 'Wrong email or password';
        header('location: /login');
        exit();
    }
    unset($user['password']);
    $_SESSION['user'] = $user;
    header('location: /todos');
    exit();
}