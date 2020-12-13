<script>
document.title = "Cadastro de Produto"
</script>

<?php
  $campo = array();
  $descricao_botao = 'Cadastrar novo Produto';
  $acao_formulario =   './script/incluir_produto.php';


  $query_tipo = 'SELECT * FROM tipo_produto';
  $resultado_tipo = mysqli_query($conexao, $query_tipo);

  $query_banho = 'SELECT * FROM banho';
  $resultado_banho = mysqli_query($conexao,$query_banho);

  if(!isset($_GET['id'])){
    $campo['nome_produto'] = '';
    $campo['descricao_produto'] = '';
    $campo['banho_produto'] = '';
    $campo['img_produto'] = '';
    $campo['precoBase_produto'] = '';
    $campo['preco_produto'] = '';
    $campo['estoque_produto'] = '';
    $campo['tamanho_produto'] = '';
    $campo['peso_produto'] = '';
    $campo['codigo_produto'] = '';
    $campo['id_banho'] = '';
    $campo['ativo'] = '';
  }else{
    $id = $_GET['id'];
    $descricao_botao = 'Alterar Produto';
    $acao_formulario = './script/alterar_produto.php?id='.$id;
    $titulo_pagina = "Alterar Produto";

    $query = "SELECT * FROM produto WHERE id_produto = $id";
    $resultado = mysqli_query($conexao,$query);

    while($linha = mysqli_fetch_array($resultado)){
      $campo['nome_produto'] =      $linha['nome_produto'] ;
      $campo['descricao_produto'] = $linha['descricao_produto'];
      $campo['id_banho'] =          $linha['id_banho'];
      $campo['img_produto'] =       $linha['imagem_produto'];
      $campo['precoBase_produto'] = $linha['precoBase_produto'];
      $campo['preco_produto'] =     $linha['preco_produto'];
      $campo['estoque_produto'] =   $linha['estoque_produto'];
      $campo['tamanho_produto'] =   $linha['tamanho_produto'];
      $campo['peso_produto'] =      $linha['peso_produto'];
      $campo['codigo_produto'] =    $linha['codigo_produto'];
      $campo['tipo_produto'] =      $linha['tipo_produto'];
      $campo['ativo'] =             $linha['ativo'];
  
    }
  }

?>



<form id="cadastro_produto" action="<?=$acao_formulario?>" method="POST" enctype="multipart/form-data">
    <input type="text" id="nome_produto"      name= "txt_nome_produto"        value ='<?=$campo['nome_produto']?>'        placeholder="Nome do Produto">      <br>
    <input type="text" id="descricao_produto" name= "txt_descricao_produto"   value = '<?=$campo['descricao_produto']?>'  placeholder="Descrição de Produto"> <br>
    <?php
      while($linha_banho = mysqli_fetch_array($resultado_banho)){
        if($campo['id_banho'] == $linha_banho['id_banho']){
            $valor ='checked';
        }else{
          $valor = '';
        }
   
    ?>
    <input type="radio" id="<?=$linha_banho['id_banho']?>'" name="rdBanho" value="<?=$linha_banho['id_banho']?>"  <?=$valor?>>
      <label for="<?=$linha_banho['id_banho']?>"><?=$linha_banho['nome_banho']?></label><br>
    <?php
         }
    ?>

    <input type="file" id="fileToUpload"      name= "fileToUpload"            value = '<?=$campo['img_produto']?>'        placeholder="imagem" required>      <br>
    <input type="text" id="precoBase_produto" name= "txt_precoBase_produto"   value = '<?= $campo['precoBase_produto']?>' placeholder="Preço Base">           <br>
    <input type="text" id="preco_produto"     name= "txt_preco_produto"       value = '<?=$campo['preco_produto']?>'      placeholder="Preço do Produto">     <br>
    <input type="text" id="estoque_produto"   name= "txt_estoque_produto"     value = '<?=$campo['estoque_produto']?>'    placeholder="Estoque">              <br>
    <input type="text" id="tamanho_produto"   name= "txt_tamanho_produto"     value = '<?=$campo['tamanho_produto']?>'    placeholder="Tamanho do Produto">   <br>
    <input type="text" id="peso_produto"      name= "txt_peso_produto"        value = '<?=$campo['peso_produto']?>'       placeholder="Peso do Produto">      <br>
    <input type="text" id="codigo_produto"    name= "txt_codigo_produto"      value = '<?=$campo['codigo_produto']?>'     placeholder="Código de Produto">    <br>

    <select class="entrada" name="cmbTipoProduto">
            <option value="#">Selecione o tipo de Produto:</option>

            <?php while($linha_tipoProduto = mysqli_fetch_array($resultado_tipo)){
                        PRINT_R($linha_tipoProduto);
                if($campo['tipo_produto'] == $linha_tipoProduto['id_tipoProduto']){
                    $valor = 'selected';
                } else {
                    $valor = '';
                }
            ?>
                <option value="<?=$linha_tipoProduto['id_tipoProduto']?>" <?=$valor?>><?=$linha_tipoProduto['nome_tipoProduto']?></option>
            <?php } ?>
    </select><br>

      <?php
        if($campo['ativo'] == 1){
          $valorAtivo = 'checked';
          $valorInativo = '';
        }else{
          $valorInativo = 'checked';
          $valorAtivo = '';
        }
      ?>
        <input type="radio" id="ativar'" name="rdAtivo" value="1" <?=$valorAtivo?>>
          <label for="ativar">Ativo</label><br>

        <input type="radio" id="desativar'" name="rdAtivo" value="0" <?=$valorInativo?>>
          <label for="ativar">Inativo</label><br>


              
    <button type ='submit'><?=$descricao_botao?></button>

    

</form>