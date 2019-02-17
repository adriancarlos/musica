<?php


/*Funcion que nos crea un pedido en la tabla invoice*/
function crearPedido($cliente, $conn, $total){
	//select para el ultimo numero de pedido
	$selectContador = "SELECT MAX(InvoiceId) FROM invoice;";
	$contador = mysqli_query($conn, $selectContador);
	$cont = mysqli_fetch_array($contador, MYSQLI_NUM);
	//aumento el ultimo numero de pedido
	$cont[0] += 1;
	
	//preparo la sentencia para el insert
	$sentenciaPedido = mysqli_prepare($conn, "INSERT INTO invoice (InvoiceId, CustomerId, InvoiceDate, Total) VALUES (?,?,curdate(),?);");
	mysqli_stmt_bind_param($sentenciaPedido, 'iid', $cont[0], $cliente, $total); 
	mysqli_stmt_execute($sentenciaPedido);
	
	if(mysqli_stmt_execute($sentenciaPedido)){
		mysqli_rollback($conn);
		die('No se ha podido insertar');
	}
	
	/*VARIABLE GLOBAL*/
	global $numeroPedido;
	$numeroPedido = $cont[0];
}

/*funcion que crea en la tabla orderdetails el pedido*/
function crearDetallePedido($linea, $key, $value, $conn){
	//select para el trackid y el precio unitario 
	$selectProducto = "SELECT TrackId, UnitPrice FROM track WHERE Name = '$key';";
	$detalles = mysqli_query($conn, $selectProducto);
	$details = mysqli_fetch_array($detalles, MYSQLI_NUM);

	/*LLAMAMOS A LA VARIABLE GLOBAL numeroPedido*/
	$sentenciaDetalle = mysqli_prepare($conn, "INSERT INTO invoiceline (InvoiceLineId, InvoiceId, TrackId, UnitPrice, Quantity) VALUES (?,?,?,?,?);");
	mysqli_stmt_bind_param($sentenciaDetalle, 'iiidi', $linea, $GLOBALS['numeroPedido'], $details[0], $details[1], $value);
	mysqli_stmt_execute($sentenciaDetalle);
	
	if(mysqli_stmt_execute($sentenciaDetalle)){
		mysqli_rollback($conn);
		die('No se ha podido insertar');
	}
	
}

/*funcion que consulta la ultima linea del pedido*/
function lineaPedido($conn){
	$selectLineaPedido = "SELECT MAX(invoiceLineId) FROM invoiceline;";
	$linea = mysqli_query($conn, $selectLineaPedido);
	$ultimaLinea = mysqli_fetch_array($linea, MYSQLI_NUM);
	$dato = $ultimaLinea[0];
	
	return $dato;
}

/*funcion que saca el precio unitario de cada cancion*/
function consultarPrecio($conn, $nombre){
	$selectPrecio = "SELECT UnitPrice FROM Track WHERE Name = '$nombre';";
	$sacoPrecio = mysqli_query($conn, $selectPrecio);
	$precio = mysqli_fetch_array($sacoPrecio, MYSQLI_NUM);
	$precioUnitario = $precio[0];
	
	return $precioUnitario;
}


?>