<?php
	if (!empty($_COOKIE['carrito'])){
		foreach(unserialize($_COOKIE['carrito']) as $key => $value){
			echo ("<b>producto:</b> $key <b>cantidad:</b> $value <br>");	
		}
	}
?>
<HTML>
<HEAD> <TITLE>Adrian&Carlos calculadora</TITLE>
</HEAD>
<BODY>
<form name='mi_formulario' action='../controllers/downmusic.php' method='post'>

 <h1> Realizar Pedido</h1><br>
 
Seleccione la Canci&oacute;n: <select name="producto">
	<?php
	require('../controllers/session.php');
	require('../models/funciones.php');
	mostrarCanciones($conn);
	?>
</select> Cantidad: <input type="number" name="cantidad"> <input type="submit" value="A&Ntilde;ADIR AL CARRITO"><br>

<?php
	// require_once('../models/funciones.php');
	// echo '<input type="submit" name="comoquieras" value="limpiarCookie()">';
	
?>

<a href="../controllers/limpiarcookies.php">Limpiar Carrito</a><br>
<a href="../controllers/hacerpedido.php">Realizar Pedido</a><br><br>

<a href="welcome.php">VOLVER</a>


</FORM>
</BODY>
</HTML>