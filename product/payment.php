<?php 
	include "../index.php";

	$cart = unserialize($_COOKIE['user'])['cart'];
	$username = unserialize($_COOKIE['user'])['username'];
	$total_price = 0;
	for($i=0; $i < sizeof($cart); $i++){
		$product_id = $cart[$i];
 		$query = "SELECT product_name, product_price, product_image_url FROM products WHERE product_id = '$product_id';";
		$connector = new sqlConnect();
		$result = $connector->execute($query);
		$product_price = $result[0]['product_price'];
		$total_price = $product_price + $total_price;
	}
	$query = "SELECT user_money FROM users WHERE user_name = '$username'";
	$connector = new sqlConnect();
	$money = $connector->execute($query);
	$money = $money[0]['user_money'];
	$money = $money - $total_price;
	$query = "UPDATE users SET user_money = '$money' WHERE user_name = '$username'";
	$update = $conn->prepare($query);
	$update->execute();

	$data = array('user_login'=>true, 'username'=>$username, 'cart' => array());
	setcookie('user' ,serialize($data) ,time()+1000,'/');

 ?>