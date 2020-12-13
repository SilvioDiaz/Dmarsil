<script>
document.title = 'Promoções Produto'
</script>


<?php
    $query = 'SELECT * FROM produto';

    $consulta = mysqli_query($conexao, $query);

    if (isset($_SESSION['Usuario'])) {
        if(!$_SESSION['Usuario']['id_tipo'] == 1){
            header('location:index.php?pagina=home&status=naoautorizado');
        }else{
        
    }
}

?>

<div class="containerLista">
<div class="titulo">
    <h1>Escolha produtos para a promoção:</h1>
</div>
<div class="tabela">

<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#Brinco" aria-expanded="false" aria-controls="collapseExample">
    Brinco
</button>
<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#Anel" aria-expanded="false" aria-controls="collapseExample">
    Anél
</button>
<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#Pingente" aria-expanded="false" aria-controls="collapseExample">
    Pingente
</button>
<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#Cordao" aria-expanded="false" aria-controls="collapseExample">
    Cordão
</button>
<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#Pulseira" aria-expanded="false" aria-controls="collapseExample">
    Pulseira
</button>
<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#Tornozeleira" aria-expanded="false" aria-controls="collapseExample">
    Tornozeleira
</button>

    <div class="collapse" id="Brinco">
        <div class="card card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
        </div>
    </div>

    <div class="collapse" id="Anel">
        <div class="card card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
        </div>
    </div>

    <div class="collapse" id="Pingente">
        <div class="card card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
        </div>
    </div>

    <div class="collapse" id="Cordao">
        <div class="card card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
        </div>
    </div>

    <div class="collapse" id="Pulseira">
        <div class="card card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
        </div>
    </div>

    <div class="collapse" id="Tornozeleira">
        <div class="card card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
        </div>
    </div>


        <?php
            while($linha = mysqli_fetch_array($consulta)){
            ?>

            <input type="checkbox" id=<?=$linha['id_produto']?> name=<?=$linha['id_produto']?>>
                <label for <?=$linha['id_produto']?>><?=$linha['nome_produto']?>
                <img style = "width:100px"src=<?=$linha['imagem_produto']?> >
                </label>

            <?php
            }
        ?>
    </table>
    <a class="link_botao" href="?pagina=configurar_promo">Configurar Promoção</a>
</div>
        </div>