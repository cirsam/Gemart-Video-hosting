<?php
	require_once('dbconn_mysql.php');
?><!-- page not protected by a login -->
<!doctype html>
<html lang="en">
	<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Samuel Antwi">
	<link rel="icon" href="./favicon.ico">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<title>Gemartt Productions</title>
	</head>
	<body>
	<?php require_once('../menu.php'); ?>
	<div class="container">
		<?php
			if(isset($_GET['msg'])){
				echo '  <div class="alert alert-danger"><strong>Message!</strong> '.$_GET['msg'].'</div>';
			}
		
		?>
		<form class="form-signin" action="login_check.php" method="post" >
		  <div class="text-center mb-4">
			<h1 class="h3 mb-3 font-weight-normal">Login</h1>
			<p>Login to watch a movie or <a href="register.php">signup</a> for an account if you do not have one</p>
		  </div>

		  <div class="form-label-group">
			 <label for="inputEmail">Email address</label>
		   <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus name="e" >
		  </div>

		  <div class="form-label-group">
			 <label for="inputPassword">Password</label>
			<input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="p" >
		  </div>

		  <div class="checkbox mb-3">
			<label>
			  <input type="checkbox" value="remember-me"> Remember me
			</label>
		  </div>
		  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		</form>
		<?php require_once("../footer.php"); ?>
	 </div>
	 </body>
</html>
