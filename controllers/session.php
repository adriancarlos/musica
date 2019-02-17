<?php
   
	
   session_start();
   require('../db/config.php');
   
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,"select FirstName from Customer where Email = '$user_check' ;");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['FirstName'];//cambiar por el nombre del campo que tenga la tabla
   

   
   if(!isset($_SESSION['login_user'])){
      header("location: ../login.php");
      die();
   }
?>
