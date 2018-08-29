<?php
require_once('../login/dbconn_mysql.php');

	$delete_flood_control = $mysqli->query('DELETE FROM genre WHERE gen_id='.$_GET['id']);

header("location:/genre/listgenre.php");


?>