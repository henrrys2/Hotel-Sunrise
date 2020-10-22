<?php
	class conexion
	{	private $srv;
		private $usr;
		private $lkey;
		private $bd;
		private $lnk;
		function __construct()
		{	$this->srv="127.0.0.1";
			$this->usr="root";
			$this->lkey="";
			$this->bd="hotel";
			$this->lnk=null;
		}
		function conectar()
		{	
			$this->lnk=new mysqli($this->srv,$this->usr,$this->lkey,$this->bd);
			return $this->lnk;
		}
		function desconectar()
		{	mysqli_close($this->lnk);
		}
	}
?>