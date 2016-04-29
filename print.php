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
							<h2 class="text-center title-font blue-font">IMPRIMIR REPORTES</h2><hr>
							<form method="POST" action="imprimir.php">
								<h3 class="title-font blue-font"> Imprimir desde:</h3>
								<input type="date" name="fechaDesde" class="form-control" placeholder="aaaa/mm/dd"></input>

								<h3 class="title-font blue-font">Imprimir hasta:</h3>
								<input type="date" name="fechaHasta" class="form-control" placeholder="aaaa/mm/dd"></input>

								<br>
								<input type="submit" class="btn btn-default blue-font" value="Imprimir"></input>
							</form>
						</div>
					</td>
				</tr>
			</table>
		</div>
	</div>
</body>
</html>