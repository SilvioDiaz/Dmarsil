<?php
include "banco.php";

$categoria = "";
$filtro = "";
$e = "";

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

echo $query;

while($linha = mysqli_fetch_array($consulta)){


?>
    <a class="produto" href="?pagina=pagina_produto&id=<?= $linha['id_produto'] ?>">
            <div  id="tituloProduto">
                <h1><?= $linha['nome_produto'] ?></h1>    
            </div>

                <div class="imgProduto" id="imgProduto">
                    <img class="imgHome" src=<?= $linha['imagem_produto'] ?>>
                </div>
                <div id="precoProduto">
                    <h5>R$ <?= $linha['preco_produto'] ?></h5>
                </div>
        </a>
<?php
}

?>