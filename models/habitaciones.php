<?php
    require_once("conexion.php");

    class habitacion
    {

        private $id;
        private $categoria;
        private $precio;
        private $estado;
        private $numero;

        private $mc;

        function __construct($id,$categoria,$precio,$estado,$numero){

            $this->id = $id;
            $this->categoria = $categoria;
            $this->precio = $precio;
            $this->estado = $estado;
            $this->numero = $numero;
    
            $this->mc = new conexion();
        }

        function getcuarto(){
            
            $sql="SELECT c.*, ca.nombre as categoria, ca.url as url FROM cuartos as c INNER JOIN categoria as ca ON c.idcategoria = ca.id WHERE c.idcategoria = '$this->categoria'";
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
        function actualizar()
        {
            $sql="UPDATE cuartos SET estado = 1 WHERE id='$this->id'";
            $conn=$this->mc->conectar();
			$conn->query($sql);
			$this->mc->desconectar();
        }
        function liberar()
        {
            $sql="UPDATE cuartos SET estado = 0 WHERE id='$this->id'";
            $conn=$this->mc->conectar();
			$conn->query($sql);
			$this->mc->desconectar();
        }
        function getcuartos()
        {
            $sql="SELECT c.*,ca.nombre as categoria FROM cuartos as c inner join categoria as ca on c.idcategoria=ca.id";
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