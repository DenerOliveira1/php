<?php

require_once("config.php");
use Classes\Usuario;

//$user = new Usuario();
//$user->loadById(10);
//echo $user;

//$usuarios = Usuario::getList();
//var_dump($usuarios);

$usuario = new Usuario();
$usuario->setDeslogin("marcela");
$usuario->setDessenha("123456");
$usuario->insert();
echo $usuario;

