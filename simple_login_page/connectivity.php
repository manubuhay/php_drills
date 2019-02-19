<?php
define('DB_HOST', '10.1.2.106');
define('DB_NAME', 'login');
define('DB_USER','root');
define('DB_PASSWORD','password');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error()); 
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

function signIn()
 { 
session_start(); //starting the session for user profile page

	if(!empty($_POST[user]) and !empty($_POST[pass]))
	{
		$query = mysql_query("SELECT * FROM UserName where userName = '$_POST[user]' AND pass = '$_POST[pass]'") or die(mysql_error());
		$row = mysql_fetch_array($query) or die(mysql_error());
			if(!empty($row['userName']) and !empty($row['pass']))
				{
					if($_POST[user] == $row['userName'] and $_POST[pass] == $row['pass'])
						header('Location: login.html');
					else
						echo "Username does not exist. / Password does not match.";
				}
	}
	else
	echo "Error! Field/s are missing!";			 
 }
if(isset($_POST[submit]))
	signIn();
?>