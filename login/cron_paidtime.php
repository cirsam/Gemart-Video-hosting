<?php
require_once('dbconn_mysql.php');

$users = $mysqli->query("SELECT * FROM users");

foreach($users->fetch_all() as $key=>$results){	
	$dates = date('Y-m-d',''.$results[3].'');
	$datetime1 = date_create($dates);
	$datetime2 = date_create('now');
	$interval = date_diff($datetime1, $datetime2);
	$timeDiff = $interval->format('%a');

	if ($results[3]!=0 && $timeDiff > 30) {
		$mysqli->query("Update users set time_paid=0,paid_status='' WHERE user_id=$results[0]");		
	}	
}


?>