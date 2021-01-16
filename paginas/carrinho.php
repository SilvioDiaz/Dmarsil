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

<h1>Carrinho</h1>

<?php
    $total = 0;
    if(count($_SESSION['carrinho']) == 0){
?>
    <h2>Seu carrinho está vazio!</h2>

<?php 

    }else{
        
        foreach($_SESSION['carrinho'] as $id => $qtd){
            $sql = "SELECT * FROM produto WHERE id_produto = '$id'";
            $resultado = mysqli_query($conexao,$sql);
            $linha = mysqli_fetch_array($resultado);

            $qtd = intval($qtd);

            $titulo = $linha['nome_produto'];
            $preco = $linha['preco_produto'];
            $subtotal = $linha['preco_produto'] * $qtd;
            $total = $total + $subtotal;

            $preco = number_format($preco, 2, ',', '.');
            $subtotal = number_format($subtotal, 2, ',', '.');   

        ?>

        
        <div class='tabelaCarrinho'>
            <table>
                <form action="?pagina=carrinho&acao=up" method="post">
                    <tr>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Subtotal</th>
                        <th>Ação</th>
                    </tr>
                    <tr>
                        <td><?=$titulo?></td>
                        <td><input type="text" size="3" name="produto[<?=$id?>]" value=<?=$qtd?>></td>
                        <td><?=$preco?></td>
                        <td><?=$subtotal?></td>
                        <td><a href="?pagina=carrinho&id=<?=$id?>&acao=del">Remover</a></td>
                    </tr>
            </table>     
<?php
    }

?>

        <p>Total: <?=$total?></p>


        <input class="btnPrincipal" type="submit" value="Atualizar carrinho">
            
            
        <?php
            if($id == null){
                
            }else{
        ?>
        <input id = "fechar" class="btnPrincipal" type="button" value="Fechar Compra">
        <?php
            }
        ?>
        </form>
    </div>
<?php
    }
?>

<script type="text/javascript">

    window.history.pushState({}, document.title, '/' + 'dmarsil/index.php?pagina=carrinho');


    $('#fechar').click(function() {
        var total = '<?php echo $total ?>'
        alert(total);
        window.location.href = `./script/incluir_pedido.php?total=${total}`;
    });

</script>