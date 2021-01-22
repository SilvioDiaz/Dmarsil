<script>
document.title = "Seu Carrinho"
</script>

<?php
     if(!isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION['carrinho'])){
        $_SESSION['carrinho'] = array();
    }

    if(isset($_GET['acao'])){

        // Adicionar item ao carrinho
        if($_GET['acao'] == 'add'){
            $id = intval($_GET['id']);
            
            if(!isset($_SESSION['carrinho'][$id])){
                $_SESSION['carrinho'][$id] = 1;
                
            } else {
                $_SESSION['carrinho'][$id] += 1;
            }
        }

        // Remover item do carrinho
        if($_GET['acao'] == 'del'){
            $id = intval($_GET['id']);

            if(isset($_SESSION['carrinho'][$id])){
                unset($_SESSION['carrinho'][$id]);
            }
        }

        // Atualizar quantidade
        if($_GET['acao'] == 'up'){
            if(isset($_POST['produto'])){
                if(is_array($_POST['produto'])){
                    foreach($_POST['produto'] as $id => $qtd){
                        $id = intval($id);
                        $qtd = intval($qtd);

                        if(!empty($qtd) || $qtd > 0){
                            $_SESSION['carrinho'][$id] = $qtd;
                        } else {
                            unset($_SESSION['carrinho'][$id]);
                        }
                    }
                }
            }
        }
    }
    
?>

<h1 class="tituloPagina">Carrinho</h1>

<?php
    $total = 0;
    if(count($_SESSION['carrinho']) == 0){
?>
    <h2 class="tituloPagina">Seu carrinho está vazio!</h2>

<?php 

    }else{
?>
    <div class='tabelaCarrinho'>
        <table style="width: 50%;">
            <form action="?pagina=carrinho&acao=up" method="post">
                <tr>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Subtotal</th>
                    <th>Ação</th>
                </tr>

                <?php
                    foreach($_SESSION['carrinho'] as $id => $qtd){
                        $sql = "SELECT * FROM produto WHERE id_produto = '$id'";
                        $resultado = mysqli_query($conexao,$sql);
                        $linha = mysqli_fetch_array($resultado);

                        $qtd = intval($qtd);

                        $titulo = $linha['nome_produto'];
                        $preco = $linha['preco_produto'];
                        $desconto = $linha['promocao'];
                        $preco =  round($preco * ((100-$desconto) / 100), 2);

                        $subtotal = $preco * $qtd;
                        $total = $total + $subtotal;

                        $preco = "R$" . number_format($preco, 2, ',', '.');
                        $subtotal = "R$" . number_format($subtotal, 2, ',', '.');
                        $totalShow = "R$" . number_format($total, 2, ',', '.');

                ?>

        
                <tr>
                    <td><?=$titulo?></td>
                    <td><input type="number" class="quantidade" name="produto[<?=$id?>]" value=<?=$qtd?>></td>
                    <td><?=$preco?></td>
                    <td><?=$subtotal?></td>
                    <td><a href="?pagina=carrinho&id=<?=$id?>&acao=del">Remover</a></td>
                </tr>
     
            <?php
                }

            ?>
            </table>

            <div id="compraCarrinho">
                <div class="finalCarrinho">
                    <h4>Total: <?=$totalShow?></h4>         
                </div>
                <?php
                    if($id == null){
                        
                    }else{
                ?>

                <div class="finalCarrinho">
                    <input id = "fechar" class="btnPrincipal" type="button" value="Fechar Compra">
                </div>

                <?php
                    }
                ?>
                </div>
            </form>

    <?php
        }
    ?>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                </div>
                <div class="modal-body">
                    <div style = "display:flex; flex-direction:column">
                    <h6>O pedido com valor total de <?=$totalShow?> será enviado para o endereço cadastrado em sua conta</h6>
                    <div style = "display:flex; justify-content: flex-end;" >
                        <button class="btnPrincipal" id="finalizarCompra" >Finalizar Compra</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script type="text/javascript">

    $(function() {
    $(".quantidade").change(function() {
        $("form").submit();
        });
    });

    window.history.pushState({}, document.title, '/' + 'dmarsil/index.php?pagina=carrinho');


    $('#fechar').click(function() {
        $('#myModal').modal('show');
    });

    $('#finalizarCompra').click(function(){
        var total = '<?php echo $total ?>'
        window.location.href = `./script/incluir_pedido.php?total=${total}`;
        });

</script>