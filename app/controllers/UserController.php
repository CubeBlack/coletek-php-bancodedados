<?php
class UserController{
    public function index(){
        $users = UserModel::getAll();
        View::show('user_list', $users);
    }

    public function show(){
        $users = UserModel::getAll();
        //View::show('user_list', $users);
        echo "show()";
    }

    public function add(){
        $users = UserModel::getAll();
        View::show('user_form', $users);
    }

    public function delete(){
        $users = UserModel::getAll();
        //View::show('user_list', $users);
        echo "delete";
    }

}