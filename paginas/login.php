<?php 
    if(isset($_GET['perfil'])){

    
?>

<script>
    alert('Logue para ver seus pedidos');
</script>
<?php
    }
?>

<div class="containerLista ">
<h3>Login</h3>
<form class="formulario" action='./script/codigo_login.php' method='POST'>
    <input type="text" id="inputLogin"  name="inputLogin" placeholder="Login" required maxlength="10"> <br>
    <input type="password" id="inputSenha" name="inputSenha" placeholder="Senha" required maxlength="15"> <br>
    <button type="submit" id="btnIncluir">Login</button>
</form>
<a href = ./index.php?pagina=cadastro>Não tem cadasro? Clique aqui</a>
</div>

