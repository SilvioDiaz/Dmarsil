<script>
document.title = "Perfil"
</script>

<h1>Perfil:</h1>

<p>Nome: <?=$_SESSION['Usuario']['nome']?> </p>
<p>Login: <?=$_SESSION['Usuario']['login']?> </p>
<p>Senha: <?=$_SESSION['Usuario']['senha']?></p>
<p>Email: <?=$_SESSION['Usuario']['email']?></p>
<p>Data de Nascimento: <?=$_SESSION['Usuario']['nascimento']?></p>
<p>Endereço: <?=$_SESSION['Usuario']['endereco']?></p>
<p>Numero: <?=$_SESSION['Usuario']['numero']?></p>
<p>Complemento: <?=$_SESSION['Usuario']['complemento']?></p>
<p>Bairro: <?=$_SESSION['Usuario']['bairro']?></p>
<p>Cidade: <?=$_SESSION['Usuario']['cidade']?></p>
<p>Cep: <?=$_SESSION['Usuario']['cep']?></p>
<p>Telefone: <?=$_SESSION['Usuario']['telefone']?></p>

<a href="./script/logoff.php">Deslogar</a>



<?php
if (isset($vendedora)){
?>

<a>Mostruário</a>
<a>Vendas</a>
<a>Encomendas</a>
<a>Clientes</a>


<?php } ?>