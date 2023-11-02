<?php
final class UserModelTest{
    public function getAll(){
        $lista = UserModel::getAll();
        print_r($lista);
    }

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
}
