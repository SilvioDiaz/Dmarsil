<?php
    include 'banco.php';

    $id = $_GET['id'];

    $query = "DELETE FROM tipo_produto WHERE id_tipoProduto = $id";

    mysqli_query($conexao, $query);

    header('location:../index.php?pagina=categorias');
?>