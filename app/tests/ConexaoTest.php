<?php
class ConexaoTest //extends AnotherClass implements Interface
{
    public function conectar(){
        $conexao = new Conexao(DATABASE_DB_HOST, DATABASE_DB_NAME, DATABASE_DB_USER, DATABASE_DB_PASS );
        if($conexao->getConexao()){
            return true;
        }
        
    }
}
