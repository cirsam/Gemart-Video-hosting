<?php

 if (isset($_POST['e']) && isset($_POST['p'])) { // user is trying to log in?
	if (strlen($_POST['p'])<5) {
		header('Location:/login/login.php?msg=your passwords is too short.');
		die();
	}	
	
	require_once('dbconn_mysql.php');
	
	// login flood control
	$has_flood_control_limit = false;
	$attempt_ip_db = "'".$mysqli->escape_string(trim($_SERVER['REMOTE_ADDR']))."'";
	$check_flood_control = $mysqli->query("SELECT * FROM login_flood_control WHERE ipaddr=$attempt_ip_db");
	if ($check_flood_control->num_rows > 0) {
		$has_flood_control_limit = true;
		$flood_control_info = $check_flood_control->fetch_assoc();
		if ($flood_control_info['tsc'] < (time() - 1800)) {
			// it was over half an hour ago -- remove it
			$delete_flood_control = $mysqli->query('DELETE FROM login_flood_control WHERE id='.$flood_control_info['id']);
			$has_flood_control_limit = false;
		} else {
			$update_flood_control = $mysqli->query('UPDATE login_flood_control SET attempts=attempts+1 WHERE id='.$flood_control_info['id']);
			if ($flood_control_info['attempts'] > 20) {
				header('Location:/login/login.php?msg=Sorry, you have tried to log in unsuccessfully way too many times. Please try again in a half hour or so.');
				die();
			}
		}
	}
	
	$users_email_db = "'".$mysqli->escape_string(trim($_POST['e']))."'";
	
	$check_for_user = $mysqli->query("SELECT * FROM users WHERE email=$users_email_db");
	if ($check_for_user->num_rows == 1) {
		
		$current_user_row = $check_for_user->fetch_assoc();
		
		// check password
		if (hash('sha512', trim($_POST['p']))!= $current_user_row['pwrdlol']) {
			if (!$has_flood_control_limit) {
				$insert_flood_control = $mysqli->query("INSERT INTO login_flood_control (ipaddr, attempts, tsc) VALUES ($attempt_ip_db, 1, UNIX_TIMESTAMP())");
			}
			header('Location:/login/login.php?msg=Your password was incorrect, please try again.');
			die();
		} else {
			// password checked out, clear flood control, if there was any
			if ($has_flood_control_limit) {
				$delete_flood_control = $mysqli->query('DELETE FROM login_flood_control WHERE id='.$flood_control_info['id']);
			}
		}
		session_start();
		// ok, cool
		$_SESSION['user_id'] = $current_user_row['user_id'];
		$_SESSION['user_email'] = $current_user_row['email'];
		$_SESSION['isadmin'] = $current_user_row['isadmin'];
		$_SESSION['paid_status'] = $current_user_row['paid_status'];
		

		// logged in, cool
		header('Location: index.php');
		die();
	} else {
		if (!$has_flood_control_limit) {
			$insert_flood_control = $mysqli->query("INSERT INTO login_flood_control (ipaddr, attempts, tsc) VALUES ($attempt_ip_db, 1, UNIX_TIMESTAMP())");
		}
		header('Location:/login/login.php?msg=Could not find that email address, sorry. Try again.');
		die();
	}
				
} else if (isset($login_required) && $login_required == true) {
	
	header('Location: login.php');
	die();
	
}

?>