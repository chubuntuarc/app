<?php
include("vars.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

//servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	$mysqli=new mysqli($servername,$username,$password,$dbname);

	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}

/** cambio del juego de caracteres a utf8 */
$mysqli->set_charset("utf8");
?>