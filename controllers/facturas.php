<?php
require('session.php');
require('../models/funciones.php');

$nombreSesion = $_SESSION['login_user'];
$numCliente = numeroCliente($conn, $nombreSesion);

$inicio = $_POST['inicio'];
$fin = $_POST['fin'];

if($inicio > $fin){
	echo "La fecha de inicio tiene que ser menor a la fecha de fin.";
} else {
	
	require('../views/viewpedidos.php');
	
}







?>