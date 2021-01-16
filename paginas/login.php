<?php 

    $pagina = $_SERVER["QUERY_STRING"];

    if(isset($_GET['perfil'])){

    
?>

<script>
    alert('Logue para ver seus pedidos');
</script>
<?php
    }
?>
<?php
if(isset($_GET['perfil'])=='logar'){
    echo "<h2 class='tituloPagina'>Faça seu Login</h2>";
}
?>

<div id="login">
    <form class="formulario" action='./script/codigo_login.php?<?=$pagina?>' method='POST'>
        <input class ="inputLogin" type="text" id="inputLogin"  name="inputLogin" placeholder="Login" required maxlength="10"> <br>
        <input class ="inputLogin" type="password" id="inputSenha" name="inputSenha" placeholder="Senha" required maxlength="15"> <br>
        <div style = "display: flex; flex-direction: row-reverse">
            <button class="btnPrincipal" type="submit" id="btnIncluir">Login</button>
        </div>
    </form>
    <a href = ./index.php?pagina=cadastro>Não tem cadasro? Clique aqui</a>
</div>

