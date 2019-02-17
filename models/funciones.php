<?php

/*SELECT para seleccionar el CODIGO del cliente*/
function numeroCliente($conn, $nombreSesion){
	$selectCliente = "SELECT CustomerId FROM customer WHERE Email = '$nombreSesion';";
	$cliente = mysqli_query($conn, $selectCliente);
	$clienteCodigo = mysqli_fetch_array($cliente, MYSQLI_NUM); //Codigo del cliente
	$numCliente = $clienteCodigo[0];
	
	return $numCliente;
}

	/*consultamos si dicho cliente no ha realizado ningun pedido*/
function consultarPedidos($conn, $numCliente){
	$consultaPedido = "SELECT count(InvoiceId) FROM invoice WHERE CustomerId = $numCliente;";
	$pedido = mysqli_query($conn, $consultaPedido);
	$noPedido = mysqli_fetch_array($pedido, MYSQLI_NUM);
	$pedidos = $noPedido[0];
	
	return $pedidos;
}

/*funcion que guarda todos los datos de los pedidos para mostrarlos
SIN FECHA*/
function mostrarPedidos($conn,$numCliente){
	$resultado = "SELECT invoice.InvoiceId AS numeroUsu, invoiceLine.InvoiceLineId, invoice.InvoiceDate, track.Name, invoiceLine.Quantity, invoiceLine.UnitPrice, invoice.Total FROM invoice, invoiceLine, track WHERE track.TrackId = invoiceLine.TrackId AND invoice.InvoiceId = invoiceLine.InvoiceId AND invoice.CustomerId = $numCliente ORDER BY invoice.InvoiceId AND invoiceLine.InvoiceLineId;";
	$result = mysqli_query($conn, $resultado);
	
	return $result;
}

/*funcion que guarda toda la informacion de los pedidos y te los devuelve
INCLUYENDO LA FECHA*/
function mostrarPedidosFecha($conn, $numCliente, $inicio, $fin){
	$resultado = "SELECT invoice.InvoiceId AS numeroUsu, invoiceLine.InvoiceLineId, invoice.InvoiceDate, track.Name, invoiceLine.Quantity, invoiceLine.UnitPrice, invoice.Total FROM invoice, invoiceLine, track WHERE track.TrackId = invoiceLine.TrackId AND invoice.InvoiceId = invoiceLine.InvoiceId AND invoice.invoiceDate >= '$inicio'  AND invoice.invoiceDate <= '$fin' AND invoice.CustomerId = $numCliente ORDER BY invoice.InvoiceId;";
	$result = mysqli_query($conn, $resultado);
	
	return $result;
}

/*funcion que muestra las fechas para consultar los pedidos*/
function mostrarFechas($conn){
	$sql = "SELECT DISTINCT invoiceDate FROM invoice ORDER BY invoiceDate;";
	$resultado = mysqli_query($conn,$sql);
	while($fila = mysqli_fetch_assoc($resultado)){
		echo "<option value='".$fila['invoiceDate']."'>".$fila['invoiceDate']."</option>";
	}
}

/*funcion que solo muestra las caciones para comprar*/
function mostrarCanciones($conn){
	$sql = "SELECT Name FROM track LIMIT 100;";
	$resultado = mysqli_query($conn,$sql);
	while($fila = mysqli_fetch_assoc($resultado)){
		echo "<option value='".$fila['Name']."'>".$fila['Name']."</option>";
	}
}

/*funcion que limpia la cookie*/
// function limpiarCookie(){
	// setcookie('carrito', '', time() + (86400 * 30), "/");
	// header ("location: ../views/hacerpedidomain.php");
// }




?>