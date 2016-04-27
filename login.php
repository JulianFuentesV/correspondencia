<?php 
	session_start();
	$_SESSION['logged'] = "no";
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
							<h2 class="text-center title-font blue-font">INGRESO</h2>
							<form method="POST" action="validarLogin.php" class="text-center padding">
								<input type="text" placeholder="Usuario" name="user" class="form-control"></input>
								</br>
								<input type="password" placeholder="contraseña" name="pass" class="form-control"></input>
								</br>
								<input type="submit" value="Acceder" class="btn btn-default blue-font"></input>
							</form>
						</div>
					</td>
				</tr>
			</table>
		</div>
	</div>
</body>
</html>