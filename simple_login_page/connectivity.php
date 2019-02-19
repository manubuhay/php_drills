<?php
define('DB_HOST', '10.1.2.106');
define('DB_NAME', 'login');
define('DB_USER','root');
define('DB_PASSWORD','password');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error()); 
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

$id = "$_POST[user]";

function signIn(){ 
session_start(); //starting the session for user profile page

	if(!empty($_POST[user]) AND !empty($_POST[pass]))
	{
		$query = mysql_query("SELECT * FROM UserName where userName = '$_POST[user]' AND pass = '$_POST[pass]'") or die(mysql_error());
		$row = mysql_fetch_array($query) or die(mysql_error());
			if(!empty($row['userName']) AND !empty($row['pass']))
				{
					header('Location: login.html');
				}
	}
	else
	{
		if(empty($_POST[user]))
			echo "Empty Username!";
		if(empty($_POST[pass]))
			echo "Empty Password!";
			echo "$id";
		else
			echo "Error! Fields are empty!";
	}			 }
if(isset($_POST[submit]))
	signIn();
?>