<?php
ob_start();
session_start();
include_once("connection.php");
$tr=$_REQUEST['tr'];
$x=mysql_query("select * from blog where training='$tr' and session='$_SESSION[student]' and status='1'");
header("location:index.php?k1=v_blog");

?>