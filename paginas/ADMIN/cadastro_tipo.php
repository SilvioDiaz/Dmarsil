<script>
document.title = "Cadastro de Funcionários"
</script>

<?php
    $alterar = false; //boolean para verificar se inclui ou altera
    include 'script/admin_only.php';

    if(isset($_GET['pagina'])){
        $pagina = $_GET['pagina'];
    }else{
        header('location:index.php?pagina=home&status=naoautorizado');
    };
    // VERIFICANDO PAGINA DE INCLUIR
    switch($pagina){
        case 'cadastro_categoria':
            $acao_formulario = './script/incluir_categoria.php';
            $titulo_pagina = 'Cadastro de tipos de usuário';
            break;
        case 'cadastro_funcionarios':
            $acao_formulario = './script/incluir_tipo_usuario.php';
            $titulo_pagina = 'Cadastro de tipo de Usuario';
            break;
        case 'cadastro_banho':
            $acao_formulario = './script/incluir_banho.php';
            $titulo_pagina = 'Cadastro de Banho';
            break;
        case 'cadastro_modelo':
            $acao_formulario = './script/incluir_modelo.php';
            $titulo_pagina = 'Cadastro de Modelo';
            break;
        case 'status':
            $acao_formulario = './script/incluir_tipo_usuario.php';
            $titulo_pagina = 'Cadastro de Status';
            break;
        }
 // VERIFICANDO PAGINA DE ALTERAR
    if(isset($_GET['id_categoria'])){

        $id = $_GET['id_categoria'];
        $acao_formulario = './script/alterar_categoria.php?id='.$id;
        $titulo_pagina = 'Alterar Categoria';
        $descricao = "nome_tipoProduto";
        $alterar = true;

        $query = "SELECT * FROM tipo_produto WHERE id_tipoProduto = $id";
    }

   
    if(isset($_GET['id_tipo'])){
        $id = $_GET['id_tipo'];
        $acao_formulario = './script/alterar_tipo_usuario.php?id='.$id;
        $titulo_pagina = 'Alterar tipo de Usuario';
        $descricao = "descricao";
        $alterar = true;

        $query = "SELECT * FROM tipo_usuario WHERE id_tipo = $id";
    }

    if(isset($_GET['id_banho'])){
        $id = $_GET['id_banho'];
        $acao_formulario = './script/alterar_banho.php?id='.$id;
        $titulo_pagina = 'Alterar Banho';
        $descricao = "nome_banho";
        $alterar = true;

        $query = "SELECT * FROM banho WHERE id_banho = $id";
    }

    if(isset($_GET['id_modelo'])){
        $id = $_GET['id_modelo'];
        $acao_formulario = './script/alterar_modelo.php?id='.$id;
        $titulo_pagina = 'Alterar Modelo';
        $descricao = "nome_modelo";
        $alterar = true;

        $query = "SELECT * FROM modelo WHERE id_modelo = $id";
        
    }

    if(isset($_GET['id_status'])){
        $id = $_GET['id_status'];
        $acao_formulario = './script/alterar_tipo_usuario.php?id='.$id;
        $titulo_pagina = 'Alterar Status';
        $descricao = "descricao_status";
        $alterar = true;

        $query = "SELECT * FROM status_pedido WHERE id_status = $id";
    }

    $campo = array();
    $descricao_botao = 'Incluir';
   
  
    //CHAMANDO QUERY SE FOR ALTERAR

    if(!$alterar){
        $campo['descricao'] ='';
        $descricao = "";
    }else{
        $resultado = mysqli_query($conexao, $query);
        $descricao_botao = 'Alterar';
        while($linha = mysqli_fetch_array($resultado)){
            $campo['descricao'] = $linha[$descricao];
        };
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