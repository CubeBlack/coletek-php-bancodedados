<?php
class UserModel extends Model{
    public $id = 0;
    public $name='';
    public $email='';

    public function __construct() {

    }

    static function get($id){
        $conn = Model::getConexao();

        $sth = $conn->prepare("SELECT * from users 
            where id = :id");
        $sth->execute(['id'=>$id]);
        $user_data = $sth->fetchAll();

        if(empty($user_data)){
            return null;
        }

        $user = new UserModel();
        
        $user->id = $user_data[0]['id']; 
        $user->name = $user_data[0]['name'];
        $user->email = $user_data[0]['email'];
        $user->message = '';

        return $user;
    }

    static function getAll($filter=[]){
        $conn = Model::getConexao();

        $sth = $conn->prepare("select * from users");
        $sth->execute();

        return $sth->fetchAll();
    }

    public function update(){
        $conn = $this->getConexao();
        
        $sth = $conn->prepare("UPDATE `users` SET 
                `name` = :name , 
                `email` = :email 
            WHERE `users`.`id` = :id");

        $sth->execute([
            'id'=>$this->id,
            'name'=>$this->name,
            'email'=>$this->email
        ]);

        $this->message = 'User atualizado com sucesso.';
        return $this;
    }

    static function create($name, $email){
        $conn = Model::getConexao();
        
        $sth = $conn->prepare("INSERT `users` SET 
            `name` = :name , 
            `email` = :email ");

        $sth->execute([
            'name'=>$name,
            'email'=>$email
        ]);

        return UserModel::get($conn->lastInsertId());
    }

    static function createFake(){
        return UserModel::create(Fake::makeName(), Fake::makeEmail());
    }

    public function delete(){
        $conn = $this->getConexao();
        
        $sth = $conn->prepare("DELETE FROM `users`  
            WHERE `id` = :id");

        $sth->execute([
            'id'=>$this->id
        ]);

        $this->message = 'User apagado com sucesso.';
    }
}
