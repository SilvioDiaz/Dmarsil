<?php
include "banco.php";

$brincoPromo = $_GET['brincoPromo'];
$anelPromo = $_GET['anelPromo'];
$pingentePromo = $_GET['pingentePromo'];
$cordaoPromo = $_GET['cordaoPromo'];
$pulseiraPromo = $_GET['pulseiraPromo'];
$tornozeleiraPromo = $_GET['tornozeleiraPromo'];

if($brincoPromo == null){
    $brincoPromo = 0;
}
if($anelPromo == null){
    $anelPromo = 0;
}
if($pingentePromo == null){
    $pingentePromo = 0;
}
if($cordaoPromo == null){
    $cordaoPromo = 0;
}
if($pulseiraPromo  == null){
    $pulseiraPromo  = 0;
}
if($tornozeleiraPromo == null){
    $tornozeleiraPromo = 0;
}

$query = " UPDATE produto SET promocao = $brincoPromo WHERE tipo_produto = 1;
            UPDATE produto SET promocao = $anelPromo WHERE tipo_produto = 2;
            UPDATE produto SET promocao = $pingentePromo WHERE tipo_produto = 4;
            UPDATE produto SET promocao = $cordaoPromo WHERE tipo_produto = 5;
            UPDATE produto SET promocao = $pulseiraPromo WHERE tipo_produto = 3;
            UPDATE produto SET promocao = $tornozeleiraPromo WHERE tipo_produto = 6;";

$teste = mysqli_multi_query($conexao, $query);

if($teste){
    header('location:../index.php?pagina=home');
}else{
    header('location:../index.php?pagina=home');
}
?>