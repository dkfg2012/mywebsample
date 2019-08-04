<?php 
	session_start();
	include '../index.php';
	include '../login/login_check.php';

	$session_title = array("Latest product", "Mens Clothing", "Babies Clothing", "Cosmetic");
	print_r(unserialize($_COOKIE['user']));
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../css/main_styles.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="../jquery-3.3.1.js"></script>
	<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
	<script src="main.js"></script>
</head>
<body>
	<div id="head-bar">
		<span class="logo">
			<img src="../mainPage_p/logo.svg" alt="logo">
		</span>
		
		<div class="search-bar">
			<input type="text" placeholder="Search..">
			<button type="submit">Submit</button>
			<?php if(isset($_SESSION['user_login'])== true){
				echo'<button type="submit"><a href="../login/logout.php">Logout</a></button>
				<button><a href="../user/user_home.php">User profile
				</a></button>';
			}else{
				echo '<button type="submit"><a href="../login/login.php">Login</a></button>';
			}
			?>

		</div>
	</div>
	<nav class="nav-bar">
		<ul class="nav-topic-block">Search by brand
			<li class="nav-block">Apple
				<ul>
					<li class="nav-block">Apple watch</li>
					<li class="nav-block">Iphone</li>
					<li class="nav-block">Ipad</li>
				</ul>
			</li>
			<li class="nav-block">Toyota</li>
			<li class="nav-block">Sony
				<ul>
					<li class="nav-block">Playstation</li>
					<li class="nav-block">Sony phone</li>
				</ul>
			</li>
			<li class="nav-block">Samsung</li>
		</ul>
		<ul class="nav-topic-block">Search by catorgories</ul>
	</nav>
	</div>
	<section id="image-slider">
		<div class="left-btn">
			<img class="left-slider-button"src="../mainPage_p/left-button.png" alt="leftbutton">
		</div>
		<div class="image-collector">
			<img src="../mainPage_p/ps4.jpg" alt="ps4" class="active first">
			<img src="../mainPage_p/xbox.jpg" alt="xbox">
			<img src="../mainPage_p/switch.jpg" alt="switch" class="last">
		</div>
		<div class="right-btn">
			<img class="right-slider-button" src="../mainPage_p/right-button.png" alt="rightbutton">
		</div>
	</section>
	<section class="product-part">
		<h2 class="session-title">Best seller</h2>
		<?php 
		for($i=0;$i<4;$i++):?>
			<div class="product-section-title">
				<a><?php echo $session_title[$i]; ?></a>
				<div class="product-subsection">
			 		<?php 
			 		$c_num = $i + 1;
			 		$query = "SELECT product_name, product_price, product_image_url, product_id FROM products WHERE product_category = $c_num ORDER BY RAND() LIMIT 4;";

					$connector = new sqlConnect();
					$result = $connector->execute($query);

					for($j=0;$j<4;$j++):?>
						<?php 
						$product_name = $result[$j]['product_name'];
						$product_price = $result[$j]['product_price'];
						$product_image = '../'.$result[$j]['product_image_url'];
						$product_id = $result[$j]['product_id'];
						 ?>
						<a href="../product/product.php?product_id=<?php echo $product_id; ?>" class="product-subsection-a">
							<section class="item-section">
								<figure><img class="item-img" src=<?php echo $product_image; ?> alt="item"></figure>
								<div class="item-body">
									<h3 class="item-name"><?php echo $product_name; ?></h3>
									<div class="item-price"><?php echo $product_price; ?> HKD</div>
								</div>
							</section>
						</a>
					<?php endfor;?> 
					<span class="view-all"><a href="../product/categories.php?categories_name=<?php echo $session_title[$i] ?>">view all</a></span>
				</div>
			</div>
		<?php endfor;?>
	</section>	
	<footer class="footer">
		<nav>
			<div class="footer-cell">
				<h2 class="footer-cell-header">More Info</h2>
				<ul>
					<li class="footer-cell-li">About our company</li>
					<li class="footer-cell-li">Career</li>
					<li class="footer-cell-li">News</li>
					<li class="footer-social-link footer-cell-li">
						<a href="https://zh-hk.facebook.com/">
							<i class="fa fa-facebook"></i>
						</a>
						<a href="https://twitter.com/?lang=zh-tw">
							<i class="fa fa-twitter"></i>
						</a>
					</li>
				</ul>
			</div>
			<div class="footer-cell">
				<h2 class="footer-cell-header">Help</h2>
				<ul>
					<li class="footer-cell-li">Cargo problems</li>
					<li class="footer-cell-li">Account problems</li>
					<li class="footer-cell-li">Customer services</li>
				</ul>
			</div>
			<div class="footer-cell-longer footer-cell">
				<h2 class="footer-cell-header">Documentary</h2>
				<div class="longer-cell">
					<ul>
						<li class="footer-cell-li longer-cell-li">Rule of buying stuff</li>
						<li class="footer-cell-li longer-cell-li">Rule of using your account</li>
						<li class="footer-cell-li longer-cell-li">Rule of scraping this web</li>
					</ul>
					<ul>
						<li class="footer-cell-li longer-cell-li">HK law</li>
						<li class="footer-cell-li longer-cell-li">Protect your rights</li>
					</ul>
				</div>
			</div>
		</nav>
	</footer>
	<div class="bottom-footer">
		
	</div>
</body>
</html>