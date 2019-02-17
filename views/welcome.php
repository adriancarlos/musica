<?php
   require('../controllers/session.php');
?>
<html>
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Bienvenido <?php echo $login_session; ?></h1> 
	  
	  
	  <nav class="dropdownmenu">
  <ul>
    <li><a href="../controllers/histfacturas.php">Consultar Historial de Facturas</a></li>
    
    <li><a href="../views/mainfechaspedidos.php">Consultar Pedidos por Fechas</a></li>
	
	<li><a href="../views/hacerpedidomain.php">Realizar Pedido</a></li>
  
  </ul>
</nav>
	  
	  
	  
      <h2><a href = "../logout.php">Cerrar Sesion</a></h2>
   </body>
   
</html>