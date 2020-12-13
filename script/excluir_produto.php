<?php
    include 'banco.php';

    $id = $_GET['id'];

    $query = "SELECT * FROM produto WHERE id_produto = $id";

    $consulta = mysqli_query($conexao, $query);

    $linha = mysqli_fetch_array($consulta);

    unlink('../' . $linha['imagem_produto']);

    $query = "DELETE FROM produto WHERE id_produto = $id";

    mysqli_query($conexao, $query);

    header('location:../index.php?pagina=produtos');
?>