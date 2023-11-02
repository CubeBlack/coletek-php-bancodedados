<?php
include_once "app/config.php";
include_once "autoload.php";

$document_root = $_SERVER['DOCUMENT_ROOT'];
$current_file_path = $_SERVER['SCRIPT_NAME'];

$relative_path_file = str_replace($document_root, '', $current_file_path);
$relative_path_sys = str_replace('index.php', '', $current_file_path);

$app = new App($relative_path_sys);

$app->set_rout('', 'GET', 'UserController', 'index');
$app->set_rout('usuarios', 'GET', 'UserController', 'index');
$app->set_rout('usuarios/$id', 'GET', 'UserController', 'index');
$app->set_rout('usuarios/add', 'GET', 'UserController', 'add');
$app->set_rout('setores', 'GET', 'UserController', 'index');

$app->show();
