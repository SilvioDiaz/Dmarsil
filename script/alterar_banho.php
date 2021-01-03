<?php
    include 'banco.php';

    $id_banho = $_GET['id'];

    $nome_banho = $_POST['txtDescricao'];

    $query = "UPDATE banho SET nome_banho = '$id_banho'
                                WHERE id_banho   = $nome_banho";

    mysqli_query($conexao, $query);

    #echo $query;
    header('location:../index.php?pagina=tipos_usuario');
?>