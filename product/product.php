<?php 
	include '../index.php';

	$product_id = intval($_GET['product_id']);

	$query = "SELECT * FROM products WHERE product_id = $product_id";
	$connector = new sqlConnect();
	$result = $connector->execute($query);
	$product_name = $result[0]['product_name'];
	$product_price = $result[0]['product_price'];
	$product_image = '../'.$result[0]['product_image_url'];
	$product_catg = $result[0]['product_category'];

	$cquery = "SELECT categories_name FROM categories WHERE categories_id = $product_catg";
	$connector = new sqlConnect();
	$cresult = $connector->execute($cquery);
	$cresult = $cresult['0']['categories_name'];

	$comment_query = "SELECT comment_content FROM comments WHERE comment_post_id = $product_id";
	$connector = new sqlConnect();
	$comment_result = $connector->execute($comment_query);



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Detail —— <?php echo $product_name; ?></title>
	<link rel="stylesheet" href="../css/product_style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<script src="../jquery-3.3.1.js"></script>
	<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
</head>
<body>
	<!-- header part as main.html head-bar and nav-bar -->
	<section class="product-box">
		<h1 class="product-name"><?php echo $product_name ?></h1>
		<p class="product-wording">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium delectus optio culpa alias, nobis ex voluptate commodi perspiciatis atque! Quae!</p>
		<div class="product-main-content">
			<img class="product-img" src=<?php echo $product_image; ?> alt="image1">
			<table class="product-detail">
				<tbody>
					<tr>
						<th>Seller</th>
						<td>Admin</td>	
					</tr>
					<tr>
						<th>Category</th>
						<td><?php echo $cresult; ?></td>
					</tr>
					<tr>
						<th>Brand</th>
						<td>TaoBao</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="product-price">$ <?php echo$product_price ?></div>
		<a href="" class="buy-btn">Buy here</a>
		<a href="" class="cart-btn" data-value=<?php echo$product_id ?>>Add to cart</a>
		<div class="product-description">
			<p class="product-description-p">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis inventore, aperiam odit consequuntur? Fugit doloremque, officiis harum. Voluptatum officia, impedit aliquam mollitia iusto cupiditate! Voluptate sequi neque fugiat dolores tenetur!
			</p>
		</div>
		<div class="product-btn-container">
			<div class="left-btn">
				<button class="bottom-btn">Like</button>
				<button class="bottom-btn">Dislike</button>
			</div>
		</div>
	</section>
	<div class="prev-next-product">
		<?php if ($product_id != 1):?>
		<div class="prev-product">
			<a class="prev-product-a" href="product.php?product_id=<?php echo $product_id - 1; ?>">
				<i class="fas fa-chevron-left">
					previous
				</i>
			</a>
		</div>
		<?php endif; ?>
		<div class="return">
			<a href="../main/main.php" class="return-a">Return</a>
		</div>
		<?php if($product_id < $num_query or $product_id == $num_query):?>
		<div class="next-product">
			<a class="next-product-a" href="product.php?product_id=<?php echo $product_id + 1; ?>">
				next
				<i class="fas fa-chevron-right"></i>
			</a>
		</div>
		<?php endif; ?>
	</div>
	<section class="product-comment">
		<h3 class="comment-title">Leave a comment</h3>
		<form action="./post_comment.php" method="post" id="comment_form">
			<div class="comment-form-field">
				<input type="hidden" name="prod_id" value="<?php echo $product_id ?>">
				<textarea name="comment" id="comment" placeholder=" Enter your comment..." cols="30" rows="10" class="comment-textbox"></textarea>
				<button class="post-btn" type="submit" value="submit" form="comment_form">
					Post Comment
				</button>
			</div>
		</form>
		<div class="comment-section">
			<?php if(sizeof($comment_result)!= 0): ?>
				<?php for ($i=0; $i < sizeof($comment_result); $i++):?> 
					<?php $comment_content = $comment_result[$i]['comment_content']; ?>
					<p class="commentsfont-size"><?php echo "Comments"; ?></p>
					<p><?php echo "$comment_content"; ?></p>
				<?php endfor ?>
			<?php endif ?>
		</div>
	</section>
	<script>
		$(document).ready(function(){
			$('.cart-btn').click(function(){
				var product_id = $(this).data("value");
				data = {'product_id':product_id};
				$.get("../cart/cart.php", data);
			})
		})
	</script>
</body>
</html>