<?php
	$hash = password_hash("contrasena",PASSWORD_BCRYPT);
	echo "HASH: ".$hash;
	echo "VERIFY: ".password_verify("contrasena",$hash);
?>