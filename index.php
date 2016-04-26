<?php
	header("Content-Type: text/html;charset=utf-8");
	session_start();
	$ses = $_SESSION['logged'];
	if ($ses != "ok") {
		header("Location: login.php");
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
		<div class="row">
			<table class="automargin margin-top">
				<tr>
					<td><img src="imgs/unicauca.png" class="padding"></td>
					<td class="text-center">
						<div id="red-container">
							<div id="darkRed-container">
								<h1 class="white-font title-font">Facultad de Ciencias de la Salud</h1>
								<h2 class="white-font title-font">Control de correspondencia</h2>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<div id="white-container">
							<h2 class="text-center title-font blue-font">BIENVENIDOS</h2>
							<div class="text-right">
								<hr>
								<a id="btn-circle" href="nuevo.php" class="btn btn-default">
									<img src="imgs/add.png">
								</a>
								<a id="btn-circle" href="buscar.php" class="btn btn-default">
									<img src="imgs/search.png">
								</a>
							</div>
							<div>
								<?php
									include ("conexion.php");
									$con = mysqli_connect($host, $user, $pw, $db);
									$con->set_charset("utf8");
									$documents = mysqli_query($con, "SELECT * FROM documents ORDER BY id DESC LIMIT 15") or die ("prob_query: ".mysql_error());
									?>
									<table>
									<th class="text-center">Fecha</th>
									<th class="text-center">Remitente</th>
									<th class="text-center">Asunto</th>
									<?php
									while ($doc = mysqli_fetch_array($documents)) {
									?>
										<tr>
											<td><?php echo $doc['fechaIngreso']; ?></td>
											<td class="padding-left-sm"><?php echo $doc['nombreRemitente']; ?></td>
											<td class="padding-left-sm"><?php echo $doc['asunto']; ?></td>
										</tr>
									<?php } ?>
								</table>
							</div>
						</div>
					</td>
				</tr>
			</table>
		</div>
	</div>
	
		
	
</body>
</html>