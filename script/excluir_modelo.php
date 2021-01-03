<?php
    include 'banco.php';

    $id = $_GET['id'];

    $query = "DELETE FROM modelo WHERE id_modelo = $id";

    mysqli_query($conexao, $query);

    header('location:../index.php?pagina=tipos_usuario');
?>