<?php
include_once "app/config.php";
include_once "autoload.php";

function get_lelative_url()
{
    $document_root = $_SERVER['DOCUMENT_ROOT'];
    $current_file_path = $_SERVER['SCRIPT_NAME'];

    $relative_path_file = str_replace($document_root, '', $current_file_path);
    $relative_path_sys = str_replace('index.php', '', $current_file_path);

    return $relative_path_sys;
}

function definir_rotas(){
    global $app;
    $app->set_rout('/^usuarios\/\d+\/delete$/', 'GET', 'UserController', 'delete');
    $app->set_rout('/^usuarios\/\d+/', 'GET', 'UserController', 'show');
    $app->set_rout('/^usuarios\/\d+/', 'POST', 'UserController', 'show_submit');
    $app->set_rout('/^usuarios\/add/', 'GET', 'UserController', 'add');
    $app->set_rout('/^usuarios\/add/', 'POST', 'UserController', 'add_submit');
    $app->set_rout('/^usuarios/', 'GET', 'UserController', 'index');
    
    $app->set_rout('/^setores/', 'GET', 'UserController', 'index');
    
    $app->set_rout('/^$/', 'GET', 'UserController', 'index');
}

$app = new App(get_lelative_url());

definir_rotas();

$app->show();
