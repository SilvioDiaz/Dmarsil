<script>
document.title = "Perfil"
</script>

<?php

$id = $_SESSION['Usuario']['id_usuario'];
 $query = 'SELECT * FROM usuario WHERE id_usuario = '.$id ;

 $consulta = mysqli_query($conexao, $query);
?>

<h1>Perfil:</h1>

<?php
while($linha = mysqli_fetch_array($consulta)){
    if($linha['numero'] == "0"){
        $linha['numero'] = "Sem Número";
    }
    if($linha['complemento']== ""){
        $linha['complemento'] ="Sem complemento";
    }
?>

<div class="container">
    <div class="row">

        <div class="col-2">
            <div id="perfil_menu">
            
            <a href="?pagina=pedidos" class="btn_menuPerfil"> Pedidos      
            </a>
        </div>

        </div>

        <div id="perfil_dados" class="col-6">
                
                <div class="row">
                    <div id="perfil" class="linha_perfil">
                        <h5>Nome:</h5> <p><?=$linha['nome']?></p>
                    </div>

                    <div id="perfil_Telefone"  class="linha_perfil">
                        <h5>Telefone:</h5> <p><?=$linha['telefone']?></p>
                    </div>


                    <div id="perfil_email"  class="linha_perfil">
                        <h5>E-mail:</h5> <p><?=$linha['email']?></p>
                    </div>

                </div>

                <div class="row">    

                    <div id="perfil_nascimento"  class="linha_perfil">
                        <h5>Nascimento:</h5> <p><?=$linha['nascimento']?></p>
                    </div>

                </div>

                <div class="row">
                    
                </div> 

                <div class="row">
                    <div id="perfil_Cep"  class="linha_perfil">
                            <h5>Cep:</h5> <p><?=$linha['cep']?></p>
                    </div>

                    <div id="perfil_endereco"  class="linha_perfil">
                        <h5>Endereço:</h5> <p><?=$linha['endereco']?></p>
                    </div>
                    <div id="perfil_numero"  class="linha_perfil">
                        <h5>Numero:</h5> <p><?=$linha['numero']?></p>
                    </div>
                </div>
                <div class="row">
                    <div id="perfil_Complemento"  class="linha_perfil">
                        <h5>Complemento:</h5> <p><?=$linha['complemento']?></p>
                    </div>
                </div>

                <div class="row">
                    <div id="perfil_Cidade"  class="linha_perfil">
                        <h5>Cidade:</h5> <p><?=$linha['cidade']?></p>
                    </div>

                    <div id="perfil_Bairro"  class="linha_perfil">
                        <h5>Bairro:</h5> <p><?=$linha['bairro']?></p>
                    </div>
                    
                </div>
            
                <div id="perfil_Estado"></div>
                
                




            <?php
            }
            ?>

            <div id="perfil_deslogar">
                <a class="btnPrincipal" href="./script/logoff.php">Deslogar</a>
            </div>
        </div>
    </div>
    </div>
</div>