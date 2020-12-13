<?php

if(isset($_SESSION['Usuario'])){



$id_usuario = $_SESSION['Usuario']['id_usuario'];


$query = 'SELECT p.id_pedidos, p.valor_total, p.data_pedido,
i.qtd,i.valor,i.id_produto,
pr.nome_produto,
u.nome, u.endereco, u.numero, u.complemento, u.bairro, u.cidade, u.cep
	FROM pedidos p
	INNER JOIN usuario u ON p.id_usuario = u.id_usuario
    INNER JOIN item_pedido i ON p.id_pedidos = i.id_pedidos
    INNER JOIN produto pr ON i.id_produto = pr.id_produto';
    
$consulta = mysqli_query($conexao,$query);


while($linha = mysqli_fetch_array($consulta)){
    
    
?>
    
    <p>Id Item: <?= $linha['id_pedidos']?></p>
    <p>Valor Pago: <?= $linha['valor']?></p>
    <p>Produto: <?= $linha['nome_produto'] ?> </p>
    <p>valor total: <?= $linha['valor_total']?></p>
    

    


<?php
        }
?>


<?php

}else{

    header('location:./index.php?pagina=login&perfil=logar');

}
?>