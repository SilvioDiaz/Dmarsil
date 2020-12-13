<?php

if(!isset($_SESSION)){
    session_start();
}

include './banco.php';



$data_pedido = getdate();

//Incluir Pedido
$data = $data_pedido['year'].'-'. $data_pedido['mon'].'-'. $data_pedido['mday'] . " " . $data_pedido['hours']. ':' . $data_pedido['minutes'] . ':' . $data_pedido['seconds'];
$comprador = $_SESSION['Usuario']['id_usuario'];
$total = $_GET['total'];

$incluir_pedidos = "INSERT INTO pedidos(data_pedido,
                                        valor_total,
                                        id_usuario)
                            VALUES('now()',
                                    '$total',
                                    $comprador
                                    );";

mysqli_query($conexao,$incluir_pedidos);


$id_pedidos = mysqli_insert_id($conexao);

foreach($_SESSION['carrinho'] as $id => $qtd){
    $sql = "SELECT preco_produto FROM produto WHERE id_produto = '$id'";
    $resultado = mysqli_query($conexao,$sql);
    $linha = mysqli_fetch_array($resultado);

    $valor = $linha['preco_produto'];
    $id_produto = $id;
    $quantidade = $qtd;

$incluir_item = "INSERT INTO item_pedido(
    qtd,
    valor,
    id_pedidos,
    id_produto)
    VALUES(
        '$quantidade',
        '$valor',
        '$id_pedidos',
        '$id_produto'
    );";

mysqli_query($conexao,$incluir_item);

}




header('location:../index.php?pagina=produtos');
?>