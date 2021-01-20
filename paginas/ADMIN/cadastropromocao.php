<script>
document.title = 'Promoções Produto'
</script>


<?php
    include 'script/admin_only.php';
?>

<div class="containerLista">
<div class="titulo">
    <h1>Escolha produtos para a promoção:</h1>
</div>
<div class="tabela">


    <form action="./script/incluirPromo.php">
        <h2>Brinco</h2>
        <input class="inputCadastro" id="brincoPromo" name="brincoPromo" type="number">

        <h2>Anel</h2>
        <input class="inputCadastro" id="anelPromo" name="anelPromo" type="number">

        <h2>Pingente</h2>
        <input class="inputCadastro" id="pingentePromo" name="pingentePromo" type="number">

        <h2>Cordão</h2>
        <input class="inputCadastro" id="cordaoPromo" name="cordaoPromo" type="number">

        <h2>Pulseira</h2>
        <input class="inputCadastro" id="pulseiraPromo" name="pulseiraPromo" type="number">

        <h2>Tornozeleira</h2>
        <input class="inputCadastro" id="tornozeleiraPromo" name="tornozeleiraPromo" type="number">
        
        <div>
            <input class="btnPrincipal" type = "submit">
        </div>
    </form>    
        </div>
        </div>
