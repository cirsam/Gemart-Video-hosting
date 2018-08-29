<?php
require_once('../login/dbconn_mysql.php');

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
		<br /><br />
		<form class="form-signin" action="save.php" method="post"  enctype="multipart/form-data" >
		  		  
		  <div class="form-label-group">
			<label for="title">Title</label>
			<input type="text" id="title" class="form-control" placeholder="Genre Title" required autofocus name="title" >
		  </div>

		  <div class="form-label-group">
			<label for="video_ur">Status</label>
			<select name="status" class="form-control" >
				<option value="Active" >Active</option>
				<option value="Not Active" >Not Active</option>
			</select>
		  </div>
			<br />
		  <button class="btn btn-lg btn-primary btn-block" type="submit">Save</button>
		</form>
	<?php require_once("../footer.php"); ?>
	 </div>
 </body>
</html>
