<?php

require_once ("config.php");

use DB\Sql;

$sql = new Sql();

$query = null;

if(isset($_POST['salvar'])){
    $sql->query("UPDATE tb_usuarios SET deslogin = :deslogin, dessenha = :dessenha WHERE idusuario = :idusuario", array(
        ":deslogin"=>$_POST['deslogin'],
        ":dessenha"=>$_POST['dessenha'],
        ":idusuario"=>$_POST['idusuario']
    ));    
}else if(isset($_POST['excluir'])){
    $sql->query("DELETE FROM tb_usuarios WHERE idusuario = :idusuario", array(
        ":idusuario"=>$_POST['idusuario']
    ));
}

$results = $sql->select("SELECT * FROM tb_usuarios");

if(count($results) > 0){

    echo "<table><tr>";
    echo "<th>ID</th>";
    echo "<th>Login</th>";
    echo "<th>Senha</th>";
    echo "<th>Data do cadastro</th>";
    echo "<th> </th>";
    echo "<th> </th>";
    echo "</tr>";
    
    foreach ($results as $row) {
        echo "<tr><form method='POST'>";
        
        echo "<td><input type='number' name='idusuario' value='" . $row['idusuario'] . "'></td>";
        echo "<td><input type='text' name='deslogin' value='" . $row['deslogin'] . "'></td>";
        echo "<td><input type='text' name='dessenha' value='" . $row['dessenha'] . "'></td>";
        echo "<td><input type='date' name='dtcadastro' value='" . $row['dtcadastro'] . "'></td>";
        
        echo "<td><input type='submit' name='salvar' value='Salvar'></td>";
        echo "<td><input type='submit' name='excluir' value='Excluir'></td>";
        echo "</form></tr>";
    }
    
    echo "</table>";
}else{
    echo "Nenhum resultado.";
}

