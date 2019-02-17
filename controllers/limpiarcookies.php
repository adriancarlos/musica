<?php

	setcookie('carrito', '', time() + (86400 * 30), "/");

	header ("location: ../views/hacerpedidomain.php");

?>