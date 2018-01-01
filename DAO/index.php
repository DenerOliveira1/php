<?php

require_once("config.php");
use Classes\Usuario;

$user = new Usuario();
$user->loadById(10);

echo $user;

$usuarios = Usuario::getList();

var_dump($usuarios);

