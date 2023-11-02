<?php
class UserController{
    public function index(){
        $users = UserModel::getAll();
        View::show('user_list', $users);
    }

    public function add(){
        $users = UserModel::getAll();
        View::show('user_form', $users);
    }

}