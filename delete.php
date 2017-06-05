<?php
ob_start();
include_once("connection.php");
$k1=$_REQUEST['k1'];

if($k1=="training")
{
	$id=$_REQUEST['id'];
	mysql_query("update training set status='0' where sno='$id' and status='1'");
	header("location:".$_SERVER['HTTP_REFERER']);
}
if($k1=="course")
{
	$id=$_REQUEST['id'];
	mysql_query("update course set status='0' where sno='$id' and status='1'");
	header("location:".$_SERVER['HTTP_REFERER']);
}
if($k1=="batch")
{
	$id=$_REQUEST['id'];
	mysql_query("update batch set status='0' where sno='$id' and status='1'");
	header("location:".$_SERVER['HTTP_REFERER']);
}
if($k1=="guide")
{
	$id=$_REQUEST['id'];
	mysql_query("update guide set status='0' where sno='$id' and status='1'");
	header("location:".$_SERVER['HTTP_REFERER']);
}
if($k1=="guidedetail")
{
	$id=$_REQUEST['id'];
	mysql_query("update guide_details set status='0' where sno='$id' and status='1'");
	header("location:".$_SERVER['HTTP_REFERER']);
}
if($k1=="students")
{
	$id=$_REQUEST['id'];
	mysql_query("update students_placed set status='0' where sno='$id' and status='1'");
	header("location:".$_SERVER['HTTP_REFERER']);
}
if($k1=="placed_std")
{
	$id=$_REQUEST['id'];
	mysql_query("update placed_std set status='0' where sno='$id' and status='1'");
	header("location:".$_SERVER['HTTP_REFERER']);
}

if($k1=="news")
{
	$id=$_REQUEST['id'];
	mysql_query("update news set status='0' where sno='$id' and status='1'");
	header("location:".$_SERVER['HTTP_REFERER']);
}

if($k1=="company")
{
	$id=$_REQUEST['id'];
	mysql_query("update company set status='0' where sno='$id' and status='1'");
	header("location:".$_SERVER['HTTP_REFERER']);
}

?>