
<?php
	include 'plantilla.php';
	require 'conexion.php';
	session_start();
	if(!isset($_SESSION['administrador']))
	{
		header("Location:frmlogin.php");
	}	
	$query = "SELECT re.*,cl.nombres,c.numero FROM reservaciones as re INNER JOIN clientes as cl ON cl.id = re.idcliente INNER JOIN cuartos as c ON c.id = re.idhabitacion ORDER BY re.fechareservacion ASC";
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(20,6,'#',1,0,'C',1);
	$pdf->Cell(50,6,'ENTRADA',1,0,'C',1);
	$pdf->Cell(50,6,'SALIDA',1,0,'C',1);
	$pdf->Cell(30,6,'CLIENTE',1,0,'C',1);
	$pdf->Cell(20,6,'CUARTO',1,0,'C',1);
	$pdf->Cell(20,6,'TOTAL',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	$i=0;
	$total=0;
	while($row = $resultado->fetch_assoc())
	{
		$i++;
		$total= $total + $row['costototal'];
		$pdf->Cell(20,6,$i,1,0,'C');
		$pdf->Cell(50,6,utf8_decode($row['fechareservacion']),1,0,'C');
		$pdf->Cell(50,6,utf8_decode($row['fechasalida']),1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row['nombres']),1,0,'C');
		$pdf->Cell(20,6,utf8_decode($row['numero']),1,0,'C');
		$pdf->Cell(20,6,utf8_decode("S/".$row['costototal'].".00"),1,1,'C');
		// $pdf->Cell(20,6,$row['id_municipio'],1,0,'C');
		// $pdf->Cell(20,6,utf8_decode($row['municipio']),1,1,'C');
	}
	$pdf->Cell(170,6,"TOTAL NETO",1,0,'C');
	$pdf->Cell(20,6,"S/".$total.".00",1,0,'C');
	$pdf->Output();
?>