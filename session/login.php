<?php 
include('session.php');
if(isset($_POST['submit']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	if($username=="kremsuser" && $password=="religion")
	{		
		$_SESSION['username'] = $username;
		header("Location: project-list.php");
	}
	else
	{
		header("Location: index.php?wrong_input");
	}
}
?>
