<script>
document.title = 'Produtos'
</script>


<?php
    include 'script/admin_only.php';

    $query = 'SELECT * FROM produto';

    $consulta = mysqli_query($conexao, $query);

    $query_tipo = 'SELECT * FROM tipo_produto';

    $tipo = mysqli_query($conexao, $query_tipo);

    $query_banho = 'SELECT * FROM banho';

    $banho = mysqli_query($conexao, $query_banho);

    $query_modelo = 'SELECT * FROM modelo';

    $modelo = mysqli_query($conexao,$query_modelo);

?>

<div class="container">

    <div id=categorias>
        
        <div id="menuCategoria">
            <a href="?pagina=categoria&pedido=categoria" class="btnPrincipal btnMargin"> Categorias </a> 
            <a href="?pagina=categoria&pedido=banho" class="btnPrincipal btnMargin"> Banho</a>  
            <a href="?pagina=categoria&pedido=modelo" class="btnPrincipal btnMargin"> Modelo </a>
        </div>


        <?php
            if(isset($_GET['pedido'])){
                $pedido = $_GET['pedido'];

                switch($pedido){
                    case 'categoria':
                        include 'tabelaCategoria.php';
                        break;
                    case 'banho':
                        include 'tabelaBanho.php';
                        break;
                    case 'modelo':
                        include 'tabelaModelo.php';
                        break;
    
            }
            }else{
                echo "<h2>Escolha uma das opções</h2>";

            }
        ?>

    </div>


        
        
    </div>
</div>
