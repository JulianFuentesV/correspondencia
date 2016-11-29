<?php
	header("Content-Type: text/html;charset=utf-8");
	session_start();

	$meses = array("cero","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	$str = $_REQUEST['date'];
	$a = substr($str, 0, 4);
	$m = substr($str, 5, 2);
	$d = substr($str, 8);
	$f = $d."-".$meses[$m]."-".$a;
	$_SESSION['fecha'] = $f;
	$_SESSION['dia'] = $d;
	$_SESSION['mes'] = $m;
	$_SESSION['anio'] = $a;

	$fechaIngreso = $_SESSION['fecha'];
	$dia = $d;
	$mes = $m;
	$anio = $a;
	$ventanillaUnica = $_REQUEST['ventanillaUnica'];
	$nombreRemitente = $_REQUEST['nombreRemitente'];
	$numOficio = $_REQUEST['numOficio'];
	$numAnexos = $_REQUEST['numAnexos'];
	$asunto = $_REQUEST['asunto'];
	$areaDestino = $_REQUEST['areaDestino'];
	$nombreReceptor = $_REQUEST['nombreReceptor'];
	$responsableRpta = $_REQUEST['responsableRpta'];
	$destinoRpta = $_REQUEST['destinoRpta'];
	$nombreMensajero = $_REQUEST['nombreMensajero'];

	//echo "nombreReceptor: ".$nombreReceptor;

	include("conexion.php");

	$con = mysqli_connect ($host, $user, $pw, $db) or die ("Pro_server");
	$con->set_charset("utf8");
	$document = mysqli_query($con, "INSERT INTO documents (dia, mes, anio, fechaIngreso, ventanillaUnica, nombreRemitente, numOficio, numAnexos, asunto, areaDestino, nombreReceptor, responsableRpta, destinoRpta, nombreMensajero) VALUES ('$dia','$mes','$anio','$fechaIngreso','$ventanillaUnica','$nombreRemitente','$numOficio','$numAnexos','$asunto','$areaDestino','$nombreReceptor','$responsableRpta','$destinoRpta','$nombreMensajero')") or die ("pro_insert_db");

	header("Location: index.php");
?>