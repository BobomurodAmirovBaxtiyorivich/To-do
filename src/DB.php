<?php
class DB
{
    public PDO $pdo;
    public function __construct(){
            $this->pdo = new PDO("mysql:host=localhost;dbname=toDo", "root", "root");
    }
}