<?php
ob_start();
session_start();
include_once("connection.php");

$uname=$_REQUEST['uname'];
$pwd=$_REQUEST['pwd'];
$x=mysql_query("select * from admin where username='$uname' and password='$pwd'");
if(mysql_num_rows($x))
{
	$_SESSION['admin']=$uname;
	header("location:index.php");
}
else
{
	$_SESSION['alert']="Invalid Username/Password";
	header("location:login.php");
}
?>