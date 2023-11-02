<?php
class UserModel extends Model{

    public function __construct() {
        $this->id = 0;
        $this->name='';
        $this->email='';
    }

    static function get($id){

        $conn = Model::getConexao();
        $sth = $conn->prepare("select * from users");
        $sth->execute();
        $user_data = $sth->fetchAll();

        if(empty($user_data)){
            return null;
        }

        $user = new UserModel();
        
        $user->id = $user_data[0]['id']; 
        $user->name = $user_data[0]['name'];
        $user->email = $user_data[0]['email'];
        
        
        return $user;
    }

    static function getAll($filter=[]){
        $conn = Model::getConexao();
        $sth = $conn->prepare("select * from users");
        $sth->execute();
        return $sth->fetchAll();
    }

    public function update(){
        $conn = Model::getConexao();
        
        $sth = $conn->prepare("UPDATE `users` SET 
                `name` = :name , 
                `email` = :email 
            WHERE `users`.`id` = :id");

        $sth->execute([
            'id'=>$this->id,
            'name'=>$this->name,
            'email'=>$this->email
        ]);

        return $sth->fetchAll();
    }

    public function create(){

    }

    public function delete(){

    }
}
