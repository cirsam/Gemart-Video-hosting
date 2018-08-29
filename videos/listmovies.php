<?php
require_once('../login/dbconn_mysql.php');

// check to see if email already in use
$movies = $mysqli->query("SELECT * FROM movies");
	
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <title>Gemartt Productions</title>
</head>
<body>
  	<?php require_once('../menu.php'); ?>
	<div class="container">

	<table class="table table-dark" >
		<tr>
			<th>Image</th>
			<th>Title</th>
			<th>Status</th>
			<th>Featured</th>
			<th></th>
			<th></th>
		</tr>
		<?php
		foreach($movies->fetch_all() as $key=>$value){	
		echo '<tr>
			<td><img src="images/'.$value[2].'" style="width:50px;height:40px;" /></td>
			<td>'.$value[1].'</td>
			<td>'.$value[10].'</td>
			<td>'.$value[6].'</td>
			<td><a href="edit.php?id='.$value[0].'"><button type="button" class="btn btn-outline-primary">Edit</button></a></td>
			<td><a href="delete.php?id='.$value[0].'"><button type="button" class="btn btn-outline-danger">Delete</button></a></td>
		</tr>';
		}
		?>
	</table>		
	<?php require_once("../footer.php"); ?>
	 </div>
 </body>
</html>
