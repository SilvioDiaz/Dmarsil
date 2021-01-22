<?php

if(isset($_GET['pedido'])){
    $pedido = $_GET['pedido'];

    if($pedido == 'feito'){
    ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Parabéns!!',
        text: 'Sua compra foi efetuada com sucesso',
    })
    </script>
    <?php
    }else{
    ?>
    <script>

    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Algo deu errado com a sua compra',
        footer: 'Vamos verificar o problema'
    })

    </script>
    <?php
       
    }
}

if(isset($_SESSION['Usuario'])){

    if($_SESSION['Usuario']['id_tipo'] == '1'){
        $admin = true;
    }else{
        $admin = false;
    }
    

$id_usuario = $_SESSION['Usuario']['id_usuario'];

$pedidos_usuario = "";


if($admin == false){
    $id_usuario = $_SESSION['Usuario']['id_usuario'];
    $pedidos_usuario = " WHERE u.id_usuario =".$id_usuario;
}

   


$query_pedido = 'SELECT p.id_pedidos,p.id_status, p.valor_total, p.data_pedido,
s.descricao_status,u.nome, u.endereco, u.numero, u.complemento, u.bairro, u.cidade, u.cep
	FROM pedidos p
    INNER JOIN status_pedido s ON p.id_status = s.id_status
    INNER JOIN usuario u ON p.id_usuario = u.id_usuario'.$pedidos_usuario . ' ORDER BY  id_pedidos DESC';


$consulta_pedido = mysqli_query($conexao,$query_pedido);

?>

<div id="pagina_pedido">

    <?php

    if (mysqli_num_rows($consulta_pedido) == 0) {
        echo "Nenhum pedido feito até o momento";
    } else {
       while($linha_pedido = mysqli_fetch_array($consulta_pedido)){

        
        $id = $linha_pedido['id_pedidos'];


        $query = 'SELECT p.id_pedidos,i.qtd,i.valor,i.id_produto,
            pr.nome_produto,pr.imagem_produto,pr.codigo_produto,pr.id_modelo,pr.id_banho,pr.tipo_produto
            FROM pedidos p
            INNER JOIN usuario u ON p.id_usuario = u.id_usuario
            INNER JOIN item_pedido i ON p.id_pedidos = i.id_pedidos
            INNER JOIN produto pr ON i.id_produto = pr.id_produto
            INNER JOIN status_pedido s ON p.id_status = s.id_status WHERE p.id_pedidos='. $id;
        ?>  
        <div id="pedido" class="col-12">
            <div class="row">
                <p class="linha_perfil">Id Pedido: <?=$id?></p>
                <p class="linha_perfil">Data Pedido: <?= $linha_pedido['data_pedido']?></p>
                <p class="linha_perfil">valor total: <?= $linha_pedido['valor_total']?></p>
            </div>
            <p>Status do Pedido: <?=$linha_pedido['descricao_status']?></p>

            <div class="row">
                    <div id="perfil_Cep"  class="linha_perfil">
                            <h5>Cep:</h5> <p><?=$linha_pedido['cep']?></p>
                    </div>

                    <div id="perfil_endereco"  class="linha_perfil">
                        <h5>Endereço:</h5> <p><?=$linha_pedido['endereco']?></p>
                    </div>
                    <div id="perfil_numero"  class="linha_perfil">
                        <h5>Numero:</h5> <p><?=$linha_pedido['numero']?></p>
                    </div>
                </div>
                <div class="row">
                    <div id="perfil_Complemento"  class="linha_perfil">
                        <h5>Complemento:</h5> <p><?=$linha_pedido['complemento']?></p>
                    </div>
                </div>

                <div class="row">
                    <div id="perfil_Cidade"  class="linha_perfil">
                        <h5>Cidade:</h5> <p><?=$linha_pedido['cidade']?></p>
                    </div>

                    <div id="perfil_Bairro"  class="linha_perfil">
                        <h5>Bairro:</h5> <p><?=$linha_pedido['bairro']?></p>
                    </div>
                    
                </div>
                
                    <?php
                        if($admin == true){
                    ?>

                        <a class="btnPrincipal btnMargin" href="./script/alterar_statuspedido.php?alterar_status=enviado&id_pedido=<?=$id?>">
                                Enviado
                        </a>

                        <a class="btnPrincipal btnMargin" href="./script/alterar_statuspedido.php?alterar_status=entregue&id_pedido=<?=$id?>">
                                Entregue
                        </a>

                        <a class="btnPrincipal btnMargin" href="./script/alterar_statuspedido.php?alterar_status=pago&id_pedido=<?=$id?>">
                                Pago
                        </a>

                    <?php
                        }
                    ?>

                <a class="btnPrincipal btnMargin" href="./script/alterar_statuspedido.php?alterar_status=cancelado&id_pedido=<?=$id?>">
                        Cancelar
                </a>

                
                <div style="margin: 1rem; display: flex; flex-direction: row-reverse;">
                    <button class="btnPrincipal " type="button" data-toggle="collapse" data-target="#pedido<?=$id?>" aria-expanded="false" aria-controls="d">
                        Detalhes
                    </button>
                </div>

                
        </div>
        
        <!-- ITEM PEDIDO  -------------------------->
        <div class="collapse" id="pedido<?=$id?>">
            <div class="detalhesItens">
                <table cellspacing =0>

                    <tr>
                        <th>Produto</th>
                        <th>Valor Pago</th>
                        <th>Quantidade</th>
                        <th>Imagem</th>
                    </tr>


                <?php
                    $consulta = mysqli_query($conexao,$query);
                    while($linha = mysqli_fetch_array($consulta)){
                ?>


                    <tr>

                    <td> <?= $linha['nome_produto']?> </td>
                    <td> <?= $linha['valor']?> </td>
                    <td> <?= $linha['qtd']?> </td>
                    <td> <?= $linha['imagem_produto']?> </td>

                    </tr>
                    <?php
                        }      
                    ?>
            </table>
                </div>
            </div>
                
            

                        
            

        <?php
            
        };
        ?>

</div>
<?php
    }
}else{

    header('location:./index.php?pagina=login&perfil=logar');

}
?>