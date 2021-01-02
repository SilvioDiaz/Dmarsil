<script>
document.title = "Usuarios Cadastrados"
</script>


<?php
    $query = 'SELECT * FROM usuario';

    $consulta = mysqli_query($conexao, $query);

    include 'script/admin_only.php';

?>
<div class="containerLista">
<div class="titulo">
    <h1>Usuarios Cadastrados</h1>
</div>
<div class="tabela">
    <table cellspacing=0>
        <tr>
            <th>LOGIN</th>
            <th>NOME</th>
            <th>Senha</th>
            <th colspan="3">FUNÇÃO</th>
        </tr>

        <?php
            while($linha = mysqli_fetch_array($consulta)){
                echo '<tr>';
                echo '<td>'.$linha['login'].'</td>';
                echo '<td>'.$linha['nome'].'</td>';
                echo '<td>'.$linha['senha'].'</td>';
                echo '<td class=tabela-celula><a href=?pagina=cadastro&id='.$linha['id_usuario'].'>Editar</a></td>';
                echo '<td class=tabela-celula><a href=./script/excluir_usuario.php?id='.$linha['id_usuario'].'>Apagar</a></td>';
                echo '</tr>';
            }
        ?>
    </table>
    <a class="link_botao" href="?pagina=cadastro">Cadastrar novo usuário</a>
</div>
        </div>