<!-- BASE INTEIRA DO SITE -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>    <link rel="sylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> 
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
</head>
<body>

<?php
  if(isset($_SESSION['Usuario'])){
    $query = 'SELECT nome,id_tipo FROM usuario WHERE id_usuario=' . $_SESSION['Usuario']['id_usuario'];
    $consulta = mysqli_query($conexao, $query);
    $resultadoHeader = mysqli_fetch_array($consulta);

  }

    $login = 'Logar';
    $direcionamento = "href='#' data-toggle='modal' data-target='#exampleModal'";

    if (isset($_SESSION['Usuario'])){
        $login = $resultadoHeader['nome'];
        $direcionamento = "href='index.php?pagina=perfil'";
    }else{
        
    }

    if(isset($_GET['status'])){
        if($_GET['status'] == 'logado'){
            echo "<script> alert('Logado')</script>";

        }else if($_GET['status'] == 'erro'){
            echo "<script> alert('Algo deu errado')</script>";

        }else if($_GET['status'] == 'desconectado'){
            echo "<script> alert('Você foi desconectado')</script>";

    }
}

if(!isset($_SESSION)){
    session_start();
}

$imagem = 'img\basket.svg';

if(isset($_SESSION['carrinho'])){
    if(count($_SESSION['carrinho']) > 0){
        $imagem = 'img\fullbasket.svg';
    } else {
        $imagem = 'img\basket.svg';
    }
}    

?>

<?php
    
?>
<header style="background-color: white;">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
  <a class="navbar-brand" href="?pagina=home">
    <img src="img/Dmarsil.svg" width="100" height="100" class="d-inline-block align-top" alt="Logo Dmarsil">
  </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>



  <div class="collapse navbar-collapse inverter" id="navbarSupportedContent">



      <div class="menuHeader">
    <ul class="navbar-nav mr-auto">

        <li class="nav-item active">
        <div class="headerBase"> 
          <a id='logar' class="nav-link" <?=$direcionamento?> ><?=$login?></a>
        </li>

        <div class="navbar-text ml-auto py-0 px-lg-2">
          <ul class= "categoria">
            <li class="nav-item active">
                <a class="nav-link" href="?pagina=loja&categoria=1">Brinco</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="?pagina=loja&categoria=2">Anél</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="?pagina=loja&categoria=4">Pingente</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="?pagina=loja&categoria=5">Cordão</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="?pagina=loja&categoria=3">Puleira</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="?pagina=loja&categoria=6">Tornozeleira</a>
            </li>
          </ul>
      </div>

 


      </div>

    
    
      

    
    <!-- Fecha menu Header -->
    </div> 
    <a href="?pagina=carrinho"><img src="<?=$imagem?>" width=60px></a>
  </div>
</div>
</nav>  

    </div>

<!-- ADMIN -->
<?php
if(isset($_SESSION['Usuario'])){
    if($resultadoHeader['id_tipo'] == 1 ){
        
?>

<div class="headerAdmin">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="?pagina=cadastro_produtos">Cadastrar Produto<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="?pagina=usuarios">Usuarios</a>
      </li>

      <?php

        if(isset($_GET['pagina'])){
          if ($_GET['pagina'] == 'pagina_produto'){
              $id_produto = $_GET['id'];  
      
      ?>
      <li class="nav-item active">
        <a class="nav-link" href="?pagina=cadastro_produtos&id=<?=$id_produto?>">Editar Produto</a>
      </li>

      <?php
            } 
          }
      ?>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Admin
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item"  href="?pagina=tipos_usuario">Tipos de Usuario</a>
        <a class="dropdown-item"  href="?pagina=pedidos"> Pedidos </a>
        <a class="dropdown-item"  href="?pagina=produtos"> Produtos </a>
        <a class="dropdown-item"  href="?pagina=cadastropromo"> Promoções </a>
        <a class="dropdown-item"  href="?pagina=categorias">Categorias</a>

        </div>
      </li>

    </ul>
  </div>
</nav>

</div>


<?php
}
}        
?>

</header>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Insira sua conta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id='login'>

        </div>
       <?php
          if(!isset($_SESSION['Usuario'])){
              include "paginas/login.php";
          }
            
        ?> 
      </div>
    </div>
  </div>
</div>
