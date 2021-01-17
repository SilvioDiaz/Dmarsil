<?php
    include './banco.php';

    include 'upload_image.php';

    



    $nome_produto =         $_POST['txt_nome_produto'];
    $descricao_produto =    $_POST['txt_descricao_produto'];
    $banho_produto =        $_POST['rdBanho'];
    $precoBase_produto =    $_POST['txt_precoBase_produto'];
    $preco_produto =        $_POST['txt_preco_produto'];
    $estoque_produto =      $_POST['txt_estoque_produto'];
    $tamanho_produto =      $_POST['txt_tamanho_produto'];
    $peso_produto =         $_POST['txt_peso_produto'];
    $codigo_produto =       $_POST['txt_codigo_produto'];
    $tipo_produto =         $_POST['cmbTipoProduto'];
    $ativo_produto =        $_POST['rdAtivo'];
    $modelo_produto =       $_POST['rdModelo'];    

    if($uploadOk == 1){
        echo 'Upload OK';
    $local = 'img/produtos/';
    $localImg = $local . $nomeNovo;
    $image_produto =        $localImg;
    }else{
        $image_produto = null;
    }

    $query = "INSERT INTO produto(nome_produto,
                                descricao_produto,
                                imagem_produto,
                                precoBase_produto,
                                preco_produto,
                                estoque_produto,
                                tamanho_produto,
                                peso_produto,
                                codigo_produto,
                                id_modelo,
                                ativo,
                                tipo_produto,
                                id_banho)
                           VALUES('$nome_produto',
                                '$descricao_produto',
                                '$image_produto',
                                '$precoBase_produto',
                                '$preco_produto',
                                '$estoque_produto',
                                '$tamanho_produto',
                                '$peso_produto',
                                '$codigo_produto',
                                '$modelo_produto',
                                '$ativo_produto',
                                '$tipo_produto',
                                '$banho_produto'
                                );";

    $resultado = mysqli_query($conexao, $query);

    if($resultado){
        header('location:../index.php?pagina=cadastro_produtos&cadastro=aprovado');
    }else{
        header('location:../index.php?pagina=cadastro_produtos&cadastro=erro');
   
    }
    
?>]

