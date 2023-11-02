<?php
class View{
    static function show($view_name, $data = []){
        include "app/views/{$view_name}.php";
    }
}