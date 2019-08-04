<?php 
	include '../index.php';
	include '../login/login_check.php';
	include '../cart/cart.php';
	session_start();
	$cart = unserialize($_COOKIE['user'])['cart'];
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Home</title>
 </head>
 <body>
 	<?php for ($i=0; $i < sizeof($cart); $i++) :?>
 		<?php 
		$product_id = $cart[$i];
 		$query = "SELECT product_name, product_price, product_image_url FROM products WHERE product_id = '$product_id';";
		$connector = new sqlConnect();
		$result = $connector->execute($query);
		$product_name = $result[0]['product_name'];
		$product_price = $result[0]['product_price'];
		$product_image = '../'.$result[0]['product_image_url'];
 		 ?>
 		 <section class="item-section">
 		 	<figure><img class="item-img" src=<?php echo $product_image; ?> alt="item"></figure>
 		 	<div class="item-body">
				<h3 class="item-name"><?php echo $product_name; ?></h3>
				<div class="item-price"><?php echo $product_price; ?> HKD</div>
			</div>
		</section>
	<?php endfor; ?>
	<br>
	<button class="pay-btn">Payment</button>
 	<br>
 	<button class="clear-btn">Clear Cart</button>
 	<br>
 	<button class="drop-btn">Drop Cookie</button>
 	<br>
 	<a href="../main/main.php">Return</a>
 </body>
 <script src="../jquery-3.3.1.js"></script>
 <script>
 	$(document).ready(function(){
 			$('.pay-btn').click(function(){
 				$.get("../product/payment.php", document.cookie);
 			})
			$('.clear-btn').click(function(){
				clear = {'boolean':"1"};
				$.get("../cart/cart_clear.php",clear );
				alert("clear cart");
			})
			$('.drop-btn').click(function(){
				clear = {'boolean':"2"};
				$.get("../cart/cart_clear.php",clear );
				alert("drop cookie");
			})
		})
 </script>
 </html>