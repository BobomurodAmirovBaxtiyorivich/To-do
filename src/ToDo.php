<?php

require 'src/DB.php';
class ToDo
{
    public DB $db;
    public function __construct(){
        $this->db = new DB();
    }
    public function store(string $title, string $dueDate): bool
    {
        $sql = "INSERT INTO todos (title, status, due_date,created_at) VALUES (?, ?, ?,NOW())";
        $stmt = $this->db->pdo->prepare($sql);
        return $stmt->execute([$title, 'pending', $dueDate]);
    }
    public function getAllTodos(): false|array
    {
        $sql = "Select * from todos";
        $stmt = $this->db->pdo->query($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function completed(int $id): bool
    {
        $sql = "UPDATE todos set status='completed',updated_at=NOW() where id=:id";
        return $this->db->pdo->prepare($sql)->execute([
            'id' => $id
        ]);
    }
    public function progress(int $id): bool
    {
        $sql = "UPDATE todos set status='in_progress',updated_at=NOW()where id=:id";
        return $this->db->pdo->prepare($sql)->execute([
            'id' => $id
        ]);
    }
    public function pending(int $id): bool
    {
        $sql = "UPDATE todos set status='pending',updated_at=NOW() where id=:id";
        return $this->db->pdo->prepare($sql)->execute([
            'id' => $id
        ]);
    }
    public function delete(int $id): bool
    {
        $sql = "DELETE FROM todos WHERE id =:id";
        return $this->db->pdo->prepare($sql)->execute([
            'id' => $id
        ]);
    }
}
