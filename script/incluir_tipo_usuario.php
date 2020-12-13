<?php
    include 'banco.php';

    $descricao = $_POST['txtDescricao'];

    $query = "INSERT INTO tipo_usuario(descricao)
                   VALUES('$descricao');";

    #echo $query;

    mysqli_query($conexao, $query);

    header('location:../index.php?pagina=tipos_usuario');
?>