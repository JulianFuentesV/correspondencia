<?php
	SESSION_START();
	$_SESSION['logged']="no";

	include ("conexion.php");

	echo "Incl conexion";

	$usuario = $_REQUEST['user'];
	$password = $_REQUEST['pass'];

	$con = mysqli_connect($host, $user, $pw, $db) or die("prob_con: ".mysqli_error());
	echo "Conected";
	$con->set_charset("utf8");
	echo "set char";
	$normal = mysqli_query($con, "SELECT password FROM usuarios WHERE user = '$usuario'") or die ("prob_qry: ".mysqli_error());

	echo "normal: ".count($normal);

	if ($row = mysqli_fetch_array($normal)) {

		/*if (password_verify($password,$row[0])) {*/ //Disponible para PHP >= 5.5.0
		if(crypt($password,'$F4cS4lUd$') == $row[0]){
			$_SESSION['logged']="ok";
			$_SESSION['user']=$usuario;
			header("Location: index.php");
			//echo "normal";
		} else {
			$_SESSION['logged']="no";
			header("Location: login.php");
			echo "nopw";
			//echo "PW: ".$password."<BR> HASH: ".$row[0];
		}

	} else {
		$_SESSION['logged']="no";
		header("Location: login.php");
		echo "nodt";
	}

?>