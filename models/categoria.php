<?php
require_once("conexion.php");
class categoria
{
    private $id;
    private $nombre;
    private $url;
    
    private $mc;

    function  __construct($id,$nombre,$url)
    {
        $this->id=$id;
        $this->nombre=$nombre;
        $this->url= $url;
        $this->mc = new conexion();
    }
    function getCategoria(){
        $sql="SELECT * FROM categoria";
        $conn=$this->mc->conectar();
        $res=$conn->query($sql);
        $j="";
        if($res->num_rows>0)
        {				
            while($r=$res->fetch_array())
                $a[]=$r;
            $j=json_encode($a);	
        }
        $this->mc->desconectar();
        return $j;
    }
}
?>
