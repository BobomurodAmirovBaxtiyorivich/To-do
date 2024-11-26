<?php

require 'src/DB.php';
class ToDo
{
    public DB $db;
    public function __construct(){
        $this->db = new DB();
    }
    public function store(string $title, string $status, DateTime $crDate): bool
    {
        $sql = "INSERT INTO todos (title, status, created_at) VALUES (?, ?, ?)";
        $stmt = $this->db->pdo->prepare($sql);
        return $stmt->execute([$title, 'pending', $crDate->format('Y-m-d H:i:s')]);
    }

    public function get(): false|array
    {
        $sql = "Select * from todos";
        $stmt = $this->db->pdo->query($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}