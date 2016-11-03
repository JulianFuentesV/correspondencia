<?php 
	header("Content-Type: text/html;charset=utf-8");
	session_start();
	$ses = $_SESSION['logged'];
	if ($ses != "ok") {
		header("Location: login.php");
	}

	include('plugins/mpdf561/mpdf.php');
	include ("conexion.php");

	$meses = array("cero","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

	$mes = $_REQUEST['mes'];
	$anio = $_REQUEST['anio'];
	$desde = $_REQUEST['fechaDesde'];
	$hasta = $_REQUEST['fechaHasta'];

	/*$diaDesde = substr($desde, 8, 2);
	$mesDesde = substr($desde, 5, 1)=='0'?substr($desde, 6, 1):substr($desde, 5, 2);
	$anioDesde = substr($desde, 0, 4);
	$fechaDesde = $diaDesde." - ".$mesDesde." - ".$anioDesde;

	$diaHasta = substr($hasta, 8, 2);
	$mesHasta = substr($hasta, 5, 1)=='0'?substr($hasta, 6, 1):substr($hasta, 5, 2);
	$anioHasta = substr($hasta, 0, 4);
	$fechaHasta = $diaHasta." - ".$mesHasta." - ".$anioHasta;*/

	$con = mysqli_connect($host, $user, $pw, $db);
	$con->set_charset("utf8");

	/*$first = mysqli_query($con, "SELECT * FROM documents WHERE dia = '$diaDesde' AND mes = '$mesDesde' AND anio = '$anioDesde' ORDER BY id DESC");
	$last = mysqli_query($con, "SELECT * FROM documents WHERE dia = '$diaHasta' AND mes = '$mesHasta' AND anio = '$anioHasta' ORDER BY id ASC");

	while ($p = mysqli_fetch_array($first)) 
	{ $primero = $p['id']; }

	while ($l = mysqli_fetch_array($last)) 
	{ $ultimo = $l['id']; }*/

	/*echo "first: ".$primero."<BR>";
	echo "last: ".$ultimo."<BR>";
	echo "SELECT * FROM documents WHERE id BETWEEN '$primero' AND '$ultimo'";*/

	$documents = mysqli_query($con, "SELECT * FROM documents WHERE anio = '$anio' AND mes = '$mes' AND dia BETWEEN '$desde' AND '$hasta'") or die ("prob_query: ");

	while ($doc = mysqli_fetch_array($documents)) 
	{
		$cadena = $cadena.
			"<b>Fecha de ingreso: </b>".$doc['fechaIngreso'].
			" | <b>N° de ventanilla única: </b>".$doc['ventanillaUnica'].
			" | <b>N° de oficio: </b>".$doc['numOficio'].
			"<BR><b>Nombre del remitente: </b>".$doc['nombreRemitente'].
			//" | <b>N° de anexos: </b>".$doc['numAnexos'].
			//" | <b>Asunto: </b>".$doc['asunto'].
			" | <b>Area de destino: </b>".$doc['areaDestino'].
			//" | <b>Nombre de quien recibe: </b>".$doc['nombreReceptor'].
			//" | <b>Responsable de la respuesta: </b>".$doc['responsableRpta'].
			//" | <b>Destino para respuesta del documento: </b>".$doc['destinoRpta'].
			//" | <b>Nombre del mensajero que recibe: </b>".$doc['nombreMensajero'].
			"<HR>";
	}

	$pdf = new mPDF('utf-8', 'A4-L');
	$pdf->setHTMLHeader("
		<table style='margin: 0px 0px 0px 0px;'>
		<tbody>
			<tr>
				<td><img src='imgs/unicauca.png' style='max-width: 70px; max-height: 70px; margin: 0px 30px 0px 0px;'></td>
				<td><h2>Facultad de Ciencias de la Salud <BR> Control de ingreso y salida de correspondencia interna</h2></td>
			</tr>
		</tbody>
		</table>");
	$pdf->setAutoTopMargin;
	$pdf->setFooter('Página: {PAGENO} de {nb}');
	$pdf->WriteHtml("<BR><BR><BR>".$cadena);
	$pdf->Output();
	exit;
?>