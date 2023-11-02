<?php
class DatabaseTest
{
    public function conectar(){
        $database = new Database();
        $conexao = $database->getConexao();
        
        if($conexao){
            return true;
        }
        
    }
}
