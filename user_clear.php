<?php 
ob_start();
$k=$_REQUEST['k'];

if($k=="pr")
{
	header("location:index.php?k1=projdetails");
}
else if($k=="bl")
{
	header("location:index.php?k1=blog");
}
else if($k=="synp")
{
	header("location:index.php?k1=synopsis");
}
else if($k=="oldrec")
{
	header("location:index.php?k1=oldrecord");
}
else if($k=="vblog")
{
	header("location:index.php?k1=view_blog");
}

else if($k=="type")
{
	header("location:index.php?k1=trn_type");
}
else if($k=="stdreg")
{
	header("location:index.php?k1=stureg");
}
else if($k=="info")
{
	header("location:index.php?k1=stdinfo");
}
else if($k=="edit_pwd")
{
	header("location:index.php?k1=change_pwd");
}
else if($k=="g_syn")
{
	header("location:index.php?k1=g_synopsis");
}
else if($k=="lists")
{
	header("location:index.php?k1=list_std");
}
else if($k=="proj")
{
	header("location:index.php?k1=projects");
}
else if($k=="s_code")
{
	header("location:index.php?k1=code");
}



?>