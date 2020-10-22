var cuarto;


$( document ).ready(function() {
  getcuarto()
});


function getcuarto(){

    const idCategoria = $('#idcategoria').val()

    $.ajax({
      url: '../controllers/chabitaciones.php',
      type: 'post',
      dataType: 'JSON',
      data: `idcategoria=${idCategoria}&accion=getHabitacion`,
      success: function(html){
        cuartos = html
        console.log(cuartos)
        listarcuartos()
      }
    })
  
  }
  function listarcuartos(){
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
      let habilitar = cuarto.estado!=0 ? 'disabled': ''
    return vistacuartos +=`
    
            <tr align='center'>
              <td>${cuarto.categoria}</td>
              <td>${cuarto.numero}</td>
              <td>${cuarto.precio}</td>
              <td>${cuarto.estado == 0 ? 'Disponible' : 'No Disponible'}</td>
              <td>
                <button type='button' ${habilitar} onclick="mostrarModal(${cuarto.id})" name='reservar' id='reservar_${cuarto.id}' class='btn btn-success' >Reservar</button>
              </td>
            </tr>
    `
    })
    vistacuartos += `
      </tbody>
    </table>
    `
    document.body.style.backgroundImage = `url('${cuartos[0].url}')`;
    document.body.style.backgroundRepeat = `no-repeat`;
    document.body.style.backgroundSize = `cover`;
    $('#cuarto').html(vistacuartos);
    
  }

  function mostrarModal(room){
    $("#mymodal").modal("show");
    $("#idcuarto").val(room);
  }

  function calcularCosto(){
    var fecha1 = moment($('#date').val());
    var fecha2 = moment($('#date2').val());
    if(fecha1 != "" && fecha2 != ""){
      var diferencia = fecha2.diff(fecha1, 'days');
      if(diferencia == 0){
        $('#costo').val(cuartos[0].precio)
      }
      else if(diferencia < 0){
        $('#costo').val("La fecha de inicio debe ser menor o igual a la de salida")
      }
      else{
        $('#costo').val(diferencia * cuartos[0].precio)
      }
    }
  }
  function validarFechas(){
    var fecha1 = moment($('#date').val());
    var fecha2 = moment($('#date2').val());
    var diferencia = fecha2.diff(fecha1, 'days');
    if(diferencia>=0){
      console.log("se puede")
      return true
    }else{
      swal("ERROR!", "Fechas invalidas!", "error");
      limpiarModal();
      return false
    }
  }

  function limpiarModal(){
    $('#date').val("")
    $('#date2').val("")
    $('#costo').val("")
  }

  function newreservacion(){
    if(!validarFechas()) return;
    datos2 = $(':input').serialize();
    const costo = $('#costo').val()
    console.log(datos2)
    $.ajax({
      url: '../controllers/chabitaciones.php',
      type: 'post',
      data: datos2  +`&costo=${costo}` +"&accion=newreservacion",
      success: function(html){
        swal("EXITOSO!", "Reservado correctamente!", "success");
        getcuarto();
        limpiarModal();
      }
    })

  }