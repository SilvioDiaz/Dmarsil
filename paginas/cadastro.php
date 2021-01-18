<?php

    $campo = array();
    $descricao_botao = 'Incluir usuário';
    $acao_formulario = './script/incluir_usuario.php';
    $titulo_pagina = 'Cadastro de usuários';
    $btnID = 'btnFuncao';
    // Preparação dos dados para a combo Estado
    $query_estado = 'SELECT * FROM estado';
    $resultado_estado = mysqli_query($conexao, $query_estado);

    // Preparação dos dados para a combo Tipos de usuário
    $query_tipo = 'SELECT * FROM tipo_usuario';
    $resultado_tipo = mysqli_query($conexao, $query_tipo);

    if(!isset($_GET['id'])){
        $campo['login'] = '';
        $campo['senha'] = '';
        $campo['nome'] = '';
        $campo['email'] = '';
        $campo['nascimento'] = '';
        $campo['endereco'] = '';
        $campo['numero'] = '';
        $campo['complemento'] = '';
        $campo['bairro'] = '';
        $campo['cidade'] = '';
        $campo['cep'] = '';
        $campo['telefone'] = '';
        $campo['tipo_usuario'] = '';
    } else { 
        $id = $_GET['id'];

        $descricao_botao = 'Alterar usuário';
        $acao_formulario = './script/alterar_usuario.php?id='.$id;
        $titulo_pagina = 'Alteração de usuários';
        $btnID = 'alterarProduto';

        $query = "SELECT * FROM usuario WHERE id_usuario = $id";

        $resultado = mysqli_query($conexao, $query);

        while($linha = mysqli_fetch_array($resultado)){
            $campo['login'] = $linha['login'];
            $campo['senha'] = $linha['senha'];
            $campo['nome'] = $linha['nome'];
            $campo['email'] = $linha['email'];
            $campo['nascimento'] = substr($linha['nascimento'],8,2).'/'.substr($linha['nascimento'],5,2).'/'.substr($linha['nascimento'],0,4);
            $campo['endereco'] = $linha['endereco'];
            $campo['numero'] = $linha['numero'];
            $campo['complemento'] = $linha['complemento'];
            $campo['bairro'] = $linha['bairro'];
            $campo['cidade'] = $linha['cidade'];
            $campo['id_estado'] = $linha['id_estado'];
            $campo['cep'] = $linha['cep'];
            $campo['telefone'] = $linha['telefone'];
            $campo['tipo_usuario'] = $linha['id_tipo'];        
        } 
    }; 

    function get_endereco($cep){


        // formatar o cep removendo caracteres nao numericos
        $cep = preg_replace("/[^0-9]/", "", $cep);
        $url = "http://viacep.com.br/ws/$cep/xml/";
        $check = @get_headers($url);
      
        if ($cep) {
             if(@get_headers($xml = simplexml_load_file($url)) == 'HTTP/1.1 400 Bad Request'){
                "CEP não existe ou não foi encontrado :("; 
            }else{
                return $xml;
                
            }
                   
            
        }       
        
        }
      
?>

<script>
document.title = "Cadastro"
</script>   

<div class="titulo">
    <h1 class="tituloPagina"><?=$titulo_pagina?></h1>
</div>


<script>

function verificarNumero(campo,evento){
    var e = evento.keyCode;
    var d = campo.value;
    
    if(e <96 && e > 105 || e< 48 || e> 57 ){
        campo.value = null;
        alert ("Não é número");
    }else{
        campo.value = d;
    }

   
}



function formatarData(campo,evento){ 
     var e = evento.keyCode; 
     var d = campo.value(str); 
 

     if(e != 8 && e != 46){ 
         if(d.length == 2){ 
             campo.value = d += '/'; 
         }else if (d.length == 5){
             campo.value = d += '/';
         }else{
             campo.value = d;
         }
     }
}   


function caixaAlta(campo){
    var input_ = campo.value;
    campo.value = input_.toUpperCase();
}

</script>






    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Insira seu CEP</h5>
                </div>
                <div class="modal-body">
                
                    <div>
                        <form action="" method="post">
                            <input id="pegarCep"placeholder = "CEP" type="text" name="cep">
                            <button class="btnPrincipal" id="endPesquisa" type="submit">Pesquisar Endereço</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <?php 

    if (isset($_POST['cep'])) {
        $numero_cep = $_POST['cep']; ?>
       <?php
        $endereco = get_endereco($numero_cep);
        if ($endereco) {

        $estado = $endereco->uf;

        $query_Cepestado = "SELECT * FROM estado WHERE uf = '$estado' ";
        $resultado_cepEstado = mysqli_query($conexao,$query_Cepestado);
        while($cep_estado = mysqli_fetch_array($resultado_cepEstado)){
            $campo['id_estado'] = $cep_estado['id_estado'];
        }
       
      
        $campo['endereco'] = $endereco->logradouro;
        $campo['cep'] =  $endereco->cep;
        $campo['bairro'] = $endereco->bairro;
        $campo['cidade'] = $endereco->localidade;
       
        
        ?>

        <script>
            var CEP = 'disabled'
        </script>
   
    <?php
        } else {
        echo ("Cep não encontrado");
        }
    }

    ?>
    <div id="cadastro_usuario">
        <div class="cadastro container-centro">

            <form id="tela" action="<?=$acao_formulario?>" method="POST">

                <input class="input_cadastro entrada" type="email" size=30 value="<?=$campo['email']?>" maxlength="30" id="txtEmail" name="txtEmail" placeholder="E-mail"required><br>

                <input class="input_cadastro entrada" type="text" size=50 value="<?=$campo['nome']?>" maxlength="50" id="txtNome" name="txtNome" placeholder="Nome do usuário" onkeyup="caixaAlta(this)" required><br>

                <input class="input_cadastro entrada entrada-top" size=10 value="<?=$campo['login']?>" maxlength="10" type="text" id="txtLogin" name="txtLogin" placeholder="Login" required><br>

                <input class="input_cadastro entrada" type="password" size=10 value="<?=$campo['senha']?>" maxlength="15" id="txtSenha" name="txtSenha" placeholder="Senha" required><br>

                <input class="input_cadastro entrada" type="text" size=15 value="<?=$campo['nascimento']?>" id="txtNascimento" name="txtNascimento" placeholder="Data de Nascimento" maxlength="10" onkeypress="verificarNumero(this,event)" required ><br>
      

                <div class="col-12">
                    <div class="row">
                        <input class="input_cadastro entrada" type="text" size=15 value="<?=$campo['telefone']?>" maxlength="14" id="txtTelefone" name="txtTelefone" placeholder="Telefone" onkeypress="verificarNumero(this,event)" required><br>
                    </div>
                </div>
               
                <input readonly class="input_cadastro entrada" type="text" maxlength="10" size=10 value="<?=$campo['cep']?>" id="txtCep" name="txtCep" placeholder="CEP" onkeypress="verificarNumero(this,event)" required><br>
  
                <div class="col-12">
                    <div class="row">
                        <input style="margin-right: 0.5rem;" readonly class="input_cadastro entrada" type="text" size=50 value="<?=$campo['endereco']?>" maxlength="40" id="txtEndereco" name="txtEndereco" placeholder="Endereço (Rua, Praça, etc...)" onkeyup="caixaAlta(this)" required><br>
                        <input class="input_cadastro entrada" type="text" size=5 value="<?=$campo['numero']?>" maxlength="8" id="txtNumero" name="txtNumero" placeholder="Numero" onkeypress="verificarNumero(this,event)"><br>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row">
                        <div>
                            <input readonly class="entrada input_cadastro" type="text" size=20 value="<?=$campo['cidade']?>" maxlength="25" id="txtCidade" name="txtCidade" placeholder="Cidade" required><br>

                            <div>
                                <select class="entrada" name="cmbEstado">
                                    <option value="#">Selecione o estado</option>
                                    
                                    <?php while($linha_estado = mysqli_fetch_array($resultado_estado)){ 
                                        if($campo['id_estado'] == $linha_estado['id_estado']){
                                            $valor = 'selected';
                                        } else {
                                            $valor = '';
                                        }
                                    ?>
                                        <option value="<?=$linha_estado['id_estado']?>" <?=$valor?>><?=$linha_estado['descricao']?></option>
                                    <?php } ?>
                                </select><br>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row">
                        <input style="margin-right: 0.5rem;" readonly class="entrada input_cadastro" type="text" size=20 value="<?=$campo['bairro']?>" maxlength="25" id="txtBairro" name="txtBairro" placeholder="Bairro" required><br>
                        <input class="entrada input_cadastro" type="text" size=30 value="<?=$campo['complemento']?>" maxlength="20" id="txtComplemento" name="txtComplemento" placeholder="Complemento (APT, etc...)"><br>
                    </div>
                </div>
          
              

                <div class="barra col-12">
                
                <?php

                if (isset($_SESSION['Usuario'])) {
                    if($resultadoHeader['id_tipo'] = 1){
                        
                ?>

                <button class="btnPrincipal" name=<?= $btnID?> id=<?= $btnID?> type="submit"><?=$descricao_botao?></button>

                <select class="entrada" name="cmbTipo">
                    <option value="#">Selecione o tipo</option>

                    <?php while($linha_tipo = mysqli_fetch_array($resultado_tipo)){
                        if($campo['tipo_usuario'] == $linha_tipo['id_tipo']){
                            $valor = 'selected';
                        }else {
                            $valor = '';
                        }
                        
                    ?>
                        <option value="<?=$linha_tipo['id_tipo']?>" <?=$valor?>><?=$linha_tipo['descricao']?></option>
                    <?php } ?>
                </select><br>
                <?php
                    }   
                }
                ?>

            
                    
                </div>

            
            </form>
        </div>    
    </div>

    <script src="./script/jquery.maskedinput.js" type="text/javascript"></script>

    <script>
    $(function() {
        $("#txtNascimento").mask("99/99/9999",{placeholder:"mm/dd/yyyy"});
        $("#pegarCep").mask("99999-999",{placeholder:"xxxxx-xxx"});
        $("#txtTelefone").mask("(99)99999-9999",{placeholder:"(xx)xxxxx-xxxx"});

    });

    
    if($("#txtCep").val() == ""){
        $(window).on('load',function(){
            $('#myModal').modal('show');
        });
    }  
    
    $('#endPesquisa').click(function(){
        $('#myModal').modal('toggle');
    });

</script>





