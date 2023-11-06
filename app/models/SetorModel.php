<?php
class SetorModel extends Model{

    public $id;
    public $name;
    
    public function __construct() {
        $this->id = 0;
        $this->name='';
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
        
        
        return $user;
    }

    static function getAll($filter=[]){
        $conn = Model::getConexao();

        $sth = $conn->prepare("select * from setores order by id desc");
        $sth->execute();
        return $sth->fetchAll();
    }

    static function getUserNotAsigneds($user_id){
        $conn = Model::getConexao();

        $sth = $conn->prepare("SELECT * from setores
            WHERE NOT EXISTS(
                select setor_id 
                from user_setores 
                where user_setores.setor_id = setores.id
                    and user_id = :user_id 
            )
            
            order by id desc
           
        ");
        
        $sth->execute(['user_id'=>$user_id]);
        
        return $sth->fetchAll();
    }

    public function update(){
        $conn = $this->getConexao();
        
        $sth = $conn->prepare("UPDATE `setores` SET 
                `name` = :name 
            WHERE `setores`.`id` = :id");

        $sth->execute([
            'id'=>$this->id,
            'name'=>$this->name
        ]);

        SetorModel::$message = 'Setor atualizado com sucesso.';
        return $this;
    }

    static function create($name){
        $conn = Model::getConexao();
        
        $sth = $conn->prepare("INSERT `setores` SET 
            `name` = :name ");

        $sth->execute([
            'name'=>$name
        ]);

        return SetorModel::get($conn->lastInsertId());
    }

    static function createFake(){
        return SetorModel::create(Fake::makeString());
    }

    public function delete(){
        $conn = $this->getConexao();
        
        $sth = $conn->prepare("DELETE FROM `setores`  
            WHERE `id` = :id");

        $sth->execute([
            'id'=>$this->id
        ]);
    }
}
