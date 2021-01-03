<?php
    include 'banco.php';

    $id_modelo = $_GET['id'];

    $nome_modelo = $_POST['txtDescricao'];

    $query = "UPDATE modelo SET nome_modelo = '$id_modelo'
                                WHERE id_modelo   = $nome_modelo";

    mysqli_query($conexao, $query);

    #echo $query;
    header('location:../index.php?pagina=tipos_usuario');
?>