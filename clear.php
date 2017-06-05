<?php 
ob_start();
$k=$_REQUEST['k'];
if($k=="tra")
	
{
	header("location:index.php?k1=training");
}
else if($k=="corse")
{
	header("location:index.php?k1=course");
}
else if($k=="bt")
{
	header("location:index.php?k1=batch");
}
else if($k=="guid")
{
	header("location:index.php?k1=guide");
}
else if($k=="gd")
{
	header("location:index.php?k1=guidedetail");
}
else if($k=="compny")
{
	header("location:index.php?k1=company");
}
else if($k=="placed_stu")
{
	header("location:index.php?k1=placed_std");
}
else if($k=="stud")
{
	header("location:index.php?k1=students");
}
else if($k=="new")
{
	header("location:index.php?k1=news");
}
else if($k=="q_reply")
{
	header("location:index.php?k1=query_reply");
}
?>