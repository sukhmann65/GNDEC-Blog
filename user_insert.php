<?php
include_once("connection.php");
session_start();
ob_start();
$h1=$_REQUEST['h1'];

/*******************************************Student Registration Form**************************************/


if($h1=="stureg")
{
	$cno=$_REQUEST['cno'];
	$uno=$_REQUEST['uno'];
	$name=$_REQUEST['name'];
	$email=$_REQUEST['email'];
	$phno=$_REQUEST['phno'];
/*	$sem=$_REQUEST['sem'];
	$cmpname=$_REQUEST['cmpname'];
	$add=$_REQUEST['add'];
	$cperson=$_REQUEST['cperson'];
	$cnum=$_REQUEST['cnum'];   */
	$batch=$_REQUEST['batch'];
	$course=$_REQUEST['course'];
	
	$z=mysql_query("select * from stu_reg where colg_rollno='$cno' and univ_rollno='$uno' and email='$email' and status='1'");
	$z1=mysql_query("select * from stu_reg where session='$_SESSION[student]' and status='1'");
if(mysql_num_rows($z))
{
	$_SESSION['exist']="Data Already Exists!";
	header("location:".$_SERVER['HTTP_REFERER']);
}


else
{
	mysql_query("insert into stu_reg values('','$cno','$uno','$name','$email','$phno','$batch','$course','$time','$time','$_SESSION[student]','1')");
	mysql_query("update  student_login set pwd_status='1' where email='$_SESSION[student]' and status='1'");
	
	$_SESSION['success']="Successfully registered.<a href='index.php?k1=trn_type'> <span style='color:red;'>Now complete the following form to choose your training type and other details.</span></a>";
	header("location:index.php?k1=trn_type");
}
}
//*******************************************Project Details*************************************

if($h1=="proj")
{
	$batch=$_REQUEST['batch'];
	$tr=$_REQUEST['tr'];
	$pname=$_REQUEST['pname'];
	$guide=$_REQUEST['guide'];
	$tname=$_REQUEST['tname'];
	$pdesc=$_REQUEST['pdesc']; 
	$a=mysql_fetch_array(mysql_query("select * from batch where batch='$batch'"));
	$z=mysql_query("select * from proj_detail where training='$tr' and pr_name='$pname' and status='1'");
	if($tr=="" || $guide=="")
	{
		if($tr=="")
		{
			$_SESSION['talert']="This value is required.";
		}
		if($pname=="")
		{
			$_SESSION['palert']="This value is required.";
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
		mysql_query("insert into proj_detail values('','$a[sno]','$tr','$guide','$pname','$tname','$pdesc','$time','$time','$_SESSION[student]','1')");
	$_SESSION['success']="Successfully Submitted";
	header("location:".$_SERVER['HTTP_REFERER']);
	}

}
//*******************************************Blog*************************************

if($h1=="blogg")
{
	$name=$_REQUEST['name'];
	$trn=$_REQUEST['trn'];
	$proj=$_REQUEST['proj'];
	$topic=$_REQUEST['topic'];
	$des=$_REQUEST['des'];
	$file=$_FILES['file']['name'];
	$ext = end((explode(".", $file)));
	
	$date=$_REQUEST['date'];
	$comm=$_REQUEST['comm'];
	$path="user forms/files/".$file;
	if($file!="")
	{
	if($ext!="zip")
	{
		if($ext!="rar")
		{
		$_SESSION['falert']="Upload only zip or rar file.";
		header("location:".$_SERVER['HTTP_REFERER']);
		}
		else
		{
	    mysql_query("insert into blog values('','$name','$trn','$proj','$topic','$des','$file','$date','$comm','$time','$_SESSION[student]','1')");
		move_uploaded_file($_FILES['file']['tmp_name'],$path);
		$_SESSION['success']="Submitted Successfully ";
		header("location:".$_SERVER['HTTP_REFERER']);
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
	    mysql_query("insert into blog values('','$name','$trn','$proj','$topic','$des','$file','$date','$comm','$time','$_SESSION[student]','1')");
		move_uploaded_file($_FILES['file']['tmp_name'],$path);
		$_SESSION['success']="Submitted Successfully ";
		header("location:".$_SERVER['HTTP_REFERER']);
			
		}
	} } 
	else
	{
	mysql_query("insert into blog values('','$name','$trn','$proj','$topic','$des','$file','$date','$comm','$time','$_SESSION[student]','1')");
	move_uploaded_file($_FILES['file']['tmp_name'],$path);
	$_SESSION['success']="Submitted Successfully ";
	header("location:".$_SERVER['HTTP_REFERER']);
	}

}
//****************************************Synopsis**********************************

if($h1=="synopsis")
{
	$name=$_REQUEST['name'];
	$trn=$_REQUEST['trn'];
	$proj=$_REQUEST['proj'];
	$guide=$_REQUEST['guide'];
	$file=$_FILES['file']['name'];
	echo $ext = end((explode(".", $file)));
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
	    mysql_query("insert into synopsis values('','$name','$trn','$proj','$guide','$file','$time','$time','$_SESSION[student]','1')");
	    move_uploaded_file($_FILES['file']['tmp_name'],$path);
	$_SESSION['success']="Successfully Submitted";
	header("location:".$_SERVER['HTTP_REFERER']);
			
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
	    mysql_query("insert into synopsis values('','$name','$trn','$proj','$guide','$file','$time','$time','$_SESSION[student]','1')");
	    move_uploaded_file($_FILES['file']['tmp_name'],$path);
	$_SESSION['success']="Successfully Submitted";
	header("location:".$_SERVER['HTTP_REFERER']);
			
		}
	}
	
	else
	{
	mysql_query("insert into synopsis values('','$name','$trn','$proj','$guide','$file','$time','$time','$_SESSION[student]','1')");
	move_uploaded_file($_FILES['file']['tmp_name'],$path);
	$_SESSION['success']="Successfully Submitted";
	header("location:".$_SERVER['HTTP_REFERER']);
	}
}
//****************************************Student Training**********************************

if($h1=="type")
{
	$name=$_REQUEST['name'];
	$email=$_REQUEST['email'];
	$batch=$_REQUEST['batch'];
	$trn=$_REQUEST['trn'];
	$course=$_REQUEST['course'];
	$guide=$_REQUEST['guide'];
	$c_name=$_REQUEST['c_name'];
	$c_person=$_REQUEST['c_person'];
	$c_num=$_REQUEST['c_num'];
	$a=mysql_fetch_array(mysql_query("select * from batch where batch='$batch' and status='1'"));

	$z=mysql_query("select * from std_trn where training='$trn' and session='$_SESSION[student]' and batch='$a[sno]' and status='1'");
	if(mysql_num_rows($z))
	{
		$_SESSION['exist']="Data Already Exists.";
		header("location:".$_SERVER['HTTP_REFERER']);
	}
	else
	{ 
		mysql_query("insert into std_trn values('','$name','$email','$trn','$course','$guide','$a[sno]','$c_name','$c_person','$c_num','$time','$time','$_SESSION[student]','1')");
		$_SESSION['success']="Submitted Successfully";
		header("location:".$_SERVER['HTTP_REFERER']);
	}
}

//****************************************Source Code**********************************

if($h1=="s_code")
{
	$name=$_REQUEST['name'];
	$trn=$_REQUEST['trn'];
	$proj=$_REQUEST['proj'];
	$guide=$_REQUEST['guide'];
	$file=$_FILES['file']['name'];
	$ext = end((explode(".", $file)));
	$path="user forms/files/".$file;
	$z=mysql_query("select * from code where training='$trn' and file='$file' and status='1'");
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
	    mysql_query("insert into code values('','$name','$trn','$proj','$guide','$file','$time','$time','$_SESSION[student]','1')");
	    move_uploaded_file($_FILES['file']['tmp_name'],$path);
	$_SESSION['success']="Successfully Submitted";
	header("location:".$_SERVER['HTTP_REFERER']);
			
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
	    mysql_query("insert into code values('','$name','$trn','$proj','$guide','$file','$time','$time','$_SESSION[student]','1')");
	    move_uploaded_file($_FILES['file']['tmp_name'],$path);
	$_SESSION['success']="Successfully Submitted";
	header("location:".$_SERVER['HTTP_REFERER']);
			
		}
	}
	
	else
	{
	mysql_query("insert into code values('','$name','$trn','$proj','$guide','$file','$time','$time','$_SESSION[student]','1')");
	move_uploaded_file($_FILES['file']['tmp_name'],$path);
	$_SESSION['success']="Successfully Submitted";
	header("location:".$_SERVER['HTTP_REFERER']);
	}
}
//*******************************************Company Rating*************************************

if($h1=="c_rating")
{
	$trn=$_REQUEST['trn']; 
	$cname=$_REQUEST['cname'];
	$c_rate=$_REQUEST['c_rate'];
	if (strpos($c_rate,'-') !== false) 
	{
     $c_rate=0;
	}
	
	$comm=$_REQUEST['comm'];
	$bat=mysql_fetch_array(mysql_query("select * from std_trn where session='$_SESSION[student]' and status='1'"));
	$batch=$bat['batch'];
	$z=mysql_query("select * from rating where training='$trn' and session='$_SESSION[student]' and status='1'");
	if($trn=="")
	{
		$_SESSION['talert']="This field is required";
		header("location:".$_SERVER['HTTP_REFERER']);
	}
	elseif(mysql_num_rows($z))
	{
		$_SESSION['exist']="You have already rated.";
		header("location:".$_SERVER['HTTP_REFERER']);
	}
	else
	{
	mysql_query("insert into rating values('','$batch','$trn','$cname','$c_rate','$comm','$time','$time','$_SESSION[student]','1')");
	$_SESSION['success']="Submitted Successfully ";
	header("location:".$_SERVER['HTTP_REFERER']);
	}
}

?>

