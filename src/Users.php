<?php

namespace App;

class Users
{
    public DB $db;
    public function __construct(){
        $this->db = new DB();
    }
    public function login($email, $password){
        $stmt = $this->db->pdo->query("SELECT * FROM users WHERE email = $email AND password = $password");
        $stmt->execute();
        return $stmt->fetch();
    }
    public function register($email, $password,$name): bool
    {
        $stmt = $this->db->pdo->prepare("INSERT INTO users (full_name,email, password) VALUES (:name,:email, :password)");
        return $stmt->execute([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);
    }
}