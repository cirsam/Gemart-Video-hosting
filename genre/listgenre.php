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
			<th>Title</th>
			<th>Status</th>
			<th></th>
			<th></th>
		</tr>
		<?php
			$getgenre = $mysqli->query("SELECT * FROM genre");

		foreach($getgenre->fetch_all() as $key=>$value){	
		echo '<tr>
			<td>'.$value[1].'</td>
			<td>'.$value[2].'</td>
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
