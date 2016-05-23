<?php 
	header("Content-Type: text/html;charset=utf-8");
	session_start();
	$ses = $_SESSION['logged'];
	if ($ses != "ok") {
		header("Location: login.php");
	}

	$idDoc = $_REQUEST['edit'];
	include ("conexion.php");
	$con = mysqli_connect($host, $user, $pw, $db);
	$con->set_charset("utf8");
	$documents = mysqli_query($con, "SELECT * FROM documents WHERE id = '".$idDoc."'") or die ("prob_query: ".mysql_error());
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Correspondencia Interna | Universidad del Cauca</title>
</head>
<body>
	<div class="container">
		<div class="row padding-right-lg padding-left-lg">
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
							<div>
								<?php 
									while ($doc = mysqli_fetch_array($documents)) 
									{ 
								?>
							</div>
							<div>
							<form action="editar.php" method="POST">
								<?php
									$fecha = $doc['fechaIngreso'];
								?>
									<h2 class="title-font"><?php echo "Fecha de ingreso: ".$fecha."<BR>";?></h2>
								<?php	
									$_SESSION['id'] = $doc['id'];
									$_SESSION['fecha'] = $fecha;
									$_SESSION['dia'] = $doc['dia'];
									$_SESSION['mes'] = $doc['mes'];
									$_SESSION['anio'] = $doc['anio'];
								?>
								<BR>
								<h3 class="title-font">N° de ventanilla única:</h3>
								<input type="text" maxlength="20" placeholder="N° de ventanilla única" size="32" name="ventanillaUnica" class="form-control" value=<?php echo $doc['ventanillaUnica'];?>></input><BR>

								<h3 class="title-font">Nombre del remitente</h3>
								<textarea type="text" maxlength="150" placeholder="Nombre del remitente" rows="5" cols="45" name="nombreRemitente" class="form-control">
									<?php echo htmlentities($doc['nombreRemitente']);?>
								</textarea><BR>

								<h3 class="title-font">N° de oficio</h3>
								<input type="text" maxlength="30" placeholder="N° de oficio" size="40" name="numOficio" class="form-control" value=<?php echo $doc['numOficio'];?>></input><BR>

								<h3 class="title-font">N° de anexos</h3>
								<input type="text" maxlength="5" placeholder="N° de anexos" name="numAnexos" class="form-control" value=<?php echo $doc['numAnexos'];?>></input><BR>

								<h3 class="title-font">Asunto</h3>
								<textarea type="text" maxlength="300" placeholder="Asunto" rows="8" cols="60" name="asunto" class="form-control">
									<?php echo $doc['asunto'];?>
								</textarea><BR>

								<h3 class="title-font">Area de destino</h3>
								<textarea type="text" maxlength="200" placeholder="Area de destino" rows="6" cols="50" name="areaDestino" class="form-control">
									<?php echo $doc['areaDestino'];?>
								</textarea><BR>

								<h3 class="title-font">Nombre de quien recibe</h3>
								<textarea type="text" maxlength="150" placeholder="Nombre de quien recibe" rows="5" cols="45" name="nombreReceptor" class="form-control">
									<?php echo $doc['nombreReceptor'];?>
								</textarea><BR>

								<h3 class="title-font">Responsable de la respuesta</h3>
								<textarea type="text" maxlength="150" placeholder="Responsable de la respuesta" rows="5" cols="45" name="responsableRpta" class="form-control">
									<?php echo $doc['responsableRpta'];?>
								</textarea><BR>

								<h3 class="title-font">Destino para respuesta del documento</h3>
								<textarea type="text" maxlength="150" placeholder="Destino para respuesta del documento" rows="5" cols="45" name="destinoRpta" class="form-control">
									<?php echo $doc['destinoRpta'];?>
								</textarea><BR>

								<h3 class="title-font">Nombre del mensajero que recibe</h3>
								<textarea type="text" maxlength="150" placeholder="Nombre del mensajero que recibe" rows="5" cols="45" name="nombreMensajero" class="form-control">
									<?php echo $doc['nombreMensajero'];?>
								</textarea><BR>
								<input type="submit" value="Guardar" class="btn btn-default blue-font"></input>
							</form>
								<?php } ?>
							</div>
						</div>
					</td>
				</tr>
			</table>
		</div>
	</div>
</body>
</html>