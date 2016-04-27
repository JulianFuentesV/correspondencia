<?php
	header("Content-Type: text/html;charset=utf-8");
	session_start();
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

	$con = mysql_connect ($host, $user, $pw)
			or die ("Pro_server");
       
			mysql_select_db ($db,$con)
				or die ("pro_select_db");

			mysql_query("SET NAMES 'utf8'");

			mysql_query("INSERT INTO documents (dia, mes, anio, fechaIngreso, ventanillaUnica, nombreRemitente, numOficio, numAnexos, asunto, areaDestino, nombreReceptor, responsableRpta, destinoRpta, nombreMensajero) VALUES ('$dia','$mes','$anio','$fechaIngreso','$ventanillaUnica','$nombreRemitente','$numOficio','$numAnexos','$asunto','$areaDestino','$nombreReceptor','$responsableRpta','$destinoRpta','$nombreMensajero')", $con) or die ("pro_insert_db");

	header("Location: index.php");
?>