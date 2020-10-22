<?php

  require_once('../models/categoria.php');

  $accion = $_REQUEST{'accion'};

  switch($accion){

    case 'getCategorias':
      $categoria = new categoria(0,"","");
      $response = $categoria->getCategoria();
      echo $response;
    break;

    default:
    break;
  }

?>