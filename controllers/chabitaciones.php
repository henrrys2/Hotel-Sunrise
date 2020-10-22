<?php
    require_once("../models/habitaciones.php");
    require_once("../models/reservaciones.php");
    $accion=$_REQUEST['accion'];
    switch($accion)
    {
        case'getHabitacion':
            $categoria= $_REQUEST['idcategoria'];
            $cli= new habitacion(0,$categoria,"","","");
            $j = $cli->getcuarto();
            echo $j;
        break;
        case'newreservacion':
            $cuarto=$_REQUEST['idcuarto'];
            $usuario= $_REQUEST['idusuario'];
            $fecha=$_REQUEST['date'];
            $fecha1=$_REQUEST['date2'];
            $costo=$_REQUEST['costo'];
            $cli=new reservacion(0,$fecha,$fecha1,$costo,$usuario,$cuarto);
            $j= $cli->guardar();
            if($j>0)
            {
                $cli1= new habitacion($cuarto,"","","","");
                $cli1->actualizar();
                echo $j;
            }
        break;
        case 'gethabitaciones':
            
            $cli= new habitacion(0,"","","","");
            $j = $cli->getcuartos();
            echo $j;
        break;
        case 'liberar':
            $cuarto=$_REQUEST['cuarto'];
            $cli=new habitacion($cuarto,"","","","");
            $cli->liberar();
        break;
    }

?>
