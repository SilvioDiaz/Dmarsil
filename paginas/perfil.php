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
?>

<h5>Nome:</h5> <p><?=$linha['nome']?></p>
<h5>E-mail:</h5> <p><?=$linha['email']?></p>
<h5>Nascimento:</h5> <p><?=$linha['nascimento']?></p>
<h5>Endereço:</h5> <p><?=$linha['endereco']?></p>
<h5>Numero:</h5> <p><?=$linha['numero']?></p>
<h5>Bairro:</h5> <p><?=$linha['bairro']?></p>
<h5>Cidade:</h5> <p><?=$linha['cidade']?></p>
<h5>Cep:</h5> <p><?=$linha['cep']?></p>
<h5>Telefone:</h5> <p><?=$linha['telefone']?></p>



<?php
}
?>


<a href="./script/logoff.php">Deslogar</a>