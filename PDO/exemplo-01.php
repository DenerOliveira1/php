<?php

$conn = new PDO("mysql:dbname=treinamento;host:localhost","root","");

$stmt = $conn->prepare("INSERT INTO tb_usuarios (deslogin, dessenha) VALUES (:LOGIN, :PASSWORD)");

$login = 'dener';
$password = '123456';

$stmt->bindParam(":LOGIN", $login);
$stmt->bindParam(":PASSWORD", $password);

$stmt->execute();

echo "Cadastrado com sucesso!!!";
