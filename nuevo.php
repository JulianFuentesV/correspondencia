<?php
	header("Content-Type: text/html;charset=utf-8");
	session_start();
	$ses = $_SESSION['logged'];
	if ($ses != "ok") {
		header("Location: login.php");
	}
	include ("conexion.php");
	$con = mysqli_connect($host, $user, $pw, $db);
	$con->set_charset("utf8");
	$usuarios = mysqli_query($con, "SELECT * FROM usuarios") or die ("prob_query: ");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Ingresar nuevo documento | Correspondencia Interna</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<table class="automargin margin-top">
				<tr>
					<td><a href="index.php"><img src="imgs/unicauca.png" class="padding"></a></td>
					<td class="text-center">
					<a href="index.php">
						<div id="red-container">
							<div id="darkRed-container">
								<h1 class="white-font title-font">Facultad de Ciencias de la Salud</h1>
								<h2 class="white-font title-font">Control de correspondencia</h2>
							</div>
						</div>
					</a>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<div id="white-container">
							<h2 class="text-center title-font blue-font">NUEVO REGISTRO</h2>
							<hr>
							<form action="guardar.php" method="POST">
								<?php
									$date = getdate();
									$meses = array("cero","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
									$fecha = $date['mday']." - ".$meses[$date['mon']]." - ".$date['year'];
									echo "Fecha de ingreso: ".$fecha."<BR>";
									
									$_SESSION['fecha'] = $fecha;
									$_SESSION['dia'] = $date['mday'];
									$_SESSION['mes'] = $date['mon'];
									$_SESSION['anio'] = $date['year'];

								?>
								<BR>
								<input type="text" maxlength="20" placeholder="N° de ventanilla única" size="32" name="ventanillaUnica" class="form-control"></input><BR>
								<textarea type="text" maxlength="150" placeholder="Nombre del remitente" rows="5" cols="45" name="nombreRemitente" class="form-control"></textarea><BR>
								<input type="text" maxlength="30" placeholder="N° de oficio" size="40" name="numOficio" class="form-control"></input><BR>
								<input type="text" maxlength="5" placeholder="N° de anexos" name="numAnexos" class="form-control"></input><BR>
								<textarea type="text" maxlength="300" placeholder="Asunto" rows="8" cols="60" name="asunto" class="form-control"></textarea><BR>
								<textarea type="text" maxlength="200" placeholder="Area de destino" rows="6" cols="50" name="areaDestino" class="form-control"></textarea><BR>
								<!--<textarea type="text" maxlength="150" placeholder="Nombre de quien recibe" rows="5" cols="45" name="nombreReceptor" class="form-control"></textarea>-->
								<select class="form-control" name="nombreReceptor">
									<?php
										while ($usuario = mysqli_fetch_array($usuarios)) {
											if ($usuario['user'] != "admin") {
									?>
										<option value=<?php echo $usuario['user']; ?>><?php echo $usuario['user']; ?></option>
									<?php }} ?>
								</select>
								<BR>
								<textarea type="text" maxlength="150" placeholder="Responsable de la respuesta" rows="5" cols="45" name="responsableRpta" class="form-control"></textarea><BR>
								<textarea type="text" maxlength="150" placeholder="Destino para respuesta del documento" rows="5" cols="45" name="destinoRpta" class="form-control"></textarea><BR>
								<textarea type="text" maxlength="150" placeholder="Nombre del mensajero que recibe" rows="5" cols="45" name="nombreMensajero" class="form-control"></textarea><BR>
								<input type="submit" value="Guardar" class="btn btn-default blue-font"></input>
							</form>
						</div>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<!-- +++++++++++++++++++++ -->
		
</body>
</html>