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
			<label for="file">Cover Image</label>
			<input type="file" class="form-control" required name="coverimage" >
		  </div>		  

		  <div class="form-label-group">
			<label for="title">Title</label>
			<input type="text" id="title" class="form-control" placeholder="Video Title" required autofocus name="title" >
		  </div>

		  <div class="form-label-group">
			<label for="trailer_url">Trailer URL</label>
			<input type="text" id="trailer_url" class="form-control" placeholder="Trailer URL" required name="trailerurl" >
		  </div>

		  <div class="form-label-group">
			<label for="video_ur">Video URL</label>
			<input type="text" id="video_url" class="form-control" placeholder="Video URL" required name="videourl" >
		  </div>

		  <div class="form-label-group">
			<label for="video_ur">Genre</label>
			<select name="genre" class="form-control" >
			<option value="" >Select a genre</option>
			<?php
			$getgenre = $mysqli->query("SELECT * FROM genre");

			foreach($getgenre->fetch_all() as $key=>$value){	
			echo '<option value="'.$value[0].'" >'.$value[1].'</option>';
			}
			?>
			</select>
		  </div>

		  <div class="form-label-group">
			<label for="video_ur">Feature on home page?</label>
			<select name="featured" class="form-control" >
				<option value="" >Select</option>
				<option value="Yes" >Yes</option>
				<option value="No" >No</option>				
			</select>
		  </div>
		  
		  <div class="form-label-group">
			<label for="video_ur">Show New Icon?</label>
			<select name="newicon" class="form-control" >
				<option value="" >Select</option>
				<option value="Yes" >Yes</option>
				<option value="No" >No</option>
			</select>
		  </div>

		  <div class="form-label-group">
			<label for="video_ur">Show Coming Soon Icon?</label>
			<select name="comingsoon" class="form-control" >
				<option value="" >Select</option>
				<option value="Yes" >Yes</option>
				<option value="No" >No</option>
			</select>
		  </div>		  

		  <div class="form-label-group">
			<label for="video_ur">Status</label>
			<select name="status" class="form-control" >
				<option value="" >Select</option>
				<option value="Active" >Active</option>
				<option value="Not Active" >Not Active</option>
			</select>
		  </div>

		  <div class="form-label-group">
			<label for="video_ur">Status</label>		  
			<textarea name="description" style="width:100%;height:200px;"  class="form-control" ></textarea>
		  </div>		  
			<br />
		  <button class="btn btn-lg btn-primary btn-block" type="submit">Save</button>
		</form>
	<?php require_once("../footer.php"); ?>
	 </div>
 </body>
</html>
