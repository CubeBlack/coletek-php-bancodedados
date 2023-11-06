<?php

class Database{
    protected $conn;

    public function getConexao(){
        if(isset($this->conn)){
            if($this->conn){
                return $this->conn;
            }
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

        return $this->conn;
    }

    function create_table_users(){
        $sth = $this->conn->prepare("CREATE TABLE IF NOT EXISTS`users` (
            `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `name` varchar(100) NOT NULL,
            `email` varchar(100) NOT NULL
          )
        ");

        $sth->execute();
    }

    function create_table_setores(){
        $sth = $this->conn->prepare("CREATE TABLE IF NOT EXISTS `setores` (
            `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `name` varchar(50) NOT NULL
          ) 
        ");

        $sth->execute();
    }

    function create_table_user_setores(){
        $sth = $this->conn->prepare("CREATE TABLE IF NOT EXISTS `user_setores` (
            `setor_id` int(11) NOT NULL,
            `user_id` int(11) NOT NULL,
            UNIQUE KEY unique_relationship (setor_id, user_id),
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
            FOREIGN KEY (setor_id) REFERENCES setores(id) ON DELETE CASCADE
          ) 
        ");

        $sth->execute();
    }

    function up(){
        $this->getConexao();
        
        $this->create_table_users();
        $this->create_table_setores();
        $this->create_table_user_setores();
        
    }

    function drop_table_users(){
        $sth = $this->conn->prepare("DROP TABLE IF EXISTS `users`");
        $sth->execute();
    }

    function drop_table_setores(){
        $sth = $this->conn->prepare("DROP TABLE IF EXISTS `setores`");
        $sth->execute();
    }

    function drop_table_user_setores(){
        $sth = $this->conn->prepare("DROP TABLE IF EXISTS `user_setores`");
        $sth->execute();
    }

    function down(){
        $this->getConexao();
        $this->drop_table_user_setores();
        $this->drop_table_users();
        $this->drop_table_setores();
        
    }

    public function refresh(){
        $this->down();
        $this->up();
    }

}