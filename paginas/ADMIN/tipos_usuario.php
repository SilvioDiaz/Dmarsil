<script>
document.title = "Tipos de Usuarios"
</script>

<?php
    if (isset($_SESSION['Usuario'])) {
        if($resultadoHeader['id_tipo'] != 1){
            header('location:index.php?pagina=home&status=naoautorizado');
        }
    }

    $query_tipo = 'SELECT * FROM tipo_usuario';

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
                echo '<td>'.$linha['descricao'].'</td>';
                echo '<td class=tabela-celula><a href=?pagina=cadastro_funcionarios&id='.$linha['id_tipo'].'>Editar</td>';
                echo '<td class=tabela-celula><a href=./script/excluir_tipo_usuario.php?id='.$linha['id_tipo'].'>Deletar</a></td>';
                echo '</tr>';
            }
        ?>
    </table>
    <a class="link_botao" href="?pagina=cadastro_funcionarios">Cadastrar novo tipo</a>
</div>
        </div>