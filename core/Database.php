<?php

class Database{
    static protected $conn;

    public function getConexao(){
        if(Database::conn){
            return Database::conn;
        }

        try {
            $this->conn = new PDO("mysql:host=".DATABASE_HOST.";".
                "dbname=".DATABASE_NAME, 
                DATABASE_USER, 
                DATABASE_PASS);
            
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro na conexão com o banco de dados: " . $e->getMessage());
        }
    }
}