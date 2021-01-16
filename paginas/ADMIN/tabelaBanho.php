<div class="tabela">
    <h1>Banho</h1>
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