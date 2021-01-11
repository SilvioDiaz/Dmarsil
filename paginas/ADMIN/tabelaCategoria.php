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
