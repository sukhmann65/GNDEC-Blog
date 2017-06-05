<?php
session_start();
ob_start();
include_once("connection.php");
$x=mysql_query("select * from student_login where verify_status='1' and email='$_SESSION[student]'");


	if(mysql_num_rows($x))
	{
		header("location:complte_profile.php");	
	}
	else
	{
		header("location:not_verified.php");
	}

?>