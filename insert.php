<?php
include_once("connection.php");
session_start();
ob_start();
$h1=$_REQUEST['h1'];

//*******************************************Training Type*************************************

if($h1=="trn")
{
	$tr=$_REQUEST['tr'];
	$x=mysql_query("select * from training where type='$tr' and status='1'");
if(mysql_num_rows($x))
{
	$_SESSION['exist']="Data Already Exists!";
	header("location:".$_SERVER['HTTP_REFERER']);
}
else
{
	mysql_query("insert into training values('','$tr','$time','$time','1')");
	$_SESSION['success']="Successfully inserted";
	header("location:".$_SERVER['HTTP_REFERER']);
}
}

//*******************************************Company Details*************************************

if($h1=="comp")
{
	$c_name=$_REQUEST['c_name'];
	$c_add=$_REQUEST['c_add'];
	$c_no=$_REQUEST['c_no'];
	$x=mysql_query("select * from company where c_name='$c_name' and status='1'");
if(mysql_num_rows($x))
{
	$_SESSION['exist']="Data Already Exists!";
	header("location:".$_SERVER['HTTP_REFERER']);
}
else
{
	mysql_query("insert into company values('','$c_name','$c_add','$c_no','$time','$time','1')");
	$_SESSION['success']="Successfully inserted";
	header("location:".$_SERVER['HTTP_REFERER']);
}
}

//*******************************************Batch*************************************

if($h1=="batch")
{
	$bat=$_REQUEST['bat'];
	$x=mysql_query("select * from batch where batch='$bat' and status='1'");
if(mysql_num_rows($x))
{
	$_SESSION['exist']="Data Already Exists!";
	header("location:".$_SERVER['HTTP_REFERER']);
}
else
{
	mysql_query("insert into batch values('','$bat','$time','$time','1')");
	$_SESSION['success']="Successfully inserted";
	header("location:".$_SERVER['HTTP_REFERER']);
}
}

//*******************************************Course*************************************

if($h1=="course")
{
	$cor=$_REQUEST['cor'];
	$x=mysql_query("select * from course where course='$cor' and status='1'");
if(mysql_num_rows($x))
{
	$_SESSION['exist']="Data Already Exists!";
	header("location:".$_SERVER['HTTP_REFERER']);
}
else
{
	mysql_query("insert into course values('','$cor','$time','$time','1')");
	$_SESSION['success']="Successfully inserted";
	header("location:".$_SERVER['HTTP_REFERER']);
}
}

//*******************************************Guide*************************************

if($h1=="guide")
{
	$name=$_REQUEST['name'];
	$x=mysql_query("select * from guide where name='$name' and status='1'");
if(mysql_num_rows($x))
{
	$_SESSION['exist']="Data Already Exists!";
	header("location:".$_SERVER['HTTP_REFERER']);
}
else
{
	mysql_query("insert into guide values('','$name','$time','$time','1')");
	$_SESSION['success']="Successfully inserted";
	header("location:".$_SERVER['HTTP_REFERER']);
}
}
//*******************************************Guide details*************************************

if($h1=="guidedetail")
{
	$gname=$_REQUEST['gname'];
	$email=$_REQUEST['email'];
	$uname=$_REQUEST['uname'];
	$pwd=$_REQUEST['pwd'];
	$x=mysql_query("select * from guide_details where name='$gname' and status='1'");
if($gname=="" || $email=="" || $uname=="" || $pwd=="")
{
	if($gname=="")
	{
		$_SESSION['galert']="Please select your name";
	}
	if($email=="")
	{
		$_SESSION['ealert']="This field is required";
	}
	if($uname=="")
	{
		$_SESSION['ualert']="This field is required";
	}
	if($pwd=="")
	{
		$_SESSION['palert']="This field is required";
	}
	header("location:".$_SERVER['HTTP_REFERER']);
}
else if(mysql_num_rows($x))
{
	$_SESSION['exist']="Data Already Exists!";
	header("location:".$_SERVER['HTTP_REFERER']);
}
else
{
	mysql_query("insert into guide_details values('','$gname','$email','$uname','$pwd','$time','$time','1','0')");
	$_SESSION['success']="Mail sent and Data Successfully inserted.";
	
	$to="$email";
	$subject="Your Password for logging into your account is:";
	$txt=$pwd;
	$header="from:"."info@gmail.com"."\r\n";
	mail($to,$subject,$txt,$header);
	header("location:".$_SERVER['HTTP_REFERER']);
}
}
//*******************************************Top Students************************************

if($h1=="std")
{
	$sname=$_REQUEST['sname'];
	$batch=$_REQUEST['batch'];
	$img=$_FILES['img']['name'];
	$cname=$_REQUEST['cname'];
	$pack=$_REQUEST['pack'];
	$path="form/img/".$img;
	$x=mysql_query("select * from students_placed where image='$img' and status='1'");
if($sname=="" || $batch=="" || $cname=="" || $pack=="" || $img=="")
{
	if($sname=="")
	{
		$_SESSION['salert']="This field is required";
	}
	if($batch=="")
	{
		$_SESSION['balert']="Select your batch";
	}
	if($cname=="")
	{
		$_SESSION['calert']="This field is required";
	}
	if($pack=="")
	{
		$_SESSION['palert']="This field is required";
	}
	if($img=="")
	{
		$_SESSION['ialert']="Upload Student Photo";
	}
	header("location:".$_SERVER['HTTP_REFERER']);
}
else if(mysql_num_rows($x))
{
	$_SESSION['exist']="Data Already Exists!";
	header("location:".$_SERVER['HTTP_REFERER']);
}
else
{
	mysql_query("insert into students_placed values('','$sname','$batch','$img','$cname','$pack','$time','$time','1')");
	move_uploaded_file($_FILES['img']['tmp_name'],$path);
	$_SESSION['success']="Successfully inserted";
	header("location:".$_SERVER['HTTP_REFERER']);
}
}
//*******************************************News*************************************

if($h1=="news")
{
	$nhead=$_REQUEST['nhead'];
	$ndetails=$_REQUEST['ndetails'];
	$image=$_FILES['image']['name'];
	$ext = end((explode(".", $image))); 
    $path="form/img/".$image;
	$x=mysql_query("select * from news where news_head='$nhead' and status='1'");
if(mysql_num_rows($x))
{
	$_SESSION['exist']="Data Already Exists!";
	header("location:".$_SERVER['HTTP_REFERER']);
}
elseif($image!="")
{
if($ext!="jpg")
		{
		$_SESSION['ialert']="Upload only jpg image.";
		header("location:".$_SERVER['HTTP_REFERER']);
		}
		else
		{
			mysql_query("insert into news values('','$nhead','$ndetails','$image','$time','$time','1')");
	move_uploaded_file($_FILES['image']['tmp_name'],$path);
	$_SESSION['success']="Successfully inserted";
	header("location:".$_SERVER['HTTP_REFERER']);
		}
}
else
{
	mysql_query("insert into news values('','$nhead','$ndetails','$image','$time','$time','1')");
	move_uploaded_file($_FILES['image']['tmp_name'],$path);
	$_SESSION['success']="Successfully inserted";
	header("location:".$_SERVER['HTTP_REFERER']);
}
}
//*******************************************Placed*************************************

if($h1=="placed")
{
	$cname=$_REQUEST['cname'];
	$batch=$_REQUEST['batch'];
	$file=$_FILES['file']['name'];
	$ext = end((explode(".", $file)));
	$path="form/img/".$file;
	$x=mysql_query("select * from placed_std where c_name='$cname' and batch='$batch' and status='1'");
if($file=="")
	{
		$_SESSION['falert']="This value is required.";
		header("location:index.php?k1=students");
	}
elseif($ext!="pdf")
	{
		$_SESSION['falert']="Upload only pdf file";
		header("location:index.php?k1=students");
	}
else if(mysql_num_rows($x))
{
	$_SESSION['exist']="Data Already Exists!";
	header("location:index.php?k1=students");
}
else
{
	mysql_query("insert into placed_std values('','$cname','$batch','$file','$time','$time','1')");
	move_uploaded_file($_FILES['file']['tmp_name'],$path);
	$_SESSION['success']="Successfully inserted";
	header("location:index.php?k1=students");
}
}

?>