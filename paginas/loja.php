<h1>Loja</h1>

<?php
//Verificar produtos por banho
$linkBanho = "";
$categoria = "";
$banho = "";

if(isset($_GET['banho'])){
    $banho = $_GET['banho'];
    $query = 'SELECT * FROM produto WHERE ativo = true AND id_banho ='. $banho;

}else{
    //Verificar produtos em gerl
    $query = 'SELECT * FROM produto';
} if(isset($_GET['categoria'])){
    //Verificando se Categoria foi escolhida
    $categoria = $_GET['categoria'];

    $linkBanho = "categoria=";

    if(isset($_GET['banho'])){
        //Verificando se banho e categoria foram escolhidos
        $banho = $_GET['banho'];
        $query = "SELECT * FROM produto WHERE ativo = true AND tipo_produto=".$categoria. " AND id_banho=".$banho;
    }else{
        //Se apenas categoria for escolhida
        $query = 'SELECT * FROM produto WHERE ativo = true AND tipo_produto ='. $categoria;
    }

    

    
    }

    if(!isset($_GET['categoria']) AND (!isset($_GET['banho']))){
    //Se categoria nem banho forem escolhidas
        $categoria = null;
        $linkBanho = null;
        $query = 'SELECT * FROM produto';
    }
//Verificar produtos
$consulta = mysqli_query($conexao,$query);
?>

<div class="containerLista ">
    <div class = 'Home' id='produtoHome'>

    <a href= './index.php?pagina=loja&<?=$linkBanho?><?=$categoria?>&banho=1'>Ouro</a>
    <a href= './index.php?pagina=loja&<?=$linkBanho?><?=$categoria?>&banho=2'>Ouro Branco</a>

    

<?php
    while($linha = mysqli_fetch_array($consulta)){
?>



        <div class="produto" id="tituloProduto">
            <h1><?= $linha['nome_produto'] ?></h1>

            <div class="imgProduto" id="imgProduto">
                <img class="imgHome" src=<?= $linha['imagem_produto'] ?>>
            </div>
            <div id="precoProduto">
                <p>R$ <?= $linha['preco_produto'] ?></p>
                <div id="btCompra">
                    <a href="?pagina=carrinho&id=<?= $linha['id_produto'] ?>&acao=add">Comprar</a>

                </div>
            </div>

        </div>


<?php
    }
    
?>

    </div>
</div>