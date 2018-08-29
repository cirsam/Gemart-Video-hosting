<?php
require_once('dbconn_mysql.php');

$users = $mysqli->query("SELECT * FROM users WHERE user_id=$_GET[id]");

if ($users->num_rows > 0) {
	
// $d1 = new DateTime('2018-03-29 11:00:00', new DateTimeZone('Europe/Rome'));//1522314000
// echo $t1 = $d1->getTimestamp();	
	$results = $users->fetch_assoc();
	$dates = date('Y-m-d',''.$results['time_paid'].'');
	$datetime1 = date_create($dates);
	$datetime2 = date_create('now');
	$interval = date_diff($datetime1, $datetime2);
	$timeDiff = $interval->format('%a');	
	
	if ($results['time_paid']!=0 && $timeDiff > 30) {
		$mysqli->query("Update users set time_paid=0,paid_status='' WHERE user_id=$_GET[id]");		
	}elseif($results['time_paid']==0 || $results['time_paid']==null) {
		$mysqli->query("Update users set time_paid=UNIX_TIMESTAMP(),paid_status='paid' WHERE user_id=$_GET[id]");		
	}
}
header('Location: admin.php');

?>