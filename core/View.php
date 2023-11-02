<?php
class View{
    static function show($view_name, $data = []){
        global $app;
        include "app/views/{$view_name}.php";
    }
}