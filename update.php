<?php
ob_start();
session_start();
include_once("connection.php");
$h1=$_REQUEST['h1'];

//*******************************************Training Type*************************************

if($h1=="trn")
	
{
	$h2=$_REQUEST['h2'];
	$tr=$_REQUEST['tr'];
	$z=mysql_query("select * from training where type='$tr' and status='1'");
	if(mysql_num_rows($z))
	{
		$_SESSION['exist']="Data Already Exists!";
		header("location:".$_SERVER['HTTP_REFERER']);
	}
	else
	{
		$_SESSION['update']="Update Successfully";
		mysql_query("update training set type='$tr',modified_date='$time' where sno='$h2' and status='1'");
		header("location:index.php?k1=training");
	}
}

//*******************************************Batch*************************************

if($h1=="batch")
{
	$h2=$_REQUEST['h2'];
	$bat=$_REQUEST['bat'];
	$z=mysql_query("select * from batch where batch='$bat' and status='1'");
	if(mysql_num_rows($z))
	{
		$_SESSION['exist']="Data Already Exists!";
		header("location:".$_SERVER['HTTP_REFERER']);
	}
	else
	{
		$_SESSION['update']="Update Successfully";
		mysql_query("update batch set batch='$bat',modified_date='$time' where sno='$h2' and status='1'");
		header("location:index.php?k1=batch");
	}
}

//*******************************************Course*************************************

if($h1=="course")
{
	$h2=$_REQUEST['h2'];
	$cor=$_REQUEST['cor'];
	$z=mysql_query("select * from course where course='$cor' and status='1'");
	if(mysql_num_rows($z))
	{
		$_SESSION['exist']="Data Already Exists!";
		header("location:".$_SERVER['HTTP_REFERER']);
	}
	else
	{
		$_SESSION['update']="Update Successfully";
		mysql_query("update course set course='$cor',modified_date='$time' where sno='$h2' and status='1'");
		header("location:index.php?k1=course");
	}
}

//*******************************************Guide*************************************

if($h1=="guide")
{
	$h2=$_REQUEST['h2'];
	$name=$_REQUEST['name'];
	$z=mysql_query("select * from guide where name='$name' and status='1'");
	if(mysql_num_rows($z))
	{
		$_SESSION['exist']="Data Already Exists!";
		header("location:".$_SERVER['HTTP_REFERER']);
	}
	else
	{
		$_SESSION['update']="Update Successfully";
		mysql_query("update guide set name='$name',modified_date='$time' where sno='$h2' and status='1'");
		header("location:index.php?k1=guide");
	}
}

//*******************************************Guide details*************************************

if($h1=="guidedetail")
{
	$h2=$_REQUEST['h2'];
	$gname=$_REQUEST['gname'];
	$email=$_REQUEST['email'];
	$uname=$_REQUEST['uname'];
	$pwd=$_REQUEST['pwd'];
	$z=mysql_query("select * from guide_details where email='$email' and sno='$h2' and status='1'");
	$z1=mysql_query("select * from guide_details where email='$email'");
	if($gname=="" || $email=="" || $uname=="" || $pwd=="")
	{
		$_SESSION['alert']="This field is required.";
		header("location:".$_SERVER['HTTP_REFERER']);
	}
	elseif(mysql_num_rows($z))
	{
		mysql_query("update guide_details set email='$email',username='$uname',modified_date='$time' where sno='$h2' and status='1'");
		$_SESSION['update']="Update Successfully";
		header("location:index.php?k1=guidedetail");
	}
	elseif(mysql_num_rows($z1))
	{
		$_SESSION['ealert']="Email already exist";
		header("location:".$_SERVER['HTTP_REFERER']);
	}
	
	else
	{
		$_SESSION['update']="Update Successfully";
		mysql_query("update guide_details set email='$email',username='$uname',modified_date='$time' where sno='$h2' and status='1'");
		header("location:index.php?k1=guidedetail");
	}
}

//*******************************************Top Students*************************************

if($h1=="std")
{
	$h2=$_REQUEST['h2'];
	$sname=$_REQUEST['sname'];
	$batch=$_REQUEST['batch'];
	$img=$_FILES['img']['name'];
	$cname=$_REQUEST['cname'];
	$pack=$_REQUEST['pack'];
	$path="form/img/".$img;
	
	if($sname=="" || $batch=="" || $cname=="" || $pack=="")
	{
		$_SESSION['alert']="This field is required.";
		header("location:index.php?k1=students");
	}
	elseif($img=="")
	{
		mysql_query("update students_placed set name='$sname',batch='$batch',c_name='$cname',package='$pack',modified_date='$time' where sno='$h2' and status='1'");
		$_SESSION['update']="Update Successfully";
		header("location:index.php?k1=students");
	}
	else
	{
		mysql_query("update students_placed set name='$sname',batch='$batch',image='$img',c_name='$cname',package='$pack',modified_date='$time' where sno='$h2' and status='1'");
		move_uploaded_file($_FILES['img']['tmp_name'],$path);
		$_SESSION['update']="Update Successfully";
		header("location:index.php?k1=students");
	}
}

//*******************************************Placed*************************************

if($h1=="placed")
{
	$h2=$_REQUEST['h2'];
	$cname=$_REQUEST['cname'];
	$batch=$_REQUEST['batch'];
	$file=$_FILES['file']['name'];
	$ext = end((explode(".", $file)));	
	$path="form/img/".$file;
	if($file=="")
	{
		mysql_query("update placed_std set c_name='$cname',batch='$batch',modified_date='$time' where sno='$h2'and status='1'");
		$_SESSION['update']="Update Successfully";
		header("location:".$_SERVER['HTTP_REFERER']);
	}
	elseif($ext!="pdf")
	{
		$_SESSION['falert']="Upload only pdf file";
		header("location:".$_SERVER['HTTP_REFERER']);
	}
	
	else
	{
		mysql_query("update placed_std set c_name='$cname',batch='$batch',file='$file',modified_date='$time' where sno='$h2'and status='1'");
		move_uploaded_file($_FILES['file']['tmp_name'],$path);
		$_SESSION['update']="Update Successfully";
		header("location:".$_SERVER['HTTP_REFERER']);
	}
}


//*******************************************News*************************************

if($h1=="news")
{
	$h2=$_REQUEST['h2'];
	$nhead=$_REQUEST['nhead'];
	$ndetails=$_REQUEST['ndetails'];
	$image=$_FILES['image']['name'];
	$ext = end((explode(".", $image))); 	
    $path="form/img/".$image;
	if($image=="")
	{
		mysql_query("update news set news_head='$nhead',news_detail='$ndetails',modified_date='$time' where sno='$h2' and status='1'");
		$_SESSION['update']="Update Successfully";
		header("location:index.php?k1=news");
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
		mysql_query("update news set news_head='$nhead',news_detail='$ndetails',image='$image',modified_date='$time' where sno='$h2' and status='1'");
		move_uploaded_file($_FILES['image']['tmp_name'],$path);
		$_SESSION['update']="Update Successfully";
		header("location:index.php?k1=news");
		
		}
}
	else
	{
		
		mysql_query("update news set news_head='$nhead',news_detail='$ndetails',image='$image',modified_date='$time' where sno='$h2' and status='1'");
		move_uploaded_file($_FILES['image']['tmp_name'],$path);
		$_SESSION['update']="Update Successfully";
		header("location:index.php?k1=news");
	}
}


//*******************************************Company details*************************************

if($h1=="comp")
{
	$h2=$_REQUEST['h2'];
	$c_name=$_REQUEST['c_name'];
	$c_add=$_REQUEST['c_add'];
	$c_no=$_REQUEST['c_no'];
	$z=mysql_query("select * from company where c_name='$c_name' and status='1'");
	if($c_name=="" || $c_add=="" || $c_no=="")
	{
		$_SESSION['alert']="This field is required.";
		header("location:".$_SERVER['HTTP_REFERER']);
	}
	elseif(mysql_num_rows($z))
	{
		mysql_query("update company set c_add='$c_add',c_no='$c_no',modified_date='$time' where sno='$h2' and status='1'");
		$_SESSION['update']="Update Successfully";
		header("location:index.php?k1=company");
	}
	else
	{
		mysql_query("update company set c_name='$c_name',c_add='$c_add',c_no='$c_no',modified_date='$time' where sno='$h2' and status='1'");
		header("location:index.php?k1=company");
		$_SESSION['update']="Update Successfully";

	}
}

?>