<?php
require_once('../login/dbconn_mysql.php');


	$title = "'".$mysqli->escape_string(trim($_POST['title']))."'";
	$status = "'".$mysqli->escape_string(trim($_POST['status']))."'";
	
	$new_user_row = $mysqli->query("INSERT INTO genre (title, status, tsc) VALUES ($title, $status, UNIX_TIMESTAMP())");

header("location:/genre/listgenre.php");

?>



