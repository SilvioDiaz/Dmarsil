<?php
include 'script/banco.php';

// ini_set('session.gc_maxlifetime', 120);
// session_set_cookie_params(120);
if(!isset($_SESSION)){
    session_start();
}
?>

<?php 
include 'header.php';
?>

<div class=".container-lg">

<?php
if(isset($_GET['pagina'])){
    $pagina = $_GET['pagina'];
}else{
    $pagina = 'home';
}

switch($pagina){
    case 'home':
        include 'paginas/home.php';
        break;
    case 'cadastro':
        include 'paginas/cadastro.php';
        break;
    case 'carrinho':
        include 'paginas/carrinho.php';
        break;
    case 'contato':
        include 'paginas/contato.php';
        break;
    case 'perfil':
        include 'paginas/perfil.php';
        break;
    case 'produtos':
        include 'paginas/produtos.php';
        break;
    case 'login':
        include 'paginas/login.php';
        break;
    case 'pedidos':
        include 'paginas/pedidos.php';
        break;
    case 'loja':
        include 'paginas/loja.php';
        break;
    case 'pagina_produto':
        include 'paginas/pagina_produto.php';
        break;



        // ADMINISTRADOR
    case 'cadastro_funcionarios':
        include 'paginas/ADMIN/cadastro_tipo.php';
        break;

    case 'cadastro_produtos':
        include 'paginas/ADMIN/cadastroproduto.php';
        break;

    case 'tipos_usuario':
        include 'paginas/ADMIN/tipos_usuario.php';
        break;

    case 'usuarios':
        include 'paginas/ADMIN/usuarios.php';
        break;
    
    case 'cadastropromo':
        include 'paginas/ADMIN/cadastropromocao.php';
        break;
    case 'categorias':
        include 'paginas/ADMIN/tipos_produto.php';
        break;

    case 'cadastro_categoria':
        include 'paginas/ADMIN/cadastro_categoria.php';
        break;

    

                
    
}

?>

</div>

<?php include 'footer.php' ?>