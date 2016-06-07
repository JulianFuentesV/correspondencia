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

								<table>
									<tr>
										<td><h3 class="title-font blue-font text-center"> Mes:</h3></td>
										<td><h3 class="title-font blue-font text-center"> Año:</h3></td>
									</tr>
									<tr>
										<td>
											<select name="mes" class="form-control">
												<option value="1">Enero</option>
												<option value="2">Febrero</option>
												<option value="3">Marzo</option>
												<option value="4">Abril</option>
												<option value="5">Mayo</option>
												<option value="6">Junio</option>
												<option value="7">Julio</option>
												<option value="8">Agosto</option>
												<option value="9">Septiembre</option>
												<option value="10">Octubre</option>
												<option value="11">Noviembre</option>
												<option value="12">Diciembre</option>
											</select>
										</td>
										<td><input type="number" name="anio" min="2000" max="2050" class="form-control" /></td>
									</tr>
								</table>

								<h3 class="title-font blue-font"> Imprimir desde el día:</h3>
								<input type="number" name="fechaDesde" class="form-control" min="1" max="31"></input>

								<h3 class="title-font blue-font">Imprimir hasta el día:</h3>
								<input type="number" name="fechaHasta" class="form-control" min="1" max="31"></input>

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