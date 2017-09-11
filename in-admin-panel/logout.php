<?php
session_start();

if(!isset($_SESSION['dps_admin']))
{
        echo header("Location: login.php");
}
else
{
	$dps_admin=$_SESSION['dps_admin'];
	$dps_admin_type=$_SESSION['dps_admin_type'];
}
if(isset($_REQUEST['cmd']))
{
	if($_REQUEST['cmd']=="logout")
	{
		unset($_SESSION['dps_admin']);
		unset($_SESSION['dps_admin_type']);
        echo header("Location: index.php");
	}
}

?>

