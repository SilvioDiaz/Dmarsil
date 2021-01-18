
<h1>Temporary phones database</h1>

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




<div id="filter">
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="checkbox" name="type"  value="id_banho = 1">
    <label class="form-check-label" for="inlineCheckbox1">Ouro</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="checkbox" name="type"   value="id_banho = 2">
    <label class="form-check-label" for="inlineCheckbox2">Ouro Branco</label>
  </div>

    <div class="form-check form-check-inline">
      <input class="form-check-input modelocheck" type="checkbox" name="type"  value="id_modelo = 1">
      <label class="form-check-label" for="inlineCheckbox3">Masculino</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input modelocheck" type="checkbox" name="type"  value="id_modelo = 2">
      <label class="form-check-label" for="inlineCheckbox3">Feminino</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input modelocheck" type="checkbox" name="type"  value="id_modelo = 3">
      <label class="form-check-label" for="inlineCheckbox3">Infantil</label>
  </div>

</div>


<div id="loja">

</div>

<script>

var categoria = $("#idCat").text();
var $checkboxes = $("input:checkbox");

function modelo(){
  var modelo = [];
  $.each($("input:checkbox[name=modelo]:checked"),function(){
    modelo.push($(this).val());
  });
  
  filtro_modelo = modelo.join(" OR tipo_produto=" + categoria + " AND ");

  console.log(filtro_modelo);
  alert(filtro_modelo);
  chamarLoja(filtro_modelo);

}

$($checkboxes).on('change',function(){
  checagem();

});


function checagem(){
  var cb = [];
  $.each($("input:checkbox[name=type]:checked"),function(){
    cb.push($(this).val());
  });
    filtro = cb.join(" OR tipo_produto=" + categoria + " AND ");

  console.log(filtro);
  alert(filtro);
  chamarLoja(filtro);
}

function chamarLoja(cb){
  $.ajax({
    url: "./script/filtro_categoria.php",
    data: {categoriaData: categoria, filtroData: cb},
    success: function (resultado){
      $("#loja").html(resultado);
    },
    error: function(){
     alert("Algo deu errado")
    }
  });
}

chamarLoja();

</script>
