<?php
class Conexao {
    private $host;
    private $dbname;
    private $usuario;
    private $senha;
    private $pdo;

    public function __construct($host, $dbname, $usuario, $senha) {
        
        $this->host = $host;
        $this->dbname = $dbname;
        $this->usuario = $usuario;
        $this->senha = $senha;

        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $usuario, $senha);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro na conexão com o banco de dados: " . $e->getMessage());
        }
    }

    public function getConexao() {
        return $this->pdo;
    }
}