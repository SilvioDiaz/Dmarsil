<script>
document.title = "Cadastro de Funcionários"
</script>

<?php

    if (isset($_SESSION['Usuario'])) {
        if($resultadoHeader['id_tipo'] != 1){
            header('location:index.php?pagina=home&status=naoautorizado');
        }
    }

    $campo = array();
    $descricao_botao = 'Incluir tipo';
    $acao_formulario = './script/incluir_tipo_usuario.php';
    $titulo_pagina = 'Cadastro de tipos de usuário';

    if(!isset($_GET['id'])){
        $campo['descricao'] = '';
    } else { 
        $id = $_GET['id'];

        $descricao_botao = 'Alterar tipo';
        $acao_formulario = './script/alterar_tipo_usuario.php?id='.$id;
        $titulo_pagina = 'Alteração de tipos de usuário';

        $query = "SELECT * FROM tipo_usuario WHERE id_tipo = $id";

        $resultado = mysqli_query($conexao, $query);

        while($linha = mysqli_fetch_array($resultado)){
            $campo['descricao'] = $linha['descricao'];
        } 
    }; 
?>

<div class="titulo">
    <h1><?=$titulo_pagina?></h1>
</div>

<div class="container-centro">
    <form id="tela" action="<?=$acao_formulario?>" method="POST">
        <input class="entrada entrada-top" size=30 maxlength=15 value="<?=$campo['descricao']?>" type="text" id="txtDescricao" name="txtDescricao" placeholder="Descrição"><br>

        <div class="barra">
            <button class="link_botao" id="btnFuncao" type="submit"><?=$descricao_botao?></button>
        </div>
    </form>
</div>    
