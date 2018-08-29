<?php

// make a new goddamn user

if (!isset($_POST['e']) || trim($_POST['e']) == '') {
	header('Location:/login/register.php?msg=you forgot to put in an email address.');
	die();
}

if (!filter_var(trim($_POST['e']), FILTER_VALIDATE_EMAIL)) {
	header('Location:/login/register.php?msg=the email address you put in is invalid.');
	die();
}

if (!isset($_POST['p1']) || trim($_POST['p1']) == '') {
	header('Location:/login/register.php?msg=you forgot to put in your password.');
	die();
}

if (!isset($_POST['p2']) || trim($_POST['p2']) == '') {
	header('Location:/login/register.php?msg=you forgot to put in your password again.');
	die();
}

if (trim($_POST['p1']) != trim($_POST['p2'])) {
	header('Location:/login/register.php?msg=your passwords do not match.');
	die();
}

if (strlen($_POST['p1'])<5) {
	header('Location:/login/register.php?msg=your passwords is too short.');
	die();
}

// generate a random key from /dev/random
function get_key($bit_length = 128) {
	$fp = @fopen('/dev/urandom','rb'); // should be /dev/random but it's too slow
	if ($fp !== FALSE) {
		$key = substr(base64_encode(@fread($fp,($bit_length + 7) / 8)), 0, (($bit_length + 5) / 6)  - 2);
		@fclose($fp);
		$key = str_replace(array('+', '/'), array('0', 'X'), $key);
		return $key;
	}
	return null;
}

require_once('dbconn_mysql.php');

// ok, make a new user

$new_user_email_db = "'".$mysqli->escape_string(trim($_POST['e']))."'";

// check to see if email already in use
$check_for_email = $mysqli->query("SELECT user_id FROM users WHERE email=$new_user_email_db");
if ($check_for_email->num_rows > 0) {
	header('Location:/login/register.php?msg=sorry, but that email address appears to already be in use.');
	die();
}

$hash = hash('sha512', $_POST['p1']);
$new_user_pwd_hash_db = "'".$mysqli->escape_string($hash)."'";

$new_user_row = $mysqli->query("INSERT INTO users (email, pwrdlol, tsc) VALUES ($new_user_email_db, $new_user_pwd_hash_db, UNIX_TIMESTAMP())");
if (!$new_user_row) {
	die('error creating new user: '.$mysqli->error);
}

//$new_user_id = $mysqli->insert_id;

header('Location: login.php?register_success');

?>