<?php
require_once("conexion.php");

class administrador
{
    private$id;
    private$nombre;
    private$apellidos;
    private$correo;
    private$password;

    private$mc;

    function __construct($id,$nombre,$apellidos,$correo,$password)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->correo= $correo;
        $this->password = $password;

        $this->mc = new conexion();

    }

    function guardarcli()
    {
        $sql="INSERT INTO administrador VALUES(0,'$this->nombre','$this->apellidos','$this->correo','$this->password')";
        $conn=$this->mc->conectar();
        $conn->query($sql);
        $id=$conn->insert_id;
        $this->mc->desconectar();
        return $id;
    }
    function validar()
    {
        $sql="SELECT * FROM administrador WHERE correo='$this->correo'";
        $conn = $this->mc->conectar();
        $response = $conn->query($sql);
        $c[0] = 0;
        if($response->num_rows>0){
            $c = $response->fetch_array();
        }
        $this->mc->desconectar();
        return $c;

    }
    function login()
    {
        $sql="SELECT *  FROM administrador WHERE correo='$this->correo' AND pass='$this->password'";
        $conn = $this->mc->conectar();
        $response = $conn->query($sql);
        $c[0] = 0;
        if($response->num_rows>0){
            $c = $response->fetch_array();
        }
        $this->mc->desconectar();
        return $c;
    }
}
?>