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


    <!-- 
  Produtos -->
  <div class="col">

    <div class="tabela">
            <h1>Produtos Cadastrados</h1>
            <a class="link_botao" href="?pagina=cadastro_produtos">Cadastrar novo Produto</a>
            <table cellspacing=0>
                <tr>
                    <th>PRODUTO</th>
                    <th>Imagem</th>
                    <th>Preço</th>
                    <th colspan="2">FUNÇÃO</th>
                </tr>

                <?php
                    while($linha = mysqli_fetch_array($consulta)){
                ?>
                        <tr>
                        <td><?=$linha['nome_produto']?></td>
                        <td><img class='imgTabela' src=<?=$linha['imagem_produto']?>></td>
                        <td><?=$linha['preco_produto']?></td>
                        <td class=tabela-celula><a href="?pagina=cadastro_produtos&id=<?=$linha['id_produto']?>">Editar</a></td>
                        <td class=tabela-celula><a href="./script/excluir_produto.php?id=<?=$linha['id_produto']?>">Apagar</a></td>
                        </tr>
                <?php        
                    }
                ?>
            </table>
        
        </div>

  </div>