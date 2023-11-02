<?php
class UserModel extends Model{
    static function get($id){
        $user = new UserModel();

        return $user;
    }

    static function getAll($filter=[]){
        $conn = Model::getConexao();
        $sth = $conn->prepare("select * from users");
        $sth->execute();
        return $sth->fetchAll();
    }

    public function update(){

    }

    public function create(){

    }

    public function delete(){

    }
}
