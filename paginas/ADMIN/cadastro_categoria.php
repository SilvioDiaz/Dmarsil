<script>
document.title = "Cadastro de Categoria"
</script>

<?php

    $query = 'SELECT id_tipo FROM usuario WHERE id_usuario ='.$_SESSION['Usuario']['id_usuario'];
    $consulta = mysqli_query($conexao, $query);
    $resultado = mysqli_fetch_array($consulta);

    include 'script/admin_only.php';
    
    $campo = array();
    $descricao_botao = 'Incluir Categoria';
    $acao_formulario = './script/incluir_categoria.php';
    $titulo_pagina = 'Cadastro de Categoria';

    if(!isset($_GET['id'])){
        $campo['nome_tipoProduto'] = '';
    } else { 
        $id = $_GET['id'];

        $descricao_botao = 'Alterar Categoria';
        $acao_formulario = './script/alterar_categoria.php?id='.$id;
        $titulo_pagina = 'Alteração de Categoria';

        $query = "SELECT * FROM tipo_produto WHERE id_tipoProduto = $id";

        $resultado = mysqli_query($conexao, $query);

        while($linha = mysqli_fetch_array($resultado)){
            $campo['nome_tipoProduto'] = $linha['nome_tipoProduto'];
        } 
    }; 
?>

<div class="titulo">
    <h1><?=$titulo_pagina?></h1>
</div>

<div class="container-centro">
    <form id="tela" action="<?=$acao_formulario?>" method="POST">
        <input class="entrada entrada-top" size=30 maxlength=15 value="<?=$campo['nome_tipoProduto']?>" type="text" id="txtDescricao" name="txtCategoria" placeholder="Categoria"><br>

        <div class="barra">
            <button class="link_botao" id="btnFuncao" type="submit"><?=$descricao_botao?></button>
        </div>
    </form>
</div>    
