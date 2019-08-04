<?php 
	$username = unserialize($_COOKIE['user'])['username'];
	if(isset($_GET['product_id'])){
		if($_SESSION['user_login'] = true){
			$user_data = unserialize($_COOKIE['user']);
			$user_cart = $user_data['cart'];
			array_push($user_cart, $_GET['product_id']);
			$data = array('user_login'=>true, 'username'=>$username, 'cart' => $user_cart);
			print_r($data);
			setcookie('user',serialize($data),time()+1000,'/');	
		}
	}
 ?>