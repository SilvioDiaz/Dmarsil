<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    header('location:./index.php');
}

$query = "SELECT * FROM produto WHERE id_produto =".$id;

$consulta = mysqli_query($conexao, $query);

while($linha = mysqli_fetch_array($consulta)){

    $preco = $linha['preco_produto'];
    $precoDesconto = "";
    $linhapromo = "";

    $desconto = $linha['promocao'];
    if($desconto > 0){
        $preco = $linha['preco_produto'];
        $precoDesconto =  round($preco * ((100-$desconto) / 100), 2);
        $precoDesconto =  "R$" . number_format($precoDesconto, 2, ',', '.');
        $linhapromo = "style= 'text-decoration: line-through;'";

    }
    $preco = "R$" . number_format($preco, 2, ',', '.');

?>
<div class="container">

    <div id="areaProduto">

        <div  id="produtoDetalhes">

            <div id="imagem_nome">
                <div class="" id="imgProduto">
                    <img class="imgHome" src=<?= $linha['imagem_produto'] ?> style="height: 500px;width: 500px;">
                </div>

                <div class="col-4" id="nome_descricao">
                    <div id="nome_produto">
                        <h1><?= $linha['nome_produto'] ?></h1>
                    </div>

                    <div class="descricaoProduto">
                        <p><?=$linha['descricao_produto']?></p>
                    </div>

                    <div class="detalhesProduto">
                
                        <p>Tamanho: <?=$linha['tamanho_produto']?>cm</p>
                        <p>Peso: <?=$linha['peso_produto']?>g</p>

                    </div>
                </div>

                
                <div class="col-4" id="precoProduto">
                 
                    <p <?=$linhapromo?> id="precoArea"><?=$preco?></p>
                    <p id="precoArea"><?=$precoDesconto?></p>

                    <a style="width: 50%; text-align: center;" class="btnPrincipal" href="?pagina=carrinho&id=<?= $linha['id_produto'] ?>&acao=add">Comprar</a>

                
                 </div>

            </div>

        </div>
    </div>
</div>


<?php

}
?>