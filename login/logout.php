<?php 
	session_start();
	session_destroy();
	// setcookie('user' ,"" ,time()-1000);
	echo "Logout success, return to main page";
	header("refresh: 1;URL= ../main/main.php");
 ?>