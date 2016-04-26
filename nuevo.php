<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/script.js"></script>
	<title>Ingresar nuevo documento | Correspondencia Interna</title>
</head>
<body>
	<div class="text-center">
		<h1 class="margin-top">Facultad de Ciencias de la Salud</h1>
		<img src="imgs/escudo.jpg" class="img">
		<h2>Universidad del Cauca</h2>
		<h3 class="margin-bottom">Control de ingreso y salida de correspondencia interna</h3>
		<form action="guardar.php" method="POST">
			<?php

				session_start();

				$date = getdate();
				$meses = array("cero","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
				$fecha = $date['mday']." - ".$meses[$date['mon']]." - ".$date['year'];
				echo "Fecha ingreso documento: ".$fecha;
				
				$_SESSION['fecha'] = $fecha;
				$_SESSION['dia'] = $date['mday'];
				$_SESSION['mes'] = $date['mon'];
				$_SESSION['anio'] = $date['year'];

			?>
			<BR>
			<input type="text" maxlength="20" placeholder="N° ventanilla única" size="32" name="ventanillaUnica"></input><BR>
			<textarea type="text" maxlength="150" placeholder="Nombre del remitente" rows="5" cols="45" name="nombreRemitente"></textarea><BR>
			<input type="text" maxlength="30" placeholder="N° de oficio" size="40" name="numOficio"></input><BR>
			<input type="text" maxlength="5" placeholder="N° de anexos" name="numAnexos"></input><BR>
			<textarea type="text" maxlength="300" placeholder="Asunto" rows="8" cols="60" name="asunto"></textarea><BR>
			<textarea type="text" maxlength="200" placeholder="Area destino" rows="6" cols="50" name="areaDestino"></textarea><BR>
			<textarea type="text" maxlength="150" placeholder="Nombre de quien recibe" rows="5" cols="45" name="nombreReceptor"></textarea><BR>
			<textarea type="text" maxlength="150" placeholder="Responsable de la respuesta" rows="5" cols="45" name="responsableRpta"></textarea><BR>
			<textarea type="text" maxlength="150" placeholder="Destino respuesta documento" rows="5" cols="45" name="destinoRpta"></textarea><BR>
			<textarea type="text" maxlength="150" placeholder="Nombre mensajero que recibe" rows="5" cols="45" name="nombreMensajero"></textarea><BR>
			<input type="submit" value="Guardar"></input>
		</form>
	</div>
</body>
</html>