<script>
document.title = 'Produtos'
</script>


<?php
    $query = 'SELECT * FROM produto';

    $consulta = mysqli_query($conexao, $query);

    if (isset($_SESSION['Usuario'])) {
        if(!$_SESSION['Usuario']['id_tipo'] == 1){
            header('location:index.php?pagina=home&status=naoautorizado');
        }else{
        
    }
}

?>

<div class="containerLista">
<div class="titulo">
    <h1>Produtos Cadastrados`</h1>
</div>
<div class="tabela">
    <table cellspacing=0>
        <tr>
            <th>PRODUTO</th>
            <th>Imagem</th>
            <th>Preço</th>
            <th colspan="2">FUNÇÃO</th>
        </tr>

        <?php
            while($linha = mysqli_fetch_array($consulta)){
                echo '<tr>';
                echo '<td>'.$linha['nome_produto'].'</td>';
                echo "<td><img class='imgTabela' src=" . $linha['imagem_produto']."></td>";
                echo '<td>'.$linha['preco_produto'].'</td>';
                echo '<td class=tabela-celula><a href=?pagina=cadastro_produtos&id='.$linha['id_produto'].'>Editar</a></td>';
                echo '<td class=tabela-celula><a href=./script/excluir_produto.php?id='.$linha['id_produto'].'>Apagar</a></td>';
                echo '</tr>';
            }
        ?>
    </table>
    <a class="link_botao" href="?pagina=cadastro_produtos">Cadastrar novo Produto</a>
</div>
        </div>