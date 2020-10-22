var cuartos

$( document ).ready(function() {
  getdata()
});


function getdata(){
    $.ajax({
        url:"../controllers/chabitaciones.php",
        dataType:'JSON',
        type:'POST',
        data: `accion=gethabitaciones`,
        success: function(html){
        cuartos = html
        console.log(cuartos)
        showdata()
      }
    })
}

function showdata()
{
    let vistacuartos = ` 
    <table class = "table" border=2>
      <thead>
        <tr align='center'>
          <th>Categoria</th>
          <th>Numero</th>
          <th>Precio</th>
          <th>Estado</th>
          <th>Operación</th>
        </tr>
      </thead>
      <tbody>`
    cuartos.map((cuarto, index) => {
      let habilitar = cuarto.estado!=1 ? 'disabled': ''
    return vistacuartos +=`
    
            <tr align='center'>
              <td>${cuarto.categoria}</td>
              <td>${cuarto.numero}</td>
              <td>${cuarto.precio}</td>
              <td>${cuarto.estado == 0 ? 'Disponible' : 'No Disponible'}</td>
              <td>
                <button type='button' ${habilitar} onclick="actualizarE(${cuarto.id})" name='liberar' id='liberar_${cuarto.id}' class='btn btn-success' >Liberar</button>
              </td>
            </tr>
    `
    })
    vistacuartos += `
      </tbody>
    </table>
    `
    $('#cuarto').html(vistacuartos);
}
function actualizarE(id_cuarto)
{
    $.ajax({
        
        url: '../controllers/chabitaciones.php',
        type: 'post',
        data: `cuarto=${id_cuarto}&accion=liberar`,
        success: function(html){
            getdata();
        }
          
    })
}