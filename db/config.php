<?php
   define('DB_SERVER', '10.128.15.103');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'rootroot');
   define('DB_DATABASE', 'appmusic');
   $conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   
   if (!$conn) {
		die("Error conexión: " . mysqli_connect_error());
				}
  
?>
