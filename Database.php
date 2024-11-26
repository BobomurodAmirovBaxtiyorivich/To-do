<?php

class Database
{
    public $pdo;
    public function __construct(){
        try {

            $this->pdo = new PDO("mysql:host=localhost;dbname=toDo", "root", "root");

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set error mode for exceptions

        } catch (PDOException $e) {

            die("Database connection failed: " . $e->getMessage());

        }
    }
    public function store(string $title, string $status, DateTime $crDate): bool
    {
        $sql = "INSERT INTO todos (title, status, created_at) VALUES (?, ?, ?)"; //Use prepared statements with placeholders.
        try {
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([$title, $status, $crDate->format('Y-m-d H:i:s')]);
        } catch (PDOException $e) {
            error_log("Database error in store: " . $e->getMessage());
            return false;
        }
    }
}