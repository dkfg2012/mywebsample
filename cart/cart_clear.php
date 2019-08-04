<?php 
	$boolean = intval($_GET['boolean']);
	if($boolean == 1){
		$username = unserialize($_COOKIE['user'])['username'];
		$data = array('user_login'=>true, 'username'=>$username, 'cart' => array());
		setcookie('user' ,serialize($data) ,time()+1000,'/');
	}else if ($boolean == 2) {
		setcookie('user' ,'' ,time()-1000,'/');
	}
	header("refresh: 3;URL= ../eshop/user_home.php");
 ?>