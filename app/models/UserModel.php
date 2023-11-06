<?php
class UserModel extends Model{
    public $id = 0;
    public $name='';
    public $email='';
    public $setores='';

    public function __construct() {

    }

    static function get($id){
        $conn = Model::getConexao();

        $sth = $conn->prepare("SELECT 
                users.*, 
                GROUP_CONCAT(setores.name SEPARATOR ', ') as setores
            from users
            left join user_setores on user_setores.user_id = users.id
            left join setores on setores.id = user_setores.setor_id
            where users.id = :id
            group by users.id");
        $sth->execute(['id'=>$id]);
        $user_data = $sth->fetchAll();

        if(empty($user_data)){
            return null;
        }

        $user = new UserModel();
        
        $user->id = $user_data[0]['id']; 
        $user->name = $user_data[0]['name'];
        $user->email = $user_data[0]['email'];
        $user->setores = $user_data[0]['setores'];

        UserModel::$message = '';

        return $user;
    }

    static function getBySetor($setor=''){
        $conn = Model::getConexao();

        if($setor == ''){
            return userModel::getAll();
        }


        $sth = $conn->prepare("SELECT
                users.*, 
                GROUP_CONCAT(setores.name SEPARATOR ', ') as setores
            
            from users
            
            left join user_setores on user_setores.user_id = users.id
            left join setores on setores.id = user_setores.setor_id
            
            where EXISTS(
                select user_id from user_setores c
                where user_setores.setor_id = :setor_id
                )
            
            group by users.id
        ");
        
        $sth->execute(['setor_id'=>$setor]);

        return $sth->fetchAll();
    }

    static function getAll(){
        $conn = Model::getConexao();

        $sth = $conn->prepare("SELECT 
                users.*, 
                GROUP_CONCAT(setores.name SEPARATOR ', ') as setores
            from users
            left join user_setores on user_setores.user_id = users.id
            left join setores on setores.id = user_setores.setor_id
            group by users.id
        ");
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

        UserModel::$message = 'User atualizado com sucesso.';
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
