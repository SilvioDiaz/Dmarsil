<?php
include "banco.php";

$id = $_GET['id_pedido'];

if(isset($_GET['alterar_status'])){
    $alterarStatus = $_GET['alterar_status'];

        switch($alterarStatus){
            case 'enviado':
                $status = 2;
                break;
            case 'entregue':
                $status = 3;
                break;
            case 'cancelado':
                $status = 4;
                break;
            case 'pago':
                $status = 1;
                break;
        }


    

    
    }

$query = "UPDATE pedidos SET id_status = '$status'
WHERE id_pedidos  = $id";


mysqli_query($conexao, $query);

header('location:../index.php?pagina=perfil&areaUsuario=pedidos_usuario');

?>