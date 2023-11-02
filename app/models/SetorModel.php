<?php
class SetorModel extends Model{

    public function __construct() {
        $this->id = 0;
        $this->name='';
        $this->email='';
    }

    static function get($id){
        $conn = Model::getConexao();

        $sth = $conn->prepare("SELECT * from setores 
            where id = :id");
        $sth->execute(['id'=>$id]);
        $user_data = $sth->fetchAll();

        if(empty($user_data)){
            return null;
        }

        $user = new SetorModel();
        
        $user->id = $user_data[0]['id']; 
        $user->name = $user_data[0]['name'];
        $user->email = $user_data[0]['email'];
        
        
        return $user;
    }

    static function getAll($filter=[]){
        $conn = Model::getConexao();

        $sth = $conn->prepare("select * from setores");
        $sth->execute();
        return $sth->fetchAll();
    }

    public function update(){
        $conn = $this->getConexao();
        
        $sth = $conn->prepare("UPDATE `userses` SET 
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

    static function create($name, $email){
        $conn = Model::getConexao();
        
        $sth = $conn->prepare("INSERT `userses` SET 
            `name` = :name , 
            `email` = :email ");

        $sth->execute([
            'name'=>$name,
            'email'=>$email
        ]);

        return SetorModel::get($conn->lastInsertId());
    }

    public function delete(){
        $conn = $this->database->getConexao();
    }
}
