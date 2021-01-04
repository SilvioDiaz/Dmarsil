<?php
    include 'banco.php';

    $id_tipo = $_GET['id'];

    $tipo_produto = $_POST['txtDescricao'];

    $query = "UPDATE tipo_produto SET nome_tipoProduto = '$tipo_produto'
                                WHERE id_tipoProduto   = $id_tipo";

    mysqli_query($conexao, $query);

    echo $query;
    // header('location:../index.php?pagina=categorias');
?>