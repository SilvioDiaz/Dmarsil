<?php
    include 'banco.php';

    $login = $_POST['txtLogin'];
    $senha = $_POST['txtSenha'];
    $nome = $_POST['txtNome'];
    $email = $_POST['txtEmail'];
    $nascimento = substr($_POST['txtNascimento'], 6, 4).'-'.substr($_POST['txtNascimento'], 3, 2).'-'.substr($_POST['txtNascimento'], 0, 2);
    $endereco = $_POST['txtEndereco'];
    $numero = $_POST['txtNumero'];
    $complemento = $_POST['txtComplemento'];
    $bairro = $_POST['txtBairro'];
    $cidade = $_POST['txtCidade'];
    $estado = $_POST['cmbEstado'];
    $cep = $_POST['txtCep'];
    $telefone = $_POST['txtTelefone'];
    $tipo = $_POST['cmbTipo'];

    $query = "INSERT INTO usuario(login,
                                  senha,
                                  nome,
                                  email,
                                  nascimento,
                                  endereco,
                                  numero,
                                  complemento,
                                  bairro,
                                  cidade,
                                  id_estado,
                                  cep,
                                  telefone,
                                  id_tipo)
                           VALUES('$login',
                                  '$senha',
                                  '$nome',
                                  '$email',
                                  '$nascimento',
                                  '$endereco',
                                  '$numero',
                                  '$complemento',
                                  '$bairro',
                                  '$cidade',
                                  $estado,
                                  '$cep',
                                  '$telefone',
                                  $tipo);";

    mysqli_query($conexao, $query);

    header('location:../index.php?pagina=usuarios');
?>