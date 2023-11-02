<?php
final class SetorModelTest{
    public function retornar_todos_setores(){
        $lista = SetorModel::getAll();
        echo "Retorno contem " . count($lista) . " itens.\n";
    }

   /*

    public function get(){
        print_r(UserModel::get(1));
    }

     

    public function update(){
        $user = UserModel::get(1);

        $old_name = $user->name;
        $old_email = $user->email;

        $user->name = Fake::makeName();
        $user->email = Fake::makeEmail();

        $user->update();

        $user = UserModel::get(1);

        if($user->name == $old_name){
            trigger_error("Name não atualizado!", E_USER_ERROR);
        }

        if($user->email == $old_email){
            trigger_error("Email não atualizado!", E_USER_ERROR);
        }
    }

    
    public function create(){
        $new_user_name = Fake::makeName();
        $new_user_email = Fake::makeEmail();

        $user = UserModel::create($new_user_name, $new_user_email);
                
        $user = UserModel::get($user->id);
        

        if($user->name != $new_user_name){
            var_dump($user->name);
            var_dump($new_user_name);
            trigger_error("'Name' do usuario diferente do esperado", E_USER_ERROR);
        }

        if($user->email != $new_user_email){
            trigger_error("'Email' diferente do esperado!", E_USER_ERROR);
        }
    }

    */
}
