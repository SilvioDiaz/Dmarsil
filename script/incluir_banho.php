<?php
    include 'banco.php';

    $nome_banho = $_POST['txtDescricao'];

    $query = "INSERT INTO banho(nome_banho)
                   VALUES('$nome_banho');";

    #echo $query;

    mysqli_query($conexao, $query);

    header('location:../index.php?pagina=tipos_usuario');
?>