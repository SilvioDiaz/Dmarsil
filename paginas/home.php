<script>
    document.title = "D'marsil Jóias"
</script>

<div class="containerLista ">
    <div class='Home' id='produtoHome'>

        <?php
        while ($linha = mysqli_fetch_array($consulta)) {


        ?>

        <div class="produto" id="tituloProduto">
            <h1><?= $linha['nome_produto'] ?></h1>

            <div class="imgProduto" id="imgProduto">
                <img class="imgHome" src=<?= $linha['imagem_produto'] ?>>
            </div>
            <div id="precoProduto">
                <p>R$ <?= $linha['preco_produto'] ?></p>
                <div id="btCompra">
                    <a href="?pagina=pagina_produto&id=<?= $linha['id_produto'] ?>">Comprar</a>

                </div>
            </div>

        </div>
    
    <?php

    }
        ?>

    </div>

    <?php
            $queryPromo = "SELECT * FROM produto WHERE promocao >0";
            $consulta = mysqli_query($conexao, $queryPromo);
            while ($linha = mysqli_fetch_array($consulta)) {
                           
        ?>

        <div class="produto" id="tituloProduto">
            <h1><?= $linha['nome_produto'] ?></h1>

            <div class="imgProduto" id="imgProduto">
                <img class="imgHome" src=<?= $linha['imagem_produto'] ?>>
            </div>
            <div id="precoProduto">
                <p>R$ <?= $linha['preco_produto'] ?></p>
                <div id="btCompra">
                    <a href="?pagina=pagina_produto&id=<?= $linha['id_produto'] ?>">Comprar</a>

                </div>
            </div>

        </div>

        <?php
            }
            PRINT_R($linha);
                
       

       ?>


</div>