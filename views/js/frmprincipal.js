function newcliente(){
    v = validarinfo();
	if (v == 0) {
		if (id == 0)
			act = 1;//Nuevo registro
		else
			act = 2;//Registro existente
		/////
		datos1 = $(':input').serialize();
		$.ajax({
			type: 'post',
			url: '../controllers/cclientes.php',
			data: datos1 + "&accion=newcliente",
			success: function (html) {
				if (html == 0)
					alert("No se pudo registrar...!");
				else {
					alert("Se pudo registrar")
				}
			}
		});


	}
}
function validarinfo(){

    id = $('#id').html();//document.getElementById("cliente_id").innerHTML
	nombre = $('#nombre').val();////document.getElementById("cliente_id").value
	apellidos = $('#apellido').val();
	correo = $('#correo').val();
	password = $('#password').val();
	//
	nuevo_reg = new Array(id,nombre, apellidos, correo, password);
	//
	v = 0;
	
	return v;
}
function login(){
    datos2 = $(':input').serialize();
    $.ajax({
		type: 'post',
		url: '../controllers/cclientes.php',
		data: datos2  + "&accion=login",
		success: function (res) {
        location.href=res;
		}})

}