<script>
document.title = "Usuarios Cadastrados"
</script>


<?php
    $query = 'SELECT * FROM usuario';

    $consulta = mysqli_query($conexao, $query);

    $query_tipo = 'SELECT * FROM tipo_usuario';

    $tipo = mysqli_query($conexao, $query_tipo);


    include 'script/admin_only.php';

?>
<div class="containerLista">

    <div class="adminUsuario">

        <div id="tabelaUsuario" class="tabela">
         
            <h1>Lista de Tipos de usuário</h1>
            <a class="link_botao" href="?pagina=cadastro_funcionarios">Cadastrar novo tipo</a>

                <table cellspacing=0>
                    <tr>
                        <th>DESCRIÇÃO</th>
                        <th colspan="2">FUNÇÃO</th>
                    </tr>

                    <?php
                        while($linha = mysqli_fetch_array($tipo)){

                            ?>
                        <tr>
                        <td><?=$linha['descricao']?>'</td>
                        <td class=tabela-celula><a href="?pagina=cadastro_funcionarios&id=<?=$linha['id_tipo']?>">Editar</td>
                        <td class=tabela-celula><a href="./script/excluir_tipo_usuario.php?id=<?$linha['id_tipo']?>">Deletar</a></td>
                        </tr>
                    <?php
                        }
                    ?>
                </table>
        </div>


        <div id="tabelaUsuario" class="tabela">
        <h1>Usuarios Cadastrados</h1>
        <a class="link_botao" href="?pagina=cadastro">Cadastrar novo usuário</a>
            <table cellspacing=0>
                <tr>
                    <th>LOGIN</th>
                    <th>NOME</th>
                    <th>Senha</th>
                    <th colspan="3">FUNÇÃO</th>
                </tr>

                <?php
                    while($linha = mysqli_fetch_array($consulta)){
                        ?>
                        <tr>
                        <td><?=$linha['login']?></td>
                        <td><?=$linha['nome']?></td>
                        <td><?=$linha['senha']?></td>
                        <td class=tabela-celula><a href="?pagina=cadastro&id=<?=$linha['id_usuario']?>">Editar</a></td>
                        <td class=tabela-celula><a href="./script/excluir_usuario.php?id=<?=$linha['id_usuario']?>">Apagar</a></td>
                        </tr>
                    <?php
                    }
                    ?>
        </div>
            </table>
          
    </div>
</div>