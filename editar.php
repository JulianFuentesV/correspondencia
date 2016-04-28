<?php
	header("Content-Type: text/html;charset=utf-8");
	session_start();
	$id = $_SESSION['id'];
	$fechaIngreso = $_SESSION['fecha'];
	$dia = $_SESSION['dia'];
	$mes = $_SESSION['mes'];
	$anio = $_SESSION['anio'];
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

	include("conexion.php");

	$con = mysqli_connect ($host, $user, $pw, $db);
	$con->set_charset("utf8");
	echo $id;
	echo $nombreMensajero;

	$update = mysqli_query($con, "UPDATE documents SET dia = '$dia', mes = '$mes', anio = '$anio', fechaIngreso = '$fechaIngreso', ventanillaUnica = '$ventanillaUnica', nombreRemitente = '$nombreRemitente', numOficio = '$numOficio', numAnexos = '$numAnexos', asunto = '$asunto', areaDestino = '$areaDestino', nombreReceptor = '$nombreReceptor', responsableRpta = '$responsableRpta', destinoRpta = '$destinoRpta', nombreMensajero = '$nombreMensajero' WHERE id = '$id'") or die ("pro_insert_db");
	
	header("Location: index.php");
?>