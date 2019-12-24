<?php 

function login($username,$password)
{
	//1 - 
	$connection  = mysqli_connect(SERVER,DBUSER,DBPASS,DBNAME);
	if(!$connection)
		exit("ERROR : ".mysqli_error($connection));
	//2- query
	$query = mysqli_query($connection,"SELECT * FROM `users` WHERE `username`='$username' AND `password`='$password'");
	if(mysqli_num_rows($query)>0)
	{
		$_SESSION['username'] = $username;
		mysqli_close($connection);
		return true;
	}
	else
	{
		mysqli_close($connection);
		return false;
	}

}

function checkLogin()
{
	if(isset($_SESSION['username']))
		return true;

	return false;
}

function logout()
{
	session_destroy();
}