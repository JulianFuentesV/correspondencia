<?php
	header("Content-Type: text/html;charset=utf-8");
	session_start();
	$ses = $_SESSION['logged'];
	$userLog = $_SESSION['user'];
	if ($ses != "ok" || $userLog != "admin") {
		header("Location: login.php");
	}

	$newUser = $_REQUEST['newUser'];
	$newPass = $_REQUEST['newPass'];
	$newEmail = $_REQUEST['newEmail'];

	include ("conexion.php");
	$con = mysqli_connect($host, $user, $pw, $db);
	$con->set_charset("utf8");
	$usuario = mysqli_query($con, "INSERT INTO usuarios (user, password, email) VALUES ('$newUser', '$newPass', '$newEmail')") or die ("prob_query: ");
	header("Location: administrator.php");
?>