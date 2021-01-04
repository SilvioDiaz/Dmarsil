<?php
    include 'banco.php';

    $tipo_produto = $_POST['txtDescricao'];

    $query = "INSERT INTO tipo_produto(nome_tipoProduto)
                   VALUES('$tipo_produto');";

    #echo $query;

    mysqli_query($conexao, $query);

    header('location:../index.php?pagina=categorias');
?>