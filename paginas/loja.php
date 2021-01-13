<h1>Loja</h1>

<?php

    //Verificando Categoria -------------
    if(isset($_GET['categoria'])){
    $categoria = $_GET['categoria'];
    }

?>
<!-- Div para enviar categoria por ajax -->
<div style="display: none;" id="categoria">

<p id="idCat"><?=$categoria?></p>

</div>
<div class="containerLista ">
  <div class = 'Home' id='produtoHome'>

    <div class=""></div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="type" id="cbOuro" value="id_banho=1">
          <label class="form-check-label" for="inlineCheckbox1">Ouro</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="type" id="cbOuroBranco" value="id_banho=2">
          <label class="form-check-label" for="inlineCheckbox1">Ouro Branco</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="type" id="mdM" value="id_modelo=1">
          <label class="form-check-label" for="inlineCheckbox1">Masculino</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="type" id="mdF" value="id_modelo=2">
          <label class="form-check-label" for="inlineCheckbox1">Feminino</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="type" id="mdI" value="id_modelo3=">
          <label class="form-check-label" for="inlineCheckbox1">Infantil</label>
        </div>
      </div>
    <button id="buton">Teste</button>

  <div id ="loja">
  
  
  </div>


    </div>
</div>

<script>

var categoria = $("#idCat").text();
var cb = "";
var $checkboxes = $("input:checkbox");


function checagem(){

  var cb = [];
  $.each($("input:checkbox[name=type]:checked"), function(){
      cb.push($(this).val());
      
  });
  alert(cb.join(" AND "));
}

$("#buton").on("click",function(){
  checagem();
  chamarLoja();
});





function chamarLoja(){
  $.ajax({
    url: "script/filtro_categoria.php",
    data: {categoriaData: categoria,filtroData: cb},
    success: function(resultado){
      $("#loja").html(resultado);
    },
    error: function(){
      $("#loja").html("Tivemos algum problema na loja");
    }
  })
}

chamarLoja();

</script>

