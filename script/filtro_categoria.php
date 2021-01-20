<?php
include "banco.php";

$categoria = "";
$filtro = "";

if(isset($_GET['categoriaData'])){
$categoria = $_GET['categoriaData'];
}

if(isset($_GET['filtroData'])){
    $filtro = " AND ". $_GET['filtroData'];

    if($_GET['filtroData'] == ""){
        $filtro = "";
    }
}


$query = 'SELECT * FROM produto WHERE ativo = true AND tipo_produto ='.$categoria.$filtro;
$consulta = mysqli_query($conexao,$query);

while($linha = mysqli_fetch_array($consulta)){

    $preco = $linha['preco_produto'];
    $desconto = $linha['promocao'];
    if($desconto > 0){
        $precoDesconto =  round($preco * ((100-$desconto) / 100), 2);
        $precoDesconto = "R$ " . $precoDesconto;
    }else{
        $precoDesconto = "";
    }




?>
    <a class="produto" href="?pagina=pagina_produto&id=<?= $linha['id_produto'] ?>">
            <div  id="tituloProduto">
                <h1><?= $linha['nome_produto'] ?></h1>    
            </div>

                <div class="imgProduto" id="imgProduto">
                    <img class="imgHome" src=<?= $linha['imagem_produto'] ?>>
                </div>
                <div id="precoProduto">
                    <h5>R$ <?= $preco ?></h5>
                    <h5><?= $precoDesconto ?></h5>
                </div>
        </a>
<?php
}

?>