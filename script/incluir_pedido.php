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
$id_status = 5;

$incluir_pedidos = "INSERT INTO pedidos(data_pedido,
                                        valor_total,
                                        id_usuario,
                                        id_status)
                            VALUES(now(),
                                    '$total',
                                    $comprador,
                                    $id_status
                                    );";

mysqli_query($conexao,$incluir_pedidos);


$id_pedidos = mysqli_insert_id($conexao);

foreach($_SESSION['carrinho'] as $id => $qtd){
    $sql = "SELECT preco_produto,promocao FROM produto WHERE id_produto = '$id'";
    $resultado = mysqli_query($conexao,$sql);
    $linha = mysqli_fetch_array($resultado);

    $valor = $linha['preco_produto'];
    $desconto = $linha['promocao'];
    $valor =  round($valor * ((100-$desconto) / 100), 2);

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

$qtd_atual ="SELECT estoque_produto FROM produto 
            WHERE id_produto = $id_produto";

$resultado_qtd = mysqli_query($conexao,$qtd_atual);
$qtd_produto = mysqli_fetch_array($resultado_qtd);


$qtd_produto = $qtd_produto['estoque_produto'] - $quantidade;

$remover_estoque = "UPDATE produto SET estoque_produto = '$qtd_produto'
                    WHERE id_produto = $id_produto";

mysqli_query($conexao,$incluir_item);
mysqli_query($conexao,$remover_estoque);

echo "Quantidade comprada: ".$quantidade."<br>";
echo "Query para remover estoque: ".$remover_estoque."<br>";
echo "Query buscando estoque ".$qtd_atual."<br>";
echo "Nova quantidade em estoque ".$qtd_produto."<br>";
echo "Id Produto:: ".$id_produto;

}




// header('location:../index.php?pagina=produtos');
?>