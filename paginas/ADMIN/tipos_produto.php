<script>
document.title = "Tipos de Produto"
</script>

<?php
    $query_tipo = 'SELECT * FROM tipo_produto';

    $tipo = mysqli_query($conexao, $query_tipo);
?>

<div class="containerLista">
<div class="titulo">
    <h1>Lista de Tipos de usuário</h1>
</div>
<div class="tabela">
    <table cellspacing=0>
        <tr>
            <th>DESCRIÇÃO</th>
            <th colspan="2">FUNÇÃO</th>
        </tr>

        <?php
            while($linha = mysqli_fetch_array($tipo)){
                echo '<tr>';
                echo '<td>'.$linha['nome_tipoProduto'].'</td>';
                echo '<td class=tabela-celula><a href=?pagina=cadastro_categoria&id='.$linha['id_tipoProduto'].'>Editar</td>';
                echo '<td class=tabela-celula><a href=./script/excluir_categoria.php?id='.$linha['id_tipoProduto'].'>Deletar</a></td>';
                echo '</tr>';
            }
        ?>
    </table>
    <a class="link_botao" href="?pagina=cadastro_categoria">Cadastrar nova Categoria</a>
</div>
        </div>