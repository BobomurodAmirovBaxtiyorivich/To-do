<?php
if(!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = (new App\Users())->login($email, $password);
    if(!$user) {
        $_SESSION['error'] = 'User not found';
        header('location: /login');
        exit();
    }
    if(!password_verify($password, $user['password'])) {
        $_SESSION['error'] = 'Wrong password';
        header('location: /login');
        exit();
    }
}