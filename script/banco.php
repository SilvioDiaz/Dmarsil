<?php
    $servidor = 'localhost';
    $usuario = 'root';
    $senha = 'Silvio10.';
    $db = 'appDB';

    $conexao = mysqli_connect($servidor, $usuario, $senha, $db, "3306");

    if(!$conexao){
        echo 'Erro ao conectar no banco de dados';
    }
?>