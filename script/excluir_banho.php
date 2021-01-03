<?php
    include 'banco.php';

    $id = $_GET['id'];

    $query = "DELETE FROM banho WHERE id_banho = $id";

    mysqli_query($conexao, $query);

    header('location:../index.php?pagina=tipos_usuario');
?>