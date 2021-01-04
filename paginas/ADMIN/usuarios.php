<script>
document.title = "Usuarios Cadastrados"
</script>


<?php
    if(!isset($_GET['tipoid'])){
    $query = 'SELECT * FROM usuario';
    }else{
        $tipoid = $_GET['tipoid'];
        $query = 'SELECT * FROM usuario WHERE id_tipo ='.$tipoid;

    }
    $consulta = mysqli_query($conexao, $query);

    $query_tipo = 'SELECT * FROM tipo_usuario';

    $tipo = mysqli_query($conexao, $query_tipo);


    include 'script/admin_only.php';

?>


<div class="containerLista">

    <div class="adminArea">

        <div id="tabelaTipo_usuario" class="col-3">
         
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
                        <td><a href="?pagina=usuarios&tipoid=<?=$linha['id_tipo']?>"><?=$linha['descricao']?></a></td>
                        <td class=tabela-celula><a href="?pagina=cadastro_funcionarios&id_tipo=<?=$linha['id_tipo']?>">Editar</td>
                        <td class=tabela-celula><a href="./script/excluir_tipo_usuario.php?id=<?$linha['id_tipo']?>">Deletar</a></td>
                        </tr>
                    <?php
                        }
                    ?>
                </table>
        </div>

        <div id="tabelaUsuario" class="tabela col-9">
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