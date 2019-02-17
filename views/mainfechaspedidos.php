<HTML>
<HEAD> <TITLE>Adrian&Carlos calculadora</TITLE>
</HEAD>
<BODY>
<form name='mi_formulario' action='../controllers/facturas.php' method='post'>

 <h1> Consultar pedidos</h1><br>
 
 Fecha de inicio: <select name="inicio">
	<?php
	require('../controllers/session.php');
	require('../models/funciones.php');
	mostrarFechas($conn);
	?>
 </select><br>

 Fecha de fin: <select name="fin">
	<?php
	mostrarFechas($conn);
	?>
 </select><br>
 

<!--<input type='text' name='categoria' value=''><br>-->

<input type="submit" value="Consultar Facturas por Fechas">

</FORM>
</BODY>
</HTML>
