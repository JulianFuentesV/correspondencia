<?php 
	header("Content-Type: text/html;charset=utf-8");
	session_start();
	$ses = $_SESSION['logged'];
	if ($ses != "ok") {
		header("Location: login.php");
	}

	include('plugins/mpdf60/mpdf.php');
	include ("conexion.php");

	$meses = array("cero","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

	$desde = $_REQUEST['fechaDesde'];
	$hasta = $_REQUEST['fechaHasta'];

	$diaDesde = substr($desde, 8, 2);
	$mesDesde = $meses[0 + substr($desde, 5, 2)];
	$anioDesde = substr($desde, 0, 4);
	$fechaDesde = $diaDesde." - ".$mesDesde." - ".$anioDesde;

	$diaHasta = substr($hasta, 8, 2);
	$mesHasta = $meses[0 + substr($hasta, 5, 2)];
	$anioHasta = substr($hasta, 0, 4);
	$fechaHasta = $diaHasta." - ".$mesHasta." - ".$anioHasta;

	$con = mysqli_connect($host, $user, $pw, $db);
	$con->set_charset("utf8");
	$documents = mysqli_query($con, "SELECT * FROM documents WHERE fechaIngreso BETWEEN '$fechaDesde' AND '$fechaHasta'") or die ("prob_query: ");

	$cadena  ="<hr>";
	while ($doc = mysqli_fetch_array($documents)) 
	{
		$cadena = $cadena.
			"<b>Fecha de ingreso: </b>".$doc['fechaIngreso'].
			" | <b>N° de ventanilla única: </b>".$doc['ventanillaUnica'].
			" | <b>Nombre del remitente: </b>".$doc['nombreRemitente'].
			" | <b>N° de oficio: </b>".$doc['numOficio'].
			" | <b>N° de anexos: </b>".$doc['numAnexos'].
			" | <b>Asunto: </b>".$doc['asunto'].
			" | <b>Area de destino: </b>".$doc['areaDestino'].
			" | <b>Nombre de quien recibe: </b>".$doc['nombreReceptor'].
			" | <b>Responsable de la respuesta: </b>".$doc['responsableRpta'].
			" | <b>Destino para respuesta del documento: </b>".$doc['destinoRpta'].
			" | <b>Nombre del mensajero que recibe: </b>".$doc['nombreMensajero'].
			"<HR>";
	}

	$pdf = new mPDF('utf-8', 'A4-L');
	$pdf->WriteHtml($cadena);
	$pdf->Output();
	exit;
?>