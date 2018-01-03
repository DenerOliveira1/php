<?php

$conn = new PDO("mysql:host=localhost;dbname=treinamento","root","");

if(isset($_POST['salvar'])){
    $stmt = $conn->prepare("UPDATE tb_usuarios SET deslogin = :DESLOGIN, dessenha = :DESSENHA, dtcadastro = :DTCADASTRO WHERE idusuario = :IDUSUARIO");
}

$stmt = $conn->prepare("SELECT * FROM tb_usuarios");

$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
        
        foreach ($row as $key => $value) {
            echo "<td>$value</td>";
        }
        
        echo "<td><input type='submit' name='salvar' value='Salvar'></td>";
        echo "<td><input type='submit' name='excluir' value='Excluir'></td>";
        echo "</form></tr>";
    }
    
    echo "</table>";
}else{
    echo "Nenhum resultado.";
}

