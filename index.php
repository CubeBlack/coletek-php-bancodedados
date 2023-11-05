<?php
include_once "app/config.php";
include_once "autoload.php";

function get_lelative_url()
{
    $relative_path_file = str_replace($_SERVER['DOCUMENT_ROOT'], '', $_SERVER['SCRIPT_NAME']);
    $relative_path_sys = str_replace('index.php', '', $relative_path_file);

    return $relative_path_sys;
}

function definir_rotas(){
    global $app;
    $app->set_rout('/users\/(\d+)\/setores\/(\d+)\/delete/', 'GET', 'UserSetorController', 'delete');
    $app->set_rout('/users\/(\d+)\/setores\/(\d+)\/delete/', 'POST', 'UserSetorController', 'delete_submit');
    $app->set_rout('/users\/(\d+)\/setores\/add/', 'GET', 'UserSetorController', 'add');
    $app->set_rout('/users\/(\d+)\/setores/', 'GET', 'UserSetorController', 'index');

    $app->set_rout('/users\/(\d+)\/delete/', 'GET', 'UserController', 'delete');
    $app->set_rout('/users\/(\d+)\/delete/', 'POST', 'UserController', 'delete_submit');
    $app->set_rout('/users\/(\d+)/', 'GET', 'UserController', 'show');
    $app->set_rout('/^users\/(\d+)/', 'POST', 'UserController', 'show_submit');
    $app->set_rout('/^users\/add/', 'GET', 'UserController', 'add');
    $app->set_rout('/^users\/add/', 'POST', 'UserController', 'add_submit');
    $app->set_rout('/^users/', 'GET', 'UserController', 'index');
    
    $app->set_rout('/setores\/(\d+)\/delete/', 'GET', 'SetorController', 'delete');
    $app->set_rout('/setores\/(\d+)\/delete/', 'POST', 'SetorController', 'delete_submit');
    $app->set_rout('/setores\/(\d+)/', 'GET', 'SetorController', 'show');
    $app->set_rout('/^setores\/(\d+)/', 'POST', 'SetorController', 'show_submit');
    $app->set_rout('/^setores\/add/', 'GET', 'SetorController', 'add');
    $app->set_rout('/^setores\/add/', 'POST', 'SetorController', 'add_submit');
    $app->set_rout('/^setores/', 'GET', 'SetorController', 'index');
    
    $app->set_rout('/^$/', 'GET', 'UserController', 'index');
}

$app = new App(get_lelative_url());

definir_rotas();

$app->show();
