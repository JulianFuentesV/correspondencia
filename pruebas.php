<?php
	$dat = $_REQUEST['date'];
	echo "date: ".$dat;
	if ($dat == "") {
		echo "es vacio";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>pruebas</title>
</head>
<body>
	<form action="pruebas.php" method="POST">
		<input type="date" name="date" value="2017-12-03">
		<input type="submit">
	</form>
</body>
</html>



								<?php
									$date = getdate();
									$meses = array("cero","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
									$fecha = $date['mday']." - ".$meses[$date['mon']]." - ".$date['year'];
									echo "Fecha de ingreso: ".$fecha."<BR>";
									echo "date: ".$date['mday']."<BR>";
									
									$_SESSION['fecha'] = $fecha;
									$_SESSION['dia'] = $date['mday'];
									$_SESSION['mes'] = $date['mon'];
									$_SESSION['anio'] = $date['year'];

									$str = "2017-12-03";
									$a = substr($str, 0, 4);
									$m = substr($str, 5, 2);
									$d = substr($str, 8);

									echo "año: ".$a." mes: ".$m." dia: ".$d;


/*
edit.php
nuevo.php
guardar.php
encontrar.php
*/

								?>