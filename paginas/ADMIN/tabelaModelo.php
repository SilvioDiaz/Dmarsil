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

