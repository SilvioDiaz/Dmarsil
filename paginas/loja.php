<h1>Loja</h1>

<?php
//Verificar produtos por banho
$linkBanho = "";
$categoria = "";
$banho = "";



if(isset($_GET['banho'])){
    $banho = $_GET['banho'];
    $query = 'SELECT * FROM produto WHERE ativo = true AND id_banho ='. $banho;

}else{
    //Verificar produtos em gerl
    $query = 'SELECT * FROM produto';
} if(isset($_GET['categoria'])){
    //Verificando se Categoria foi escolhida
    $categoria = $_GET['categoria'];

    $linkBanho = "categoria=";

    if(isset($_GET['banho'])){
        //Verificando se banho e categoria foram escolhidos
        $banho = $_GET['banho'];
        $query = "SELECT * FROM produto WHERE ativo = true AND tipo_produto=".$categoria. " AND id_banho=".$banho;
    }else{
        //Se apenas categoria for escolhida
        $query = 'SELECT * FROM produto WHERE ativo = true AND tipo_produto ='. $categoria;
    }

    

    
    }

    if(!isset($_GET['categoria']) AND (!isset($_GET['banho']))){
    //Se categoria nem banho forem escolhidas
        $categoria = null;
        $linkBanho = null;
        $query = 'SELECT * FROM produto';
    }
//Verificar produtos
$consulta = mysqli_query($conexao,$query);
?>

<div class="containerLista ">
    <div class = 'Home' id='produtoHome'>

    <a href= './index.php?pagina=loja&<?=$linkBanho?><?=$categoria?>&banho=1'>Ouro</a>
    <a href= './index.php?pagina=loja&<?=$linkBanho?><?=$categoria?>&banho=2'>Ouro Branco</a>

    

<?php
    while($linha = mysqli_fetch_array($consulta)){
?>


        <a class="produto" href="?pagina=pagina_produto&id=<?= $linha['id_produto'] ?>">
            <div  id="tituloProduto">
                <h1><?= $linha['nome_produto'] ?></h1>    
            </div>

                <div class="imgProduto" id="imgProduto">
                    <img class="imgHome" src=<?= $linha['imagem_produto'] ?>>
                </div>
                <div id="precoProduto">
                    <h5>R$ <?= $linha['preco_produto'] ?></h5>
                </div>
            
        </a>
    </div>
  


<?php
    }
    
?>

    </div>
</div>

<table id="phones">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>price</th>
      <th>samsung</th>
      <th>iphone</th>
      <th>htc</th>
      <th>lg</th>
      <th>nokia</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>



<div id="filter">
  <h2>Filter options</h2>
  <div>
    <input type="checkbox" name="banho=1">
    <label for="car">samsung</label>
  </div>
  <div>
    <input type="checkbox" name="iphone">
    <label for="language">iphone</label>
  </div>
  <div>
    <input type="checkbox" name="htc">
    <label for="nights">htc</label>
  </div>
  <div>
    <input type="checkbox" id="4" name="lg">
    <label for="student">lg</label>
  </div>
        <div>
    <input type="checkbox" id="5" name="nokia">
    <label for="student">nokia</label>
  </div>
</div>

<script>

function makeTable(data){
   var tbl_body = "";
      $.each(data, function() {
        var tbl_row = "";
        $.each(this, function(k , v) {
          tbl_row += "<td>"+v+"</td>";
        })
        tbl_body += "<tr>"+tbl_row+"</tr>";
      })

    return tbl_body;
  }

function buscarFiltro(){
    var opts = [];
    $checkboxes.each(function(){
      if(this.checked){
        opts.push(this.name);
      }
    });

    console.log(opts);
    return opts;
  }

  function atualizarPagina(opts){
    $.ajax({
      type: "POST",
      url: "./script/filtro_categoria.php",
      dataType : 'json',
      cache: false,
      data: {filterOpts: opts},
      success: function(records){
        $('#phones tbody').html(makeTable(records));
      }
    });
  }


  var $checkboxes = $("input:checkbox");
  $checkboxes.on("change", function(){
    var opts = buscarFiltro();
    atualizarPagina(opts);
  });

  atualizarPagina();


</script>