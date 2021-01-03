<?php
    include 'banco.php';

    $nome_modelo = $_POST['txtDescricao'];

    $query = "INSERT INTO modelo(nome_modelo)
                   VALUES('$nome_modelo');";

    #echo $query;

    mysqli_query($conexao, $query);

    header('location:../index.php?pagina=tipos_usuario');
?>