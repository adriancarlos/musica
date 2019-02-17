<?php
// require('../db/config.php');
function cliente($myusername, $mypassword, $conn){
	$sql = "SELECT CustomerId FROM Customer WHERE Email = '$myusername' and LastName = '$mypassword'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	
	return $row;
}

function resultado($myusername, $mypassword, $conn){
	$sql = "SELECT CustomerId FROM Customer WHERE Email = '$myusername' and LastName = '$mypassword'";
    $result = mysqli_query($conn,$sql);
	
	return $result;
}




?>
