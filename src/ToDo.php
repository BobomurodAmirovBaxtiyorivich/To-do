<?php
namespace App;

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
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function edit(int $id): false|array
    {
        $sql = "Select * from todos where id=:id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function delete(int $id): bool
    {
        $sql = "DELETE FROM todos WHERE id =:id";
        return $this->db->pdo->prepare($sql)->execute([
            'id' => $id
        ]);
    }
    public function update(int $id, string $title, string $status,string $dueDate): bool
    {
        $dueDate = new \DateTime();
        $sql = "UPDATE todos set title=:title,status=:status,due_date=:due_date,updated_at=NOW() where id=:id";
        $dueDate = $dueDate->format('Y-m-d H:i:s');
        $stmt = $this->db->pdo->prepare($sql);
        return $stmt->execute([
            'id' => $id,
            'title' => $title,
            'status' => $status,
            'due_date' => $dueDate
        ]);
    }
}
