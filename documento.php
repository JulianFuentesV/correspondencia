<?php 
	header("Content-Type: text/html;charset=utf-8");
	session_start();
	$ses = $_SESSION['logged'];
	if ($ses != "ok") {
		header("Location: login.php");
	}

	$idDoc = $_REQUEST['ver'];
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
							<?php 
								while ($doc = mysqli_fetch_array($documents)) 
								{ 
							?>
									<h2 class="title-font">Fecha de ingreso: <?php echo $doc['fechaIngreso']."<BR>";?></h2>
									<h3 class="title-font">N° de ventanilla única:</h3>
									<p class="text-justify"><?php echo $doc['ventanillaUnica'];?></p>
									<h3 class="title-font">Nombre del remitente</h3>
									<p class="text-justify"><?php echo $doc['nombreRemitente'];?></p>
									<h3 class="title-font">N° de oficio</h3>
									<p class="text-justify"><?php echo $doc['numOficio'];?></p>
									<h3 class="title-font">N° de anexos</h3>
									<p class="text-justify"><?php echo $doc['numAnexos'];?></p>
									<h3 class="title-font">Asunto</h3>
									<p class="text-justify"><?php echo $doc['asunto'];?></p>
									<h3 class="title-font">Area de destino</h3>
									<p class="text-justify"><?php echo $doc['areaDestino'];?></p>
									<h3 class="title-font">Nombre de quien recibe</h3>
									<p class="text-justify"><?php echo $doc['nombreReceptor'];?></p>
									<h3 class="title-font">Responsable de la respuesta</h3>
									<p class="text-justify"><?php echo $doc['responsableRpta'];?></p>
									<h3 class="title-font">Destino para respuesta del documento</h3>
									<p class="text-justify"><?php echo $doc['destinoRpta'];?></p>
									<h3 class="title-font">Nombre del mensajero que recibe</h3>
									<p class="text-justify"><?php echo $doc['nombreMensajero'];?></p>
							<?php } ?>
						</div>
					</td>
				</tr>
			</table>
		</div>
	</div>
</body>
</html>