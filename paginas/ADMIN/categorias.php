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

<div class="selecaoProduto">
    <p>
        <a class="btn btn-primary" data-toggle="collapse" href="#categoria" role="button" aria-expanded="false" aria-controls="categoria">Categorias</a>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#banho" aria-expanded="false" aria-controls="banho">Banho</button>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#modelo" aria-expanded="false" aria-controls="modelo">Modelo</button>
    </p>
</div>
<div class="row">
  <div class="col">
    <div class="collapse multi-collapse" id="categoria">
     
    <!-- CATEGORIA -->
      <div class="tabela">
                <h1>Categorias</h1>
                <a class="link_botao" href="?pagina=cadastro_categoria">Cadastrar nova Categoria</a>
                <table cellspacing=0>
                    <tr>
                        <th>DESCRIÇÃO</th>
                        <th colspan="2">FUNÇÃO</th>
                    </tr>

                    <?php
                        while($linha = mysqli_fetch_array($tipo)){

                        ?>
                            <tr>
                            <td><?=$linha['nome_tipoProduto']?></td>
                            <td class=tabela-celula><a href="?pagina=cadastro_categoria&id_categoria=<?=$linha['id_tipoProduto']?>">Editar</td>
                            <td class=tabela-celula><a href="./script/excluir_categoria.php?id=<?=$linha['id_tipoProduto']?>">Deletar</a></td>
                            </tr>
                    <?php
                        }
                    ?>
                </table>
                
            </div>

    </div>
  </div>

    <!-- BANHO -->
  <div class="col">
    <div class="collapse multi-collapse" id="banho">


      <div class="tabela">
                <h1>Banho:</h1>
                <a class="link_botao" href="?pagina=cadastro_banho">Cadastrar novo Banho</a>
                <table cellspacing=0>
                    <tr>
                        <th>DESCRIÇÃO</th>
                        <th colspan="2">FUNÇÃO</th>
                    </tr>

                    <?php
                        while($linha = mysqli_fetch_array($banho)){

                        ?>
                            <tr>
                            <td><?=$linha['nome_banho']?></td>
                            <td class=tabela-celula><a href="?pagina=cadastro_banho&id_banho=<?=$linha['id_banho']?>">Editar</td>
                            <td class=tabela-celula><a href="./script/excluir_banho.php?id=<?=$linha['id_banho']?>">Deletar</a></td>
                            </tr>
                    <?php
                        }
                    ?>
                </table>
                
            </div>

    </div>
  </div>

  <!-- 
    MODELO -->
  <div class="col">
    <div class="collapse multi-collapse" id="modelo">

    <div class="tabela">
                <h1>Modelo</h1>
                <a class="link_botao" href="?pagina=cadastro_modelo">Cadastrar novo Modelo</a>
                <table cellspacing=0>
                    <tr>
                        <th>DESCRIÇÃO</th>
                        <th colspan="2">FUNÇÃO</th>
                    </tr>

                    <?php
                        while($linha = mysqli_fetch_array($modelo)){

                        ?>
                            <tr>
                            <td><?=$linha['nome_modelo']?></td>
                            <td class=tabela-celula><a href="?pagina=cadastro_modelo&id_modelo=<?=$linha['id_modelo']?>">Editar</td>
                            <td class=tabela-celula><a href="./script/excluir_modelo.php?id=<?=$linha['id_modelo']?>">Deletar</a></td>
                            </tr>
                    <?php
                        }
                    ?>
                </table>
                
            </div>

    </div>
  </div>


</div>
