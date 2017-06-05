<?php
ob_start();
session_start();
include_once("connection.php");
if($_SESSION['admin'] || $_SESSION['student'] || $_SESSION['teacher'])
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
include_once("head.php");
?>



</head>
<body>

<div id="cl-wrapper">
<?php include_once("sidebar.php");?>
	<div class="container-fluid" id="pcont">
   
   <?php 
   include_once("header.php");
   if($_REQUEST['k1']=="dashboard")
   {
	   include_once("dashboard.php");
   }
   elseif($_REQUEST['k1']=="queries")
   {
	   include_once("form/queries.php");
   }
   elseif($_REQUEST['k1']=="view_msg")
   {
	   include_once("form/view_msg.php");
   }
   elseif($_REQUEST['k1']=="query_reply")
   {
	   include_once("form/query_reply.php");
   }
   elseif($_REQUEST['k1']=="reg_stu")
   {
	   include_once("form/reg_stu.php");
   }
   elseif($_REQUEST['k1']=="stu_verified")
   {
	   include_once("form/stu_verified.php");
   }
   elseif($_REQUEST['k1']=="guide_std")
   {
	   include_once("form/guide_std.php");
   }
   elseif($_REQUEST['k1']=="view_std")
   {
	   include_once("form/view_std.php");
   }
   elseif($_REQUEST['k1']=="training")
   {
	   include_once("form/training.php");
   }
   elseif($_REQUEST['k1']=="company")
   {
	   include_once("form/company.php");
   }
   else if($_REQUEST['k1']=="course")
   {
	   include_once("form/course.php");
   }
   else if($_REQUEST['k1']=="batch")
   {
	   include_once("form/batch.php");
   }
   else if($_REQUEST['k1']=="guide")
   {
	   include_once("form/guide.php");
   }
   else if($_REQUEST['k1']=="guidedetail")
   {
	   include_once("form/guidedetail.php");
   }
   else if($_REQUEST['k1']=="students")
   {
	   include_once("form/students.php");
   }
   else if($_REQUEST['k1']=="placed_std")
   {
	   include_once("form/placed_std.php");
   }
 /*  else if($_REQUEST['k1']=="std")
   {
	   include_once("form/std.php");
   } */
   else if($_REQUEST['k1']=="news")
   {
	   include_once("form/news.php");
   }
   else if($_REQUEST['k1']=="stureg")
   {
	   include_once("user forms/sturegistration.php");
   }
   else if($_REQUEST['k1']=="details")
   {
	   include_once("user forms/details.php");
   }
   else if($_REQUEST['k1']=="change_pwd")
   {
	   include_once("user forms/change_pwd.php");
   }
   else if($_REQUEST['k1']=="projdetails")
   {
	   include_once("user forms/projdetails.php");
   }
   else if($_REQUEST['k1']=="blog")
   {
	   include_once("user forms/blog.php");
   }
   else if($_REQUEST['k1']=="oldrecord")
   {
	   include_once("user forms/oldrecord.php");
   }
   else if($_REQUEST['k1']=="record")
   {
	   include_once("user forms/record.php");
   }
   else if($_REQUEST['k1']=="view_blog")
   {
	   include_once("user forms/view_blog.php");
   }
   else if($_REQUEST['k1']=="v_blog")
   {
	   include_once("user forms/v_blog.php");
   }
   else if($_REQUEST['k1']=="view_blog1")
   {
	   include_once("user forms/v_blog.php");
   }
   else if($_REQUEST['k1']=="nps")
   {
	   include_once("user forms/news_std.php");
   }
   elseif($_REQUEST['k1']=="read_news")
   {
	   include_once("user forms/read_news.php");
   }
   else if($_REQUEST['k1']=="synopsis")
   {
	   include_once("user forms/synopsis.php");
   }
   else if($_REQUEST['k1']=="code")
   {
	   include_once("user forms/code.php");
   }
   else if($_REQUEST['k1']=="rating")
   {
	   include_once("user forms/rating.php");
   }
   else if($_REQUEST['k1']=="compny_feedback")
   {
	   include_once("compny_feedback.php");
   }
   else if($_REQUEST['k1']=="stdrecord")
   {
	   include_once("guide_forms/stdrecord.php");
   }
   else if($_REQUEST['k1']=="g_synopsis")
   {
	   include_once("guide_forms/g_synopsis.php");
   }
   else if($_REQUEST['k1']=="syn_record")
   {
	   include_once("guide_forms/synopsis_record.php");
   }
   else if($_REQUEST['k1']=="trn_type")
   {
	   include_once("user forms/std_trn.php");
   }
   else if($_REQUEST['k1']=="stdinfo")
   {
	   include_once("guide_forms/stdinfo.php");
   }
   else if($_REQUEST['k1']=="viewblog")
   {
	  include_once("guide_forms/viewblog.php");
   }
   else if($_REQUEST['k1']=="list_std")
   {
	   include_once("guide_forms/list_std.php");
   }
   else if($_REQUEST['k1']=="view_list")
   {
	   include_once("guide_forms/view_list.php");
   }
   else if($_REQUEST['k1']=="projects")
   {
	   include_once("guide_forms/projects.php");
   }
   else if($_REQUEST['k1']=="view_proj")
   {
	   include_once("guide_forms/view_proj.php");
   }
   else
   {
	   include_once("dashboard.php");
   }
   
   ?>   
	
    
    </div>
</div>

<?php
include_once("scripts.php");
?>

<?php
}
else
{
	header("location:login.php");
}
?>

</body>
</html>
