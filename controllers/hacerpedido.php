<?php
	require_once('session.php');
	require_once('../models/funciones.php');
	require_once('../models/funcionespedido.php');
/*quito el autocomit*/
// mysqli_autocommit($conn, false);

	/*VARIABLES*/
	$array = array();
	$nombreSesion = $_SESSION['login_user'];
	$total = 0;
	$precio = 0;

//guardo la cookie en una array;
	$array = unserialize($_COOKIE['carrito']);

/*SELECT para seleccionar el CODIGO del cliente*/
	$cliente = numeroCliente($conn, $nombreSesion);

/*Select que recoge el dinero total de la compra*/
	foreach($array as $key => $value){
		//consulto el precio unitario de la canción
		$precio = consultarPrecio($conn, $key);
		//aumento el total, recogiendo el precio unitario por la cantidad y se la sumo al total
		$total = $total + ($value * $precio);
	}

	/*llamamos a la funcion crear pedido para insertarlo en la tabla invoice*/
	crearPedido($cliente, $conn, $total);
	
	/*guardamos el pedido en la tabla invoiceline con las lineas correspondientes*/
	foreach($array as $key => $value){
		$linea = lineaPedido($conn);
		$linea += 1;
		//creo tantas lineas de pedido como canciones haya en la array
		crearDetallePedido($linea, $key, $value, $conn);
	}


		echo "<p style='padding:5px; background-color: green; border: 1px solid red; color: white; width:20%; text-align: center;'><b>El pedido se ha realizado correctamente<b></p>";
		echo "Su numero de pedido es: <label style='color: red;'><b>".$GLOBALS['numeroPedido']."</b></label>";
		echo "<a href='../views/welcome.php'>VOLVER</a>";
	
	setcookie('carrito', '', time() + (86400 * 30), "/");
?>