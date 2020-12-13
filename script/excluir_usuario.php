<?php
    include 'banco.php';

    $id = $_GET['id'];

    $query = "DELETE FROM usuario WHERE id_usuario = $id";

    mysqli_query($conexao, $query);

    header('location:../index.php?pagina=usuarios');
?>