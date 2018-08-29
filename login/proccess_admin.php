<?php
require_once('dbconn_mysql.php');

$users = $mysqli->query("SELECT * FROM users WHERE user_id=$_GET[id]");

if ($users->num_rows > 0) {
	$results = $users->fetch_assoc();
	if($_GET['revoke']=="yes"){
		$mysqli->query("Update users set isadmin='' WHERE user_id=$_GET[id]");		
	}else{
		$mysqli->query("Update users set isadmin='1' WHERE user_id=$_GET[id]");		
	}
}
header('Location: admin.php');

?>