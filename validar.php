<?php

session_start();


if($_POST)
	{
	$usuario=$_POST['txtUsuario'];
	$clave=$_POST['txtClave'];



	$mysqli = new mysqli('localhost:3306', 'bibli82_root', '0~70hcqzBDWA', 'bibli82_biblio');
	$mysqli->set_charset("utf8");

$usuario = $mysqli->real_escape_string($usuario);
 
$query = "SELECT usuario, clave FROM usuario WHERE usuario = '$usuario' AND clave='$clave';";
$result = $mysqli->query($query);
 
if($result->num_rows == 1) 
{
	
	$_SESSION['user'] = $usuario;
	echo'<script type="text/javascript">;
	window.location.href="admin.php";</script>';
}
else{ 
	echo'<script type="text/javascript">;
	window.location.href="index.php";</script>';
}

}
