<?php

$conn = new PDO("mysql:dbname=treinamento;host:localhost","root","");

$conn->beginTransaction();

$stmt = $conn->prepare("DELETE FROM tb_usuarios WHERE idusuario = :ID");

$id = 4;

$stmt->bindParam(":ID", $id);

$stmt->execute();

//$conn->rollBack();
$conn->commit();

echo "Deletado com sucesso!!!";
