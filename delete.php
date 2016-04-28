<?php
	header("Content-Type: text/html;charset=utf-8");
	session_start();
	$id = $_REQUEST['delete'];

	include ("conexion.php");
	$con = mysqli_connect($host, $user, $pw, $db);
	$con->set_charset("utf8");
	$documents = mysqli_query($con, "DELETE FROM documents WHERE id = ".$id) or die ("prob_query: ".mysql_error());

	header("Location: index.php");
?>