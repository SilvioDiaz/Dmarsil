
<?php

    //Verificando Categoria -------------
    if(isset($_GET['categoria'])){
    $categoria = $_GET['categoria'];

    $query = "SELECT nome_tipoProduto FROM tipo_produto WHERE id_tipoProduto =" . $categoria;
    $resultado = mysqli_query($conexao,$query);
    while($linha = mysqli_fetch_array($resultado)){
      $nome_categoria = $linha['nome_tipoProduto'];
    };
    }

?>
<!-- Div para enviar categoria por ajax -->
<div style="display: none;" id="categoria">

<p id="idCat"><?=$categoria?></p>

</div>
<div class="container">

  <h1 class="tituloPagina"><?=$nome_categoria?></h1>

  <div id="pagina_loja">

    <div id="filter" class="col-2">
      <div class="form-check form-check-inline filtroCat">
        <input class="form-check-input" type="checkbox" name="type"  value="id_banho = 1">
        <label class="form-check-label" for="inlineCheckbox1">Ouro</label>
      </div>
      <div class="form-check form-check-inline filtroCat">
        <input class="form-check-input" type="checkbox" name="type"   value="id_banho = 2">
        <label class="form-check-label" for="inlineCheckbox2">Ouro Branco</label>
      </div>

        <div class="form-check form-check-inline filtroCat">
          <input class="form-check-input modelocheck" type="checkbox" name="type"  value="id_modelo = 1">
          <label class="form-check-label" for="inlineCheckbox3">Masculino</label>
        </div>
        <div class="form-check form-check-inline filtroCat">
          <input class="form-check-input modelocheck" type="checkbox" name="type"  value="id_modelo = 2">
          <label class="form-check-label" for="inlineCheckbox3">Feminino</label>
        </div>
        <div class="form-check form-check-inline filtroCat">
          <input class="form-check-input modelocheck" type="checkbox" name="type"  value="id_modelo = 3">
          <label class="form-check-label" for="inlineCheckbox3">Infantil</label>
      </div>

    </div>

    <div id="loja" class="col-9">

    </div>
  </div>
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
