<?php
session_start();
$session_check=false;

if(isset($_SESSION['username']))
{
	$session_check=true;
}


?>
