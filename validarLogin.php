<?php
	SESSION_START();
	$_SESSION['logged']="no";

	include ("conexion.php");

	$usuario = $_REQUEST['user'];
	$password = $_REQUEST['pass'];

	$con = mysqli_connect($host, $user, $pw, $db);
	
	$normal = mysqli_query($con, "SELECT * FROM usuarios WHERE user = '".$usuario."' and password = '".$password."'");

	if ($row = mysqli_fetch_array($normal)) {
		$_SESSION['logged']="ok";
		header("Location: index.php");
		//echo "normal";
	}else{
		$_SESSION['logged']="no";
		header("Location: login.php");
		//echo "ninguno";
	}

?>