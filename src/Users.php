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
    public function register($name, $email,$password): mixed
    {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->db->pdo->prepare($query);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return false;
        }
        $stmt = $this->db->pdo->prepare("INSERT INTO users (full_name, email, password) VALUES (:name, :email, :password)");
        $stmt->execute([
            'email' => $email,
            'password' => $password,
            'name' => $name
        ]);
        return $this->getUserById($this->db->pdo->lastInsertId());
    }
    public function getUserById(int $id)
    {
        $stmt = $this->db->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute([
            'id' => $id,
        ]);
        return $stmt->fetch();
    }
}