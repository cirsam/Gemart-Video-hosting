<?php
require_once('../login/dbconn_mysql.php');

	$delete_flood_control = $mysqli->query('DELETE FROM movies WHERE mov_id='.$_GET['id']);

header("location:/videos/listmovies.php");


?>