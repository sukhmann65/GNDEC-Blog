<?php
ob_start();
session_start();
include_once("connection.php");
$a=$_REQUEST['a'];
$b=$_REQUEST['b'];
/*********************************Verify students**********************/
if($a=="verify")
	
{
$k=$_REQUEST['k'];
$t1=mysql_fetch_array(mysql_query("select * from student_login where sno='$k'"));
$pass=$t1['password'];
mysql_query("update student_login set verify_status='1' where sno='$k' and status='1'");
$to="$b";
$subject="Verified";
$txt="Dear Candidate, You are a valid student for logging into your blog. Your Username is your E-mail id and your password is:"." ".$pass;
$header="from:"."info@gmail.com"."\r\n";
mail($to,$subject,$txt,$header);
header("location:".$_SERVER['HTTP_REFERER']);
}

/********************************Registered Students********************/
if($a=="nverify")
{
$k=$_REQUEST['k'];
mysql_query("update student_login set verify_status='0' where sno='$k' and status='1'");
header("location:".$_SERVER['HTTP_REFERER']);
}

?>