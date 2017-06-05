<?php
ob_start();
session_start();
include_once("../connection.php");
$h=$_REQUEST['h'];
/*******************************Students Blog***************************/
if($h=="std_record")
{
$batch=$_REQUEST['batch'];
$trn=$_REQUEST['trn'];
$x=mysql_fetch_array(mysql_query("select * from batch where sno='$batch' and status='1'"));
$y=mysql_fetch_array(mysql_query("select * from training where sno='$trn' and status='1'"));
$_SESSION['al']="Details of Batch:"." ".$x['batch']." "."and Training:"." ".$y['type'];
header("location:../index.php?k1=stdrecord&k2=$batch&k3=$trn");
}

/*******************************Synopsis***************************/
if($h=="synopsis_record")
{
$batch=$_REQUEST['batch'];
$trn=$_REQUEST['trn'];
$x=mysql_fetch_array(mysql_query("select * from batch where sno='$batch' and status='1'"));
$y=mysql_fetch_array(mysql_query("select * from training where sno='$trn' and status='1'"));
$_SESSION['al']="Details of Batch:"." ".$x['batch']." "."and Training:"." ".$y['type'];
header("location:../index.php?k1=syn_record&k2=$batch&k3=$trn");
}

/*******************************List of students***************************/
if($h=="list")
{
$batch=$_REQUEST['batch'];
$trn=$_REQUEST['trn'];
$x=mysql_fetch_array(mysql_query("select * from batch where sno='$batch' and status='1'"));
$y=mysql_fetch_array(mysql_query("select * from training where sno='$trn' and status='1'"));
$_SESSION['al']="Details of Batch:"." ".$x['batch']." "."and Training:"." ".$y['type'];
header("location:../index.php?k1=view_list&k2=$batch&k3=$trn");
}

/*******************************Projects***************************/
if($h=="project")
{
$batch=$_REQUEST['batch'];
$trn=$_REQUEST['trn'];
$x=mysql_fetch_array(mysql_query("select * from batch where sno='$batch' and status='1'"));
$y=mysql_fetch_array(mysql_query("select * from training where sno='$trn' and status='1'"));
$_SESSION['al']="Details of Batch:"." ".$x['batch']." "."and Training:"." ".$y['type'];
header("location:../index.php?k1=view_proj&k2=$batch&k3=$trn");
}





if($h=="g_std")
{
$batch=$_REQUEST['batch'];
$trn=$_REQUEST['trn'];
$guide=$_REQUEST['guide']; 
$x=mysql_fetch_array(mysql_query("select * from batch where sno='$batch' and status='1'")); 
$y=mysql_fetch_array(mysql_query("select * from training where sno='$trn' and status='1'"));
$z=mysql_fetch_array(mysql_query("select * from guide where sno='$guide' and status='1'"));
$_SESSION['al']="Students of Batch:"." ".$x['batch']." "."and Training:"." ".$y['type']." "."and Guide:"." ".$z['name'];
header("location:../index.php?k1=view_std&k2=$batch&k3=$trn&k4=$guide");
}

?>