<?php
	
	$mysqli = new mysqli('localhost', 'root', '', 'hotel');
	
	if($mysqli->connect_error){
		
		die('Error en la conexion' . $mysqli->connect_error);
		
	}
?>