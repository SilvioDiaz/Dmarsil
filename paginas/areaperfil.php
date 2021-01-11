<script>
document.title = "Perfil"
</script>

<?php

$id = $_SESSION['Usuario']['id_usuario'];
 $query = 'SELECT * FROM usuario WHERE id_usuario = '.$id ;

 $consulta = mysqli_query($conexao, $query);
?>

<h1>Perfil:</h1>
<div class="container">
    <div class="row">

        <div class="col-2">
            <div id="perfil_menu">

            <a href="?pagina=perfil&areaUsuario=perfil_usuario"class="btn_menuPerfil"> Perfil</a>   
            <a href="?pagina=perfil&areaUsuario=pedidos_usuario" class="btn_menuPerfil"> Pedidos</a>


        </div>

        </div>

 

<?php
while($linha = mysqli_fetch_array($consulta)){
    if($linha['numero'] == "0"){
        $linha['numero'] = "Sem Número";
    }
    if($linha['complemento']== ""){
        $linha['complemento'] ="Sem complemento";
    }

    if(!isset($_GET['areaUsuario'])){
        include 'perfil.php';
    }else{
        $area_usuario = $_GET['areaUsuario'];

        switch($area_usuario){
            case 'perfil_usuario':
                include 'perfil.php';
                break;
            case 'pedidos_usuario':
                include 'pedidos.php';
                break;
        }
            
        
        }
    }
?>
   </div>
</div>
