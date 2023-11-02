<?php
final class UserModelTest{
    public function getAll(){
        $lista = UserModel::getAll();
        var_dump($lista);
    }
}
