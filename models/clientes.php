<?php
require_once("conexion.php");
class cliente
{
    private $id;
    private $nombres;
    private $apellidos;
    private $correo;
    private $password;
    private $mc;
function __construct($id,$nombres,$apellidos,$correo,$password){
    $this->id=$id;
    $this->nombres=$nombres;
    $this->apellidos=$apellidos;
    $this->correo=$correo;
    $this->password=$password;

    $this->mc=new conexion();
}
function guardarcli(){
    $sql="INSERT INTO clientes VALUES(0,'$this->nombres','$this->apellidos','$this->correo','$this->password')";
    $conn=$this->mc->conectar();
    $conn->query($sql);
    $id=$conn->insert_id;
    $this->mc->desconectar();
    return $id;
}
function validar(){
    $sql="SELECT * FROM clientes WHERE correo='$this->correo'";
    $conn = $this->mc->conectar();
    $response = $conn->query($sql);
    $c[0] = 0;
    if($response->num_rows>0){
        $c = $response->fetch_array();
    }
    $this->mc->desconectar();
    return $c;
}
function login(){
    $sql="SELECT * FROM clientes WHERE correo='$this->correo' AND pass='$this->password'";
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