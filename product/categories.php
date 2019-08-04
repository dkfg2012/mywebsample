<?php 
	include '../index.php';
	$cat_name = $_GET['categories_name'];
	$query = "SELECT product_name, product_price, product_image_url, product_id FROM products WHERE product_category = (SELECT categories_id FROM categories WHERE categories_name = '$cat_name')";

	$sql = new sqlConnect();
	$result = $sql->execute($query);

	$p_query = "SELECT COUNT(*) AS total FROM products WHERE product_category = (SELECT categories_id FROM categories WHERE categories_name = '$cat_name')";
	$prod_num = $sql->execute($p_query);
	$prod_num = $prod_num[0]['total'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="../css/categories.css">
	<meta charset="UTF-8">
	<title>Category</title>
</head>
<body>
	<section class="nav-column">
		<h3 class="session-title">Category</h3>
		<nav>
			<ul class="category-nav">
				<li>Latest product</li>
				<li>Mens Clothing</li>
				<li>Babies Clothing</li>
				<li>Cosmetic</li>
			</ul>
		</nav>
	</section>
	<section class="product-part">
		<h2 class="session-title"><?php echo $cat_name; ?></h2>
		<div class="product-subsection">
			<?php for($i=0;$i<$prod_num;$i++): ?>
			<a href="product.php?product_id=<?php echo $result[$i]['product_id']; ?>" class="product-subsection-a">
				<section class="item-section">
					<figure><img class="item-img" src=<?php echo '../'.$result[$i]['product_image_url']; ?> alt="item"></figure>
						<div class="item-body">
							<h3 class="item-name"><?php echo $result[$i]['product_name']; ?></h3>
							<div class="item-price"><?php echo $result[$i]['product_price']; ?> HKD</div>
						</div>
				</section>
			</a>
			<?php endfor; ?>
		</div>
	</section>
</body>
</html>