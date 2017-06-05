<?php
ob_start();
session_start();
include_once("connection.php");

if($_SESSION['student'])
{
$std=mysql_query("select * from student_login where email='$_SESSION[student]' and status='1'");
$std1=mysql_fetch_array($std);
	if($std1['pwd_status']==0)
	{
		$_SESSION['profile']="Complete your Profile first.";
		header("location:index.php");
	}
	else
	{
		header("location:index.php");
	}
}
?>

      