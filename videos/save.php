<?php
require_once('../login/dbconn_mysql.php');

if($_FILES['coverimage']['tmp_name']!=null){
	move_uploaded_file($_FILES['coverimage']['tmp_name'],'images/'. basename( $_FILES['coverimage']['name']));
	
	$coverimage = "'".$mysqli->escape_string(trim($_FILES['coverimage']['name']))."'";
	$title = "'".$mysqli->escape_string(trim($_POST['title']))."'";
	$trailerurl = "'".$mysqli->escape_string(trim($_POST['trailerurl']))."'";
	$videourl = "'".$mysqli->escape_string(trim($_POST['videourl']))."'";
	$featured = "'".$mysqli->escape_string(trim($_POST['featured']))."'";
	$status = "'".$mysqli->escape_string(trim($_POST['status']))."'";
	$genre = "'".$mysqli->escape_string(trim($_POST['genre']))."'";
	$newicon = "'".$mysqli->escape_string(trim($_POST['newicon']))."'";
	$comingsoon = "'".$mysqli->escape_string(trim($_POST['comingsoon']))."'";
	$description = "'".$mysqli->escape_string(trim($_POST['description']))."'";
	
	$new_user_row = $mysqli->query("INSERT INTO movies (title, coverimage, trailerurl, movieurl,genre, featured, newicon, comingsoon, description, status, tsc) VALUES ($title, $coverimage, $trailerurl, $videourl,$genre, $featured, $newicon,$comingsoon, $description, $status, UNIX_TIMESTAMP())");
	if (!$new_user_row) {
		die('error creating new user: '.$mysqli->error);
	}
}

header("location:/videos/listmovies.php");

?>



