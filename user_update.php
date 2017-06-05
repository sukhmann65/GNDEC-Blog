<?php
ob_start();
session_start();
include_once("connection.php");
$h1=$_REQUEST['h1'];

//*******************************************Project Details*************************************

if($h1=="proj")
	
{
	$h2=$_REQUEST['h2'];
	$batch=$_REQUEST['batch'];
	$tr=$_REQUEST['tr'];
	$pname=$_REQUEST['pname'];
	$guide=$_REQUEST['guide'];
	$tname=$_REQUEST['tname'];
	$pdesc=$_REQUEST['pdesc'];
	$z=mysql_query("select * from proj_detail where training='$tr' and pr_name='$pname' and status='1'");
	if($tr=="" || $guide=="" || $pname=="" || $pdesc=="")
	{
		if($tr=="")
		{
			$_SESSION['talert']="This value is required.";
		}
		if($pname=="")
		{
			$_SESSION['palert']="This value is required.";
		}
		if($guide=="")
		{
			$_SESSION['galert']="This value is required.";
		}
		if($pdesc=="")
		{
			$_SESSION['dalert']="This value is required.";
		}
		header("location:".$_SERVER['HTTP_REFERER']);
	}
	elseif(mysql_num_rows($z))
	{
		$_SESSION['exist']="Data Already Exists.";
		header("location:".$_SERVER['HTTP_REFERER']);
	}
	else
	{
		mysql_query("update proj_detail set training='$tr',pr_name='$pname',tr_name='$tname',pr_desc='$pdesc',modified_date='$time' where sno='$h2' and status='1'");
		$_SESSION['update']="Update Successfully";
		header("location:index.php?k1=projdetails");
	}
}
//*******************************************Blog*************************************

if($h1=="blogg")
{
	$trn=$_REQUEST['trn'];
	$proj=$_REQUEST['proj'];
	$topic=$_REQUEST['topic'];
	$des=$_REQUEST['des']; 
	$file=$_FILES['file']['name'];
	$ext = end((explode(".", $file)));
	$date=$_REQUEST['date'];
	$comm=$_REQUEST['comm'];
	$path="user forms/files/".$file;
	if($file=="")
	{
		mysql_query("update blog set training='$trn',project='$proj',topic='$topic',des='$des',date='$date',comments='$comm',server_date='$time'  where sno='$h2' and status='1'");
		$_SESSION['update']="Update Successfully ";
		header("location:index.php?k1=blog");
		
	}
	elseif($ext!="zip")
	{
	    if($ext!="rar")
		{
		$_SESSION['falert']="Upload only zip or rar file.";
		header("location:".$_SERVER['HTTP_REFERER']);
		}
		else
		{
	    mysql_query("update blog set training='$trn',project='$proj',topic='$topic',des='$des',file='$file',date='$date',comments='$comm',server_date='$time'  where sno='$h2' and status='1'");
		move_uploaded_file($_FILES['file']['tmp_name'],$path);
		$_SESSION['update']="Update Successfully ";
		header("location:index.php?k1=blog");
		}
	}
	elseif($ext!="rar")
	{
		if($ext!="zip")
		{
		$_SESSION['falert']="Upload only zip or rar file.";
		header("location:".$_SERVER['HTTP_REFERER']);
		}
		else
		{
	    mysql_query("update blog set training='$trn',project='$proj',topic='$topic',des='$des',file='$file',date='$date',comments='$comm',server_date='$time'  where sno='$h2' and status='1'");
		move_uploaded_file($_FILES['file']['tmp_name'],$path);
		$_SESSION['update']="Update Successfully ";
		header("location:index.php?k1=blog");
		}
	}
	else
	{	
		mysql_query("update blog set training='$trn',project='$proj',topic='$topic',des='$des',file='$file',date='$date',comments='$comm',server_date='$time'  where sno='$h2' and status='1'");
		move_uploaded_file($_FILES['file']['tmp_name'],$path);
		$_SESSION['update']="Update Successfully ";
		header("location:index.php?k1=blog");
	}
}
/*******************************************Student Registration*************************************/

if($h1=="stureg")
{
	$h2=$_REQUEST['h2'];
	$cno=$_REQUEST['cno'];
	$uno=$_REQUEST['uno'];
	$name=$_REQUEST['name'];
	$email=$_REQUEST['email'];
	$phno=$_REQUEST['phno'];
	$sem=$_REQUEST['sem'];
/*	$cmpname=$_REQUEST['cmpname'];
	$add=$_REQUEST['add'];
	$cperson=$_REQUEST['cperson'];
	$cnum=$_REQUEST['cnum'];  */
	$batch=$_REQUEST['batch'];
	$guide=$_REQUEST['guide'];
	$course=$_REQUEST['course'];
	mysql_query("update stu_reg set colg_rollno='$cno',univ_rollno='$uno',name='$name',phone_no='$phno',batch='$batch',branch='$course',modified_date='$time' where sno='$h2' and status='1'");
	$_SESSION['update']="Update Successfully";
	header("location:index.php?k1=stureg");
}
//*******************************************Student Training*************************************

if($h1=="type")
{
	$h2=$_REQUEST['h2'];
	$name=$_REQUEST['name'];
	$email=$_REQUEST['email'];
	$trn=$_REQUEST['trn'];
	$course=$_REQUEST['course'];
	$guide=$_REQUEST['guide'];
	$batch=$_REQUEST['batch'];
	$c_name=$_REQUEST['c_name'];
	$c_person=$_REQUEST['c_person'];
	$c_num=$_REQUEST['c_num'];
	$yy=mysql_fetch_array(mysql_query("select * from training where type='$trn' and status='1'"));
	
	$z=mysql_query("select * from std_trn where name='$name' and email='$email' and training='$yy[sno]' and status='1'");
	$f=mysql_fetch_array($z);
	if($c_name=="")
	{
		mysql_query("update std_trn set course='$course',guide='$guide',conc_person='$c_person',conc_no='$c_num',modified_date='$time' where sno='$h2' and status='1'");
		$_SESSION['update']="Update Successfully";
		header("location:index.php?k1=trn_type");
	}

	elseif(mysql_num_rows($z))
	{
		
		mysql_query("update std_trn set course='$course',guide='$guide',c_name='$c_name',conc_person='$c_person',conc_no='$c_num',modified_date='$time' where sno='$h2' and status='1'");
		$_SESSION['update']="Update Successfully";
		header("location:index.php?k1=trn_type");
	}
	else
	{
		
	mysql_query("update std_trn set training='$trn',course='$course',guide='$guide',c_name='$c_name',c_add='$c_add',conc_person='$c_person',conc_no='$c_num',modified_date='$time' where sno='$h2' and status='1'");
	$_SESSION['update']="Update Successfully";
	header("location:index.php?k1=trn_type");
	}
}

//*******************************************Synopsis*************************************

if($h1=="synopsis")
{
	$name=$_REQUEST['name'];
	$trn=$_REQUEST['trn'];
	$proj=$_REQUEST['proj'];
	$guide=$_REQUEST['guide'];
	$file=$_FILES['file']['name'];
	$ext = end((explode(".", $file)));
	$path="user forms/files/".$file;
	$z=mysql_query("select * from synopsis where training='$trn' and file='$file' and status='1' and session='$_SESSION[student]'");
	if($trn=="" || $proj=="" || $guide=="" || $file=="")
	{
		if($trn=="")
		{
			$_SESSION['talert']="This value is required.";
		}
		if($proj=="")
		{
			$_SESSION['palert']="This value is required.";
		}
		if($guide=="")
		{
			$_SESSION['galert']="This value is required.";
		}
		if($file=="")
		{
			$_SESSION['falert']="This value is required.";
		}
		
		header("location:".$_SERVER['HTTP_REFERER']);
	}
	elseif(mysql_num_rows($z))
	{
		$_SESSION['exist']="Data Already Exists.";
		header("location:".$_SERVER['HTTP_REFERER']);
	}
	elseif($ext!="zip")
	{
	    if($ext!="rar")
		{
		$_SESSION['falert']="Upload only zip or rar file";
		header("location:".$_SERVER['HTTP_REFERER']);
		}
		else
		{
	    mysql_query("update synopsis set file='$file',modified_date='$time' where sno='$h2' and status='1'");
		move_uploaded_file($_FILES['file']['tmp_name'],$path);
		$_SESSION['update']="Update Successfully ";
		header("location:index.php?k1=synopsis");
		}
	}
	elseif($ext!="rar")
	{
		if($ext!="zip")
		{
		$_SESSION['falert']="Upload only zip or rar file";
		header("location:".$_SERVER['HTTP_REFERER']);
		}
		else
		{
	    mysql_query("update synopsis set file='$file',modified_date='$time' where sno='$h2' and status='1'");
		move_uploaded_file($_FILES['file']['tmp_name'],$path);
		$_SESSION['update']="Update Successfully ";
		header("location:index.php?k1=synopsis");
		}
	}
	else
	{
		mysql_query("update synopsis set file='$file',modified_date='$time' where sno='$h2' and status='1'");
		move_uploaded_file($_FILES['file']['tmp_name'],$path);
		$_SESSION['update']="Update Successfully ";
		header("location:index.php?k1=synopsis");
	}
}


//*******************************************Source Code*************************************

if($h1=="s_code")
{
	$name=$_REQUEST['name'];
	$trn=$_REQUEST['trn'];
	$proj=$_REQUEST['proj'];
	$guide=$_REQUEST['guide'];
	$file=$_FILES['file']['name'];
	$ext = end((explode(".", $file)));
	$path="user forms/files/".$file;
	$z=mysql_query("select * from code where training='$trn' and file='$file' and status='1' and session='$_SESSION[student]'");
	if($trn=="" || $proj=="" || $guide=="" || $file=="")
	{
		if($trn=="")
		{
			$_SESSION['talert']="This value is required.";
		}
		if($proj=="")
		{
			$_SESSION['palert']="This value is required.";
		}
		if($guide=="")
		{
			$_SESSION['galert']="This value is required.";
		}
		if($file=="")
		{
			$_SESSION['falert']="This value is required.";
		}
		
		header("location:".$_SERVER['HTTP_REFERER']);
	}
	elseif(mysql_num_rows($z))
	{
		$_SESSION['exist']="Data Already Exists.";
		header("location:".$_SERVER['HTTP_REFERER']);
	}
	elseif($ext!="zip")
	{
	    if($ext!="rar")
		{
		$_SESSION['falert']="Upload only zip or rar file";
		header("location:".$_SERVER['HTTP_REFERER']);
		}
		else
		{
	    mysql_query("update code set file='$file',modified_date='$time' where sno='$h2' and status='1'");
		move_uploaded_file($_FILES['file']['tmp_name'],$path);
		$_SESSION['update']="Update Successfully ";
		header("location:index.php?k1=code");
		}
	}
	elseif($ext!="rar")
	{
		if($ext!="zip")
		{
		$_SESSION['falert']="Upload only zip or rar file";
		header("location:".$_SERVER['HTTP_REFERER']);
		}
		else
		{
	    mysql_query("update code set file='$file',modified_date='$time' where sno='$h2' and status='1'");
		move_uploaded_file($_FILES['file']['tmp_name'],$path);
		$_SESSION['update']="Update Successfully ";
		header("location:index.php?k1=code");
		}
	}
	else
	{
	mysql_query("update code set file='$file',modified_date='$time' where sno='$h2' and status='1'");
	move_uploaded_file($_FILES['file']['tmp_name'],$path);
	$_SESSION['update']="Update Successfully ";
	header("location:index.php?k1=code");
	}
}

?>