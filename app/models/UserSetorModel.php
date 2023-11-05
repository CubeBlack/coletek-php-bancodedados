<?php
class UserSetorModel extends Model{
    public $user_id = 0;
    public $setor_id = 0;
    public $setor_name = '';
    public $user_name = '';


    public function __construct() {

    }

    static function getAll(){
        $conn = Model::getConexao();

        $sth = $conn->prepare("SELECT 
                user_setores.user_id,
                user_setores.setor_id,
                setores.name as setor_name,
                users.name as user_name
            FROM user_setores
            inner join setores on setores.id = user_setores.setor_id
            inner join users on users.id = user_setores.user_id
        ");
        $sth->execute([]);

        return $sth->fetchAll();
    }

    static function getAllByUser($user_id){
        $conn = Model::getConexao();

        $sth = $conn->prepare("SELECT 
                user_setores.user_id,
                user_setores.setor_id,
                setores.name as setor_name,
                users.name as user_name
            FROM user_setores
            inner join setores on setores.id = user_setores.setor_id
            inner join users on users.id = user_setores.user_id
            WHERE user_id = :user_id
        ");
        $sth->execute(['user_id'=>$user_id]);

        return $sth->fetchAll();
    }

    static function get($user_id, $setor_id){
        $conn = Model::getConexao();

        $sth = $conn->prepare("SELECT 
                user_setores.user_id,
                user_setores.setor_id,
                setores.name as setor_name,
                users.name as user_name
            FROM user_setores
            inner join setores on setores.id = user_setores.setor_id
            inner join users on users.id = user_setores.user_id
            WHERE user_id = :user_id
            AND setor_id = :setor_id
            ");

        $sth->execute([
            'user_id'=>$user_id,
            'setor_id'=>$setor_id
        ]);

        $user_setor_data = $sth->fetchAll();

        if(empty($user_setor_data)){
            return null;
        }

        $userSetor = new UserSetorModel();
        
        $userSetor->user_id = $user_setor_data[0]['user_id']; 
        $userSetor->user_name = $user_setor_data[0]['user_name']; 
        $userSetor->setor_id = $user_setor_data[0]['setor_id'];
        $userSetor->setor_name = $user_setor_data[0]['setor_name'];

        return $userSetor;
    }

    static function create($user_id, $setor_id){
        $conn = Model::getConexao();
        
        $sth = $conn->prepare("INSERT `user_setores` SET 
            `user_id` = :user_id , 
            `setor_id` = :setor_id ");

        $sth->execute([
            'user_id'=>$user_id,
            'setor_id'=>$setor_id
        ]);

        return UserSetorModel::get($user_id, $setor_id);
    }

    static function createRand(){
        $users = UserModel::getAll();
        $setores = UserModel::getAll();
        
        $random_users = $setores[array_rand($users)];
        $random_setores = $setores[array_rand($setores)];

        $novo_user_setor = UserSetorModel::create($random_setores['id'],$random_users['id']);
        
        return $novo_user_setor;
    }

    public function delete(){
        $conn = $this->getConexao();
        
        $sth = $conn->prepare("DELETE FROM `user_setores`  
            WHERE `user_id` = :user_id
            AND `setor_id` = :setor_id
            ");

        $sth->execute([
            'user_id'=>$this->user_id,
            'setor_id'=>$this->setor_id
        ]);

        $this->message = 'Usuario desvinculado do setor';
    }
}
