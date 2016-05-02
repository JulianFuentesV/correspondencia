<?php
	header("Content-Type: text/html;charset=utf-8");
	session_start();
	$ses = $_SESSION['logged'];
	if ($ses != "ok") {
		header("Location: login.php");
	}

	$meses = array("cero","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

	$f = $_REQUEST['fecha'];
	$dia = substr($f, 8, 2);
	$mes = $meses[0 + substr($f, 5, 2)];
	$anio = substr($f, 0, 4);
	$fecha = $dia." - ".$mes." - ".$anio;
	$ventanilla = $_REQUEST['ventanilla'];
	$nomRemitente = $_REQUEST['remitente'];
	$areaDestino = $_REQUEST['destino'];

	include ("conexion.php");
	$con = mysqli_connect($host, $user, $pw, $db);
	$con->set_charset("utf8");

	$longFecha = strlen($f);

	if ($longFecha == 0) {
		$documents = mysqli_query($con, "SELECT * FROM documents WHERE ventanillaUnica LIKE '%$ventanilla%' AND nombreRemitente LIKE '%$nomRemitente%' AND areaDestino LIKE '%$areaDestino%'") or die ("prob_query: ");
	} else {
		$documents = mysqli_query($con, "SELECT * FROM documents WHERE fechaIngreso LIKE '%$fecha%' AND ventanillaUnica LIKE '%$ventanilla%' AND nombreRemitente LIKE '%$nomRemitente%' AND areaDestino LIKE '%$areaDestino%'") or die ("prob_query: ");
	}
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
							<h2 class="text-center title-font blue-font">RESULTADOS</h2>
							<hr>
							<div>
								<form method="POST" action="documento.php">
								<table class="automargin">
									<th class="text-center padding-sm">Fecha</th>
									<th class="text-center padding-sm">Remitente</th>
									<th class="text-center padding-sm">Asunto</th>
									<th class="text-center padding-sm">Accion</th>
									<?php
									while ($doc = mysqli_fetch_array($documents)) {
									?>
										<tr id="doc">
											<td class="padding-left-sm">
												<?php echo $doc['fechaIngreso']; ?>
											</td>
											<td class="padding-left-sm">
												<?php
													if (strlen($doc['nombreRemitente']) > 25) {
														echo substr($doc['nombreRemitente'],0,25)."...";
													} else {
														echo substr($doc['nombreRemitente'],0,25);
													}
												?>
											</td>
											<td class="padding-sm">
												<?php
													if (strlen($doc['asunto']) > 50) {
														echo substr($doc['asunto'],0,50)."<BR>".substr($doc['asunto'],50,50)."...";
													} else {
														echo substr($doc['asunto'],0,50);
													}
												?>
											</td>
											<td class="text-center">
												<button id="btn-circle" class="btn btn-default blue-font" name="ver" value=<?php echo $doc['id'];?> >Ver</button>
											</td>
										</tr>
									<?php } ?>
								</table>
								</form>
							</div>
						</div>
						</div>
					</td>
				</tr>
			</table>
		</div>
	</div>
</body>
</html>