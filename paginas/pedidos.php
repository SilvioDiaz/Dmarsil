<?php

if(isset($_SESSION['Usuario'])){



$id_usuario = $_SESSION['Usuario']['id_usuario'];



    


$query_pedido = 'SELECT p.id_pedidos,p.id_status, p.valor_total, p.data_pedido,
s.descricao_status
	FROM pedidos p
    INNER JOIN status_pedido s ON p.id_status = s.id_status';

$consulta_pedido = mysqli_query($conexao,$query_pedido);

?>

<?php
while($linha_pedido = mysqli_fetch_array($consulta_pedido)){
$id = $linha_pedido['id_pedidos'];


$query = 'SELECT p.id_pedidos,i.qtd,i.valor,i.id_produto,
    pr.nome_produto,pr.imagem_produto,pr.codigo_produto,id_modelo,id_banho,tipo_produto,
    u.nome, u.endereco, u.numero, u.complemento, u.bairro, u.cidade, u.cep,
    s.descricao_status
	FROM pedidos p
	INNER JOIN usuario u ON p.id_usuario = u.id_usuario
    INNER JOIN item_pedido i ON p.id_pedidos = i.id_pedidos
    INNER JOIN produto pr ON i.id_produto = pr.id_produto
    INNER JOIN status_pedido s ON p.id_status = s.id_status WHERE p.id_pedidos='. $id;

?>
<p>Id Pedido: <?=$id?></p>
<p>Data Pedido: <?= $linha_pedido['data_pedido']?></p>
<p>valor total: <?= $linha_pedido['valor_total']?></p>
<p>Status do Pedido: <?=$linha_pedido['descricao_status']?></p>
<?php
    $consulta = mysqli_query($conexao,$query);
    while($linha = mysqli_fetch_array($consulta)){


?>

    <h1>Produto: <?= $linha['nome_produto'] ?> </h1>
    <p>Valor Pago: <?= $linha['valor']?></p>
    
    
  

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
            
    <div class="imgProduto" id="imgProduto">
        <img class="imgHome" src=<?= $linha['imagem_produto'] ?>>
    </div>
    

    


<?php
        }
    };
?>


<?php

}else{

    header('location:./index.php?pagina=login&perfil=logar');

}
?>