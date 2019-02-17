<?php

session_start(); //poner session_start en el controlador y en el archivo session

	require('models/modelologin.php');

	

if($_SERVER["REQUEST_METHOD"] == "POST") {
     
      
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
	  if(isset($_SESION['login_user'])){
		header ("location: views/welcome.php");
	  }
	  
      $row = cliente($myusername, $mypassword, $conn);
      
      $result = resultado($myusername, $mypassword, $conn);
      $count = mysqli_num_rows($result);

   	
      if($count == 1) {
         
         $_SESSION['login_user'] = $myusername;
		header ("location: views/welcome.php");
		 

      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }


?>