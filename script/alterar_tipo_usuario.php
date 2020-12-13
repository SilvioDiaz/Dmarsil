<?php
    include 'banco.php';

    $id_tipo = $_GET['id'];

    $descricao = $_POST['txtDescricao'];

    $query = "UPDATE tipo_usuario SET descricao = '$descricao'
                                WHERE id_tipo   = $id_tipo";

    mysqli_query($conexao, $query);

    #echo $query;
    header('location:../index.php?pagina=tipos_usuario');
?>