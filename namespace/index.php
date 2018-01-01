<?php

require_once ("config.php");

use Cliente\Cadastro;

$cad = new Cadastro();

$cad->setNome("Dener");
$cad->setEmail("dener@teste.com.br");
$cad->setSenha("123456");

echo $cad . "<br/>";

echo $cad->registrarVenda();
