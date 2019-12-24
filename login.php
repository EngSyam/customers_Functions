<?php
session_start();
require 'includes/config.php';
require 'includes/users_functions.php';

if(checkLogin())
	header("LOCATION: index.php");


if(count($_POST)>0)
{
	$username = $_POST['username'];
	$password = $_POST['password'];

	if(login($username,$password))
		header("LOCATION: index.php");
	else
		echo 'invalid login data';
}


?>

<form action="login.php" method="post">
username <input type="text" name="username" /> <br />
password <input type="password" name="password" /> <br />
<button type="submit">login</button>
</form>