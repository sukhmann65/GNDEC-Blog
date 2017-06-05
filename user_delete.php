<?php
ob_start();
include_once("connection.php");
$k1=$_REQUEST['k1'];
if($k1=="projdetails")
	
{
	$id=$_REQUEST['id'];
	mysql_query("update proj_detail set status='0' where sno='$id' and status='1'");
	header("location:".$_SERVER['HTTP_REFERER']);
}
if($k1=="blog")
{
	$id=$_REQUEST['id'];
	mysql_query("update blog set status='0' where sno='$id' and status='1'");
	header("location:".$_SERVER['HTTP_REFERER']);
}
if($k1=="trn_type")
{
	$id=$_REQUEST['id'];
	mysql_query("update std_trn set status='0' where sno='$id' and status='1'");
	header("location:".$_SERVER['HTTP_REFERER']);
}
if($k1=="synopsis")
{
	$id=$_REQUEST['id'];
	mysql_query("update synopsis set status='0' where sno='$id' and status='1'");
	header("location:".$_SERVER['HTTP_REFERER']);
}
if($k1=="code")
{
	$id=$_REQUEST['id'];
	mysql_query("update code set status='0' where sno='$id' and status='1'");
	header("location:".$_SERVER['HTTP_REFERER']);
}


?>
