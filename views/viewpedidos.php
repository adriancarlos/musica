<?php
	
	if(!empty($noPedido)){
		echo "<center>Ha realizado un total de  $noPedido pedidos:</center><br>";
	}
	/*Si el numero de cliente existe continuamos con la ejecucion*/
	echo "<center><table border='5px' style='font-family: Comic Sans MS; text-align: center; box-shadow: 5px 5px 5px cyan;'>";
	echo "<tr><td style='border: 2px solid red'><b>Numero Pedido</b></td>";
	echo "<td style='border: 2px solid green'><b>Linea Pedido</b></td>";
	echo "<td style='border: 2px solid blue'><b>Fecha Pedido</b></td>";
	echo "<td style='border: 2px solid blue'><b>Nombre Canci&oacute;n</b></td>";
	echo "<td style='border: 2px solid blue'><b>Cantidad Producto</b></td>";
	echo "<td style='border: 2px solid blue'><b>Precio Unitario</b></td>";
	echo "<td style='border: 2px solid blue'><b>Total</b></td></tr>";
	
	if(empty($inicio) && empty($fin)){
		$result = mostrarPedidos($conn,$numCliente);
	} else {
		$result = mostrarPedidosFecha($conn,$numCliente, $inicio, $fin);
	}
	
	while($mostrar = mysqli_fetch_array($result)){
		echo "<tr><td style='border: 2px solid red'>".$mostrar['numeroUsu']."</td>";
		echo "<td style='border: 2px solid green'>".$mostrar['InvoiceLineId']."</td>";
		echo "<td style='border: 2px solid blue'>".$mostrar['InvoiceDate']."</td>";
		echo "<td style='border: 2px solid blue'>".$mostrar['Name']."</td>";
		echo "<td style='border: 2px solid blue'>".$mostrar['Quantity']."</td>";
		echo "<td style='border: 2px solid blue'>".$mostrar['UnitPrice']."</td>";
		echo "<td style='border: 2px solid blue'>".$mostrar['Total']."</td></tr>";
	}
	echo "</table></center>";
?>

