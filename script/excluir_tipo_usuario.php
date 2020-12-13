<?php
    include 'banco.php';

    $id = $_GET['id'];

    $query = "DELETE FROM tipo_usuario WHERE id_tipo = $id";

    mysqli_query($conexao, $query);

    header('location:../index.php?pagina=tipos_usuario');
?>