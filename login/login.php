<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Page</title>
	<link rel="stylesheet" href="../css/login.css">
</head>
<body>
	<section class="login-form">
		<div class="login-div">
			<h3 class="login-form-title">Login Here</h3>
			<div class="input-form">
				<form action="login_check.php" method="post">
					<p class="input-form-label">Username:<input type="text" name="username" class="input-box"></p>
					<p class="input-form-label">Password: <input type="password" name="password" class="input-box"></p>
					<p class="input-form-label">Repeat Password: <input type="password" name="pwd-repeat" class="input-box"></p>
					<button type="submit" class="input-btn" name="submit">Login</button>
				</form>
			</div>
		</div>
	</section>
</body>
</html>