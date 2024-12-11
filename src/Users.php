<?php

namespace App;

class Users
{
    public DB $db;
    public function __construct(){
        $this->db = new DB();
    }
    public function login($email, $password){
        $stmt = $this->db->pdo->query("SELECT * FROM users WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $user =  $stmt->fetch();

        if (!$user) {
            return 'User not found';
        }
        if (!password_verify($password, $user['password'])) {
            return 'Wrong password';
        }
        return $user;
    }
    public function register($name, $email,$password): bool
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "SELECT * FROM users WHERE email = '$email'";
        $stmt = $this->db->pdo->prepare($query);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return false;
        }
        $stmt = $this->db->pdo->prepare("INSERT INTO users (full_name, email, password) VALUES (:name, :email, :password)");
        return $stmt->execute([
            'email' => $email,
            'password' => $password,
            'name' => $name
        ]);
    }
}