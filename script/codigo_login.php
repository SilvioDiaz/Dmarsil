<?php
 include 'banco.php';
  if(!isset($_SESSION)){
    session_start();
  }

  if(isset($_GET['pagina'])){
    //Buscar query da URL
    $pagina = $_SERVER["QUERY_STRING"];
  }

$_SESSION['Usuario'] = array();
$login = $_POST['inputLogin'];
$senha = $_POST['inputSenha']; 



    $queryLogin= "SELECT id_usuario,id_tipo,nome from usuario WHERE login= '$login' AND senha='$senha';";
    $resultadoLogin = mysqli_query($conexao,$queryLogin);
    $_SESSION['Usuario'] = mysqli_fetch_array($resultadoLogin);

    if (!$_SESSION['Usuario']){
      header('location:../index.php?pagina=login&status=erro');
    }

    else{
        header('location:../index.php?'.$pagina.'&status=logado');
    }

?>