<?php
class Model{
    public $conexao;
    
    public function __construct() {
        $this->conexao =  Model::getConexao();
    }

    static function getConexao(){
        $conexao = new Conexao(DATABASE_DB_HOST, DATABASE_DB_NAME, DATABASE_DB_USER, DATABASE_DB_PASS);
        return $conexao->getConexao();
    }
   
}
