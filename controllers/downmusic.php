<?php
   include('session.php');
	

   /*entra por aqui si la array de cookie en nuestro caso 'carrito' esta creada*/
   if(isset($_COOKIE['carrito'])){
   
		/*guardo la cookie en una variable*/
		$array = unserialize($_COOKIE['carrito']);

		$producto = $_POST['producto'];
		$cantidad = (int) $_POST['cantidad'];
		
		/*actualiza la cantidad nueva pedida si dicho producto ya estaba en el array*/
		foreach(unserialize($_COOKIE['carrito']) as $key => $value){
			/*comprueba si dicho producto esta en la array*/
			if ($key == $producto){
				//si está lo aumenta con la nueva cantidad
				$cantidad += $value;
			}
		}
		
		//actualizo la nueva cantidad del producto en la array
		$array[$producto] = (int) $cantidad;
		
		//vuelvo a guardar la cookie actualizada
		setcookie('carrito', serialize($array), time() + (86400 * 30), "/");
		
		// header('Location: ../views/hacerpedidomain.php');
		
	} else {
		/*por aqui entra si la array cookie no esta creada, crea la array asocitiva*/
		$producto = $_POST['producto'];
		$cantidad = (int) $_POST['cantidad'];
		
		//creo el array asociativo
		$array =[
			$producto => (int) $cantidad,
		];
		
		//lo guarda en el array y lo inserta en la cookie
		setcookie('carrito', serialize($array), time() + (86400 * 30), "/");
			
		header('Location: ../views/hacerpedidomain.php');
	}

?>
