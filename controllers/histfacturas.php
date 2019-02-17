<?php
require('session.php');
require('../models/funciones.php');

$nombreSesion = $_SESSION['login_user'];

$numCliente = numeroCliente($conn, $nombreSesion);

$noPedido = consultarPedidos($conn, $numCliente);

if ($noPedido == '0'){
	echo "<p style='color:red;'><b>Dicho cliente no ha realizado ningun pedido<b></p>";
	mysqli_rollback($conn);
	die();
} else {
	
	/*imprime la tabla de los pedidos*/
	require('../views/viewpedidos.php');
	
}


?>