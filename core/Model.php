<?php
class Model{
    protected $database;
    static $message = '';
    
    public function __construct() {
        $this->database = new Database();
    }

    static function getConexao(){
        $database = new Database();
        return $database->getConexao();
    }
   
}
