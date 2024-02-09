<?php
function conexionBd()
{
	// Local
	$host = "localhost";
	$username = "root";
	$password = "";
	$bdnombre = "ProyectoPPI";

	// Creacion de conexion.

	// Local
	$conn = mysqli_connect($host, $username, $password, $bdnombre);

	// Host
	// $conn = mysqli_connect($host, $username, $password, $bdnombre, $portbd);

	$conn->set_charset('utf8');

	// Verificar la conexion.
	if (!$conn) {
		die("La conexion fallo: " . mysqli_connect_error());
	}
	return $conn;
}

// Para cerrar la conexion de la base de datos.
function cerrarBd($conn)
{
	mysqli_close($conn);
}
// * Para usar mas adelante como metodo de cerrar sesion.
// closeDb($conn);
