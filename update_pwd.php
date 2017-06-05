<?php
include_once("connection.php");
session_start();
ob_start();
$curr_pwd=$_REQUEST['curr_pwd'];
$new_pwd=$_REQUEST['new_pwd'];
$retype_pwd=$_REQUEST['retype_pwd'];
if($_SESSION['student'])
	
{
$x=mysql_query("select * from student_login where email='$_SESSION[student]' and password!='$curr_pwd' and status='1'");
if(mysql_num_rows($x))
{
	$_SESSION['exist']="Your current password is invalid.";
	header("location:".$_SERVER['HTTP_REFERER']);
}
elseif($new_pwd!=$retype_pwd)
{
	$_SESSION['exist']="Your password doesn't match.";
	header("location:".$_SERVER['HTTP_REFERER']);
}
else
{
	mysql_query("update student_login set password='$new_pwd',modified_date='$time' where email='$_SESSION[student]' and status='1'");
	$_SESSION['success']="Your password changed successfully.";
	header("location:index.php");
}
}

if($_SESSION['teacher'])
{
$y=mysql_query("select * from guide_details where email='$_SESSION[teacher]' and password!='$curr_pwd' and status='1'");
if(mysql_num_rows($y))
{
	$_SESSION['exist']="Your current password is invalid.";
	header("location:".$_SERVER['HTTP_REFERER']);
}
elseif($new_pwd!=$retype_pwd)
{
	$_SESSION['exist']="Your password doesn't match.";
	header("location:".$_SERVER['HTTP_REFERER']);
}
else
{
	mysql_query("update guide_details set password='$new_pwd',modified_date='$time' where email='$_SESSION[teacher]' and status='1'");
	$_SESSION['success']="Your password changed successfully.";
	header("location:index.php?k1=dashboard");
}
}
?>