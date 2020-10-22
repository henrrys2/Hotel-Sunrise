var categorias;

$( document ).ready(function() {
  getCategorias()
});


function getCategorias() {

  $.ajax({
    url: '../controllers/ccategoria.php',
    type: 'post',
    dataType: 'JSON',
    data: `accion=getCategorias`,
    success: function(html){
      categorias = html
      listarCategorias()
    }
  })

}

function listarCategorias(){
  let vistaCategoria = ``
  categorias.map(categoria => (
    vistaCategoria += `
    <div class="col-md-3 col-sm-6">
      <div class="product-grid7">
          <div class="product-image7">
              <a href ="frmcuarto.php?id=${categoria.id}";>
                  <img class="pic-1" src="${categoria.url}">
                  <img class="pic-2" src="${categoria.url}">
              </a>
              <ul class="social">
                  <li><a href="frmcuarto.php?id=${categoria.id}" class="fa fa-search"></a></li>
              </ul>
          </div>
          <div class="product-content">
              <h3 class="title"><a href="frmcuarto.php?id=${categoria.id}">${categoria.nombre}</a></h3>
          </div>
      </div>
    </div>
    `
  ))
  
  $('#listaCategorias').html(vistaCategoria)

}


