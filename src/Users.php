<?php

namespace App;

class Users
{
    public DB $db;
    public function __construct(){
        $this->db = new DB();
    }
    public function login($email, $password){

    }
    public function register($email, $password,$name){

    }
}