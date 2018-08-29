<?php
require_once('../login/dbconn_mysql.php');


	$title = "'".$mysqli->escape_string(trim($_POST['title']))."'";
	$status = "'".$mysqli->escape_string(trim($_POST['status']))."'";
	
	$new_user_row = $mysqli->query("Update genre set title=$title, status=$status, tsc=UNIX_TIMESTAMP() WHERE gen_id=$_POST[id] ");	


header("location:/genre/listgenre.php");

?>



