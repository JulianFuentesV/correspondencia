<?php
	header("Content-Type: text/html;charset=utf-8");
	session_start();
	$ses = $_SESSION['logged'];
	$userLog = $_SESSION['user'];
	if ($ses != "ok" || $userLog != "admin") {
		header("Location: login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/script.js"></script>
	<title>Administracion | Correspondencia Interna</title>
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
							<h2 class="text-center title-font blue-font">NUEVO USUARIO</h2>
							<hr>
							<form action="newUser.php" method="POST">
								<input type="text" maxlength="100" placeholder="Usuario" name="newUser" class="form-control"></input><BR>
								<input type="password" maxlength="100" placeholder="contraseña" name="newPass" class="form-control"></input><BR>
								<input type="text" maxlength="100" placeholder="Email" name="newEmail" class="form-control"></input><BR>
								<input type="submit" value="Guardar" class="btn btn-default blue-font"></input>
							</form>
							<hr>
							<h2 class="text-center title-font blue-font">USUARIOS EXISTENTES</h2>
							<hr>
							<div>
								<?php
									include ("conexion.php");
									$con = mysqli_connect($host, $user, $pw, $db);
									$con->set_charset("utf8");
									$usuarios = mysqli_query($con, "SELECT * FROM usuarios") or die ("prob_query: ");
								?>
								<form method="POST" action="deleteUser.php">
								<table class="automargin">
									<th class="text-center padding-sm">Usuario</th>
									<th class="text-center padding-sm">Correo</th>
									<th class="text-center padding-sm">Accion</th>
									<?php
									while ($usuario = mysqli_fetch_array($usuarios)) {
									?>
										<tr id="doc">
											<td class="padding-left-sm">
												<?php echo $usuario['user']; ?>
											</td>
											<td class="padding-left-sm">
												<?php echo $usuario['email']; ?>
											</td>
											<td class="text-center">
												<?php if ($usuario['user'] != "admin") { ?>
													<button id="btn-circle" class="btn btn-default blue-font" name="deleteUser" value=<?php echo $usuario['id'];?>>
													<img src="imgs/delete.png">
													</button>
												<?php } ?>
											</td>
										</tr>
									<?php } ?>
								</table>
								</form>
							</div>
						</div>
					</td>
				</tr>
			</table>
		</div>
	</div>
</body>
</html>