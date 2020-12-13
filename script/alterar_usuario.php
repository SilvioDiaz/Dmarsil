<?php
    include 'banco.php';

    $id_usuario = $_GET['id'];

    $login = $_POST['txtLogin'];
    $senha = $_POST['txtSenha'];
    $nome = $_POST['txtNome'];
    $email = $_POST['txtEmail'];
    $nascimento = substr($_POST['txtNascimento'],6,4).'-'.
                  substr($_POST['txtNascimento'],3,2).'-'.
                  substr($_POST['txtNascimento'],0,2);
    $endereco = $_POST['txtEndereco'];
    $numero = $_POST['txtNumero'];
    $complemento = $_POST['txtComplemento'];
    $bairro = $_POST['txtBairro'];
    $cidade = $_POST['txtCidade'];
    $estado = $_POST['cmbEstado'];
    $cep = $_POST['txtCep'];
    $telefone = $_POST['txtTelefone'];
    $tipo = $_POST['cmbTipo'];

    $query = "UPDATE usuario SET login        = '$login',
                                 senha        = '$senha',
                                 nome         = '$nome',
                                 email        = '$email',
                                 nascimento   = '$nascimento',
                                 endereco     = '$endereco',
                                 numero       = '$numero',
                                 complemento  = '$complemento',
                                 bairro       = '$bairro',
                                 cidade       = '$cidade',
                                 id_estado    = $estado,
                                 cep          = '$cep',
                                 telefone     = '$telefone',
                                 id_tipo      = $tipo
                           WHERE id_usuario   = $id_usuario";

    mysqli_query($conexao, $query);

    #echo $query;
    header('location:../index.php?pagina=usuarios');
?>