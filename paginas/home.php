<script>
    document.title = "D'marsil Jóias"
</script>


<div class="container">
    <div class="containerLista">
        <div class='Home' id='produtoHome'>

            <?php

            $query = 'SELECT * FROM produto';
            $consulta = mysqli_query($conexao, $query);
            while ($linha = mysqli_fetch_array($consulta)) {
            ?>

            <a class="produto" href="?pagina=pagina_produto&id=<?= $linha['id_produto'] ?>">
                

                    <div class="imgProduto" id="imgProduto">
                        <img class="imgHome" src=<?= $linha['imagem_produto'] ?>>
                    </div>
                    
                    <div  id="tituloProduto">
                        <h1><?= $linha['nome_produto'] ?></h1>    
                    </div>

                    <div id="precoProduto">
                        <h5>R$ <?= $linha['preco_produto'] ?></h5>
                    </div>
                
            </a>
        
        <?php

            }
            ?>

        </div>

        <?php
                $queryPromo = "SELECT * FROM produto WHERE promocao >0";
                $consulta = mysqli_query($conexao, $queryPromo);
                while ($linha = mysqli_fetch_array($consulta)) {
                            
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


    </div>
</div>