<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    header('location:./index.php');
}

$query = "SELECT * FROM produto WHERE id_produto =".$id;

$consulta = mysqli_query($conexao, $query);

while($linha = mysqli_fetch_array($consulta)){
?>


<div class="produto" id="tituloProduto">
            <h1><?= $linha['nome_produto'] ?></h1>

            <div class="imgProduto" id="imgProduto">
                <img class="imgHome" src=<?= $linha['imagem_produto'] ?>>
            </div>

            <div class="descricaoProduto">
            <p><?=$linha['descricao_produto']?></p>
            </div>

            <div class="detalhesProduto">
              
                <p>Tamanho: <?=$linha['tamanho_produto']?></p>
                <p>Peso: <?=$linha['peso_produto']?></p>

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