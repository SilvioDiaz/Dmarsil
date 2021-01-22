<?php
    include './banco.php';

    $id_produto = $_GET['id'];

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

    if($uploadOk == 0){
            $image_produto = null;
            echo "Imagem faltando";
        }else{
            $local = 'img/produtos/';
            $localImg = $local . $nomeNovo;
            $image_produto =        $localImg;
            echo "Imagem correta";
            
        


    $query = "UPDATE produto SET nome_produto        =  '$nome_produto',
                                 descricao_produto       = '$descricao_produto',
                                 id_banho        =      '$banho_produto',
                                 imagem_produto        = '$image_produto',
                                 precoBase_produto   = '$precoBase_produto',
                                 preco_produto     = '$preco_produto',
                                 estoque_produto       = '$estoque_produto',
                                 tamanho_produto  = '$tamanho_produto',
                                 peso_produto       = '$peso_produto',
                                 codigo_produto       = '$codigo_produto',
                                 tipo_produto  = '$tipo_produto',
                                 id_modelo =     '$modelo_produto',
                                 ativo         = '$ativo_produto'
                           WHERE id_produto   = $id_produto";

    mysqli_query($conexao, $query);

    }
    echo '<br>' . $query;
    header('location:../index.php?pagina=produtos');


    ?>