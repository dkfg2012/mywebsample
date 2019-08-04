<?php 
	include "../index.php";
	$product_id = $_POST['prod_id'];
	$comment = $_POST['comment'];
	$query = "INSERT INTO comments (comment_content, comment_post_id) VALUES ('$comment', '$product_id')";
	$get_query = $conn->prepare($query);
	$get_query->execute();	
	$url = "product.php?product_id=".$product_id;
	header('Location:'.$url);

 ?>