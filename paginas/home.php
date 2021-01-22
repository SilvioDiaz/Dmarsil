<script>
    document.title = "D'marsil Jóias"
</script>


<div class="container">
    <div class="containerLista">
        <div class='Home' id='produtoHome'>

        <h2>Promoçôes</h2>
            <div id="promocoes" style="width: 1000px">
            <div id="slide" class="owl-carousel">
        <?php
                $queryPromo = "SELECT * FROM produto WHERE promocao >0";
                $consulta = mysqli_query($conexao, $queryPromo);
                while ($linha = mysqli_fetch_array($consulta)) {
                    $desconto = $linha['promocao'];
                    $preco = $linha['preco_produto'];
                    $precoDesconto =  round($preco * ((100-$desconto) / 100), 2);
                    $preco = "R$" . number_format($preco, 2, ',', '.');
                    $precoDesconto = "R$" . number_format($precoDesconto, 2, ',', '.');
                    $linhapromo = "style= 'text-decoration: line-through;'";

      
            ?>

       

            <a class="produto" href="?pagina=pagina_produto&id=<?= $linha['id_produto'] ?>">
                <div  id="tituloProduto">
                    <h1><?= $linha['nome_produto'] ?></h1>    
                </div>

                    <div class="" id="imgProduto">
                        <img class="imgHome" src=<?= $linha['imagem_produto'] ?>>
                    </div>
                    <div id="precoProduto">
                        <h5 <?=$linhapromo?>><?= $preco ?></h5>
                        <h5><?= $precoDesconto ?></h5>


                    </div>
                
            </a>

            <?php
                }              
        ?>
            </div>
            </div>

            <?php

            $query = 'SELECT * FROM produto';
            $consulta = mysqli_query($conexao, $query);
            while ($linha = mysqli_fetch_array($consulta)){

                $preco = $linha['preco_produto'];
                $desconto = $linha['promocao'];
                
            
                if($desconto > 0){
                    $precoDesconto =  round($preco * ((100-$desconto) / 100), 2);
                    $precoDesconto = "R$ " .number_format($precoDesconto, 2, ',', '.');
                    $linhapromo = "style= 'text-decoration: line-through;'";
                }else{
                    $precoDesconto = "";
                    $linhapromo = "";
                }

                $preco = "R$" . number_format($preco, 2, ',', '.');

            
            ?>

            <a class="produto" href="?pagina=pagina_produto&id=<?= $linha['id_produto'] ?>">
                

                    <div class="imgProduto" id="imgProduto">
                        <img class="imgHome" src=<?= $linha['imagem_produto'] ?>>
                    </div>
                    
                    <div  id="tituloProduto">
                        <h1><?= $linha['nome_produto'] ?></h1>    
                    </div>

                    <div id="precoProduto">
                    <h5 <?=$linhapromo?>><?= $preco ?></h5>
                    <h5><?= $precoDesconto ?></h5>
                    </div>
                
            </a>
        
        <?php

            }
            ?>

        </div>
        <script>
            $(document).ready(function(){
            $("#slide").owlCarousel();
            });
        </script>

    </div>
</div>