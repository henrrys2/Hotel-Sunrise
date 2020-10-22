<?php
require_once("conexion.php");

class reservacion
{
    private $id;
    private $fecha;
    private $fecha1;
    private $costo;
    private $usuario;
    private $cuarto;

    private $mc;

    function __construct($id,$fecha,$fecha1,$costo,$usuario,$cuarto){
        $this->id = $id;
        $this->fecha = $fecha;
        $this->fecha1 = $fecha1;
        $this->costo = $costo;
        $this->usuario = $usuario;
        $this->cuarto = $cuarto;

        $this->mc =  new conexion();
    }
    function guardar()
    {
        $sql="INSERT INTO reservaciones VALUES (0,'$this->fecha','$this->fecha1','$this->costo','$this->usuario', '$this->cuarto')";
        $conn=$this->mc->conectar();
        $conn->query($sql);
        $id=$conn->insert_id;
        $this->mc->desconectar();
        return $id;
    }
}

?>