<?php

$conn = new PDO("mysql:dbname=treinamento;host:localhost","root","");

$stmt = $conn->prepare("UPDATE tb_usuarios SET deslogin = :LOGIN, dessenha = :PASSWORD WHERE idusuario = :ID");

$login = 'marcela';
$password = '789';
$id = 1;

$stmt->bindParam(":LOGIN", $login);
$stmt->bindParam(":PASSWORD", $password);
$stmt->bindParam(":ID", $id);

$stmt->execute();

echo "Alterado com sucesso!!!";
