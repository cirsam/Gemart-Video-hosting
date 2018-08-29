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
	
	$new_user_row = $mysqli->query("Update movies set genre=$genre, newicon=$newicon, comingsoon=$comingsoon, description=$description, title=$title, coverimage=$coverimage, trailerurl=$trailerurl, movieurl=$videourl, featured=$featured, status=$status, tsc=UNIX_TIMESTAMP() WHERE mov_id=$_POST[id] ");
}else{
	$title = "'".$mysqli->escape_string(trim($_POST['title']))."'";
	$trailerurl = "'".$mysqli->escape_string(trim($_POST['trailerurl']))."'";
	$videourl = "'".$mysqli->escape_string(trim($_POST['videourl']))."'";
	$featured = "'".$mysqli->escape_string(trim($_POST['featured']))."'";
	$status = "'".$mysqli->escape_string(trim($_POST['status']))."'";
	$genre = "'".$mysqli->escape_string(trim($_POST['genre']))."'";
	$newicon = "'".$mysqli->escape_string(trim($_POST['newicon']))."'";
	$comingsoon = "'".$mysqli->escape_string(trim($_POST['comingsoon']))."'";
	$description = "'".$mysqli->escape_string(trim($_POST['description']))."'";
	
	$new_user_row = $mysqli->query("Update movies set genre=$genre, newicon=$newicon, comingsoon=$comingsoon, description=$description, title=$title, trailerurl=$trailerurl, movieurl=$videourl, featured=$featured, status=$status, tsc=UNIX_TIMESTAMP() WHERE mov_id=$_POST[id] ");	
}

header("location:/videos/listmovies.php");

?>



