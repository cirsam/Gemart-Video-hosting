<?php
require_once('dbconn_mysql.php');

// check to see if email already in use
$users = $mysqli->query("SELECT * FROM users");
$users_admin = $mysqli->query("SELECT * FROM users WHERE isadmin=1");
	
?>
<!-- page not protected by a login -->
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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Gemartt Productions</title>
</head>
<body>
  	<?php require_once('../menu.php'); ?>
	<div class="container">
	<h1>Administrators</h1>
	<table class="table table-dark" >
		<tr>
			<th>Name</th>
			<th></th>
		</tr>
		<?php
		foreach($users_admin->fetch_all() as $key=>$value){	
		echo '<tr>
			<td>'.$value[1].'</td>
			<td><a href="proccess_admin.php?id='.$value[0].'&revoke=yes"><button type="button" class="btn btn-outline-primary">Revoke</button></a></td>
		</tr>';
		}
		?>
	</table>
	<h1>All Users</h1>
	<table class="table table-dark" >
		<tr>
			<th>Name</th>
			<th>Paid Status</th>
			<th></th>
			<th></th>
		</tr>
		<?php
		foreach($users->fetch_all() as $key=>$value){	
		echo '<tr>
			<td>'.$value[1].'</td>
			<td>'.$value[4].'</td>
			<td><a href="proccess_time.php?id='.$value[0].'"><button type="button" class="btn btn-outline-primary">Mark As Paid</button></a></td>
			<td><a href="proccess_admin.php?id='.$value[0].'"><button type="button" class="btn btn-outline-primary">Make Admin</button></a></td>
		</tr>';
		}
		?>
	</table>		
	<?php require_once("../footer.php"); ?>
	 </div>
 </body>
</html>
