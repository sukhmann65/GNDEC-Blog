<?php
ob_start();
include_once("connection.php");

if($_SESSION['admin'])
{
$x=mysql_fetch_array(mysql_query("select * from admin where username='$_SESSION[admin]'"));
}
if($_SESSION['student'])
{
$x=mysql_fetch_array(mysql_query("select * from student_login where status='1' and email='$_SESSION[student]' and status='1'"));
}
if($_SESSION['teacher'])
{
$x=mysql_fetch_array(mysql_query("select * from guide_details where status='1' and email='$_SESSION[teacher]' and status='1'"));
$x1=mysql_fetch_array(mysql_query("select * from guide where sno='$x[name]' and status='1'"));
}
?>
<!-- TOP NAVBAR -->
<div id="head-nav" class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-collapse">
      
     
      
      
      	<ul class="nav navbar-nav navbar-right user-nav">
      
          <li class="dropdown profile_menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>
			<?php 
			if($_SESSION['admin'])
			{
				 echo ucwords ($x['username']);	
			}
			if($_SESSION['student'])
			{ 	
			 	echo ucwords ($x['name']);
			}
			if($_SESSION['teacher'])
			{ 	
				echo ucwords ($x1['name']);  
			} 
			?>
            </span> <b class="caret"></b></a>
            <ul class="dropdown-menu">
  <?php /*        <li><a href="#">My Account</a></li>
              <li><a href="#">Profile</a></li>
			   <li class="divider"></li>   */ ?>
               <?php
			   if($_SESSION['student'] || $_SESSION['teacher'])
			   {
			   ?>
               
              <li><a href="<?php if($_SESSION['student'] || $_SESSION['teacher']) { echo 'index.php?k1=change_pwd'; } ?>">Change password</a></li> 
              
              <?php
			   }
			  ?>
              <li><a href="<?php if($_SESSION['admin']) { echo 'logout.php'; } else { echo '../site/studentlogout.php';} ?>">Sign Out</a></li>
            </ul>
          </li>
        </ul>
      
<?php
if($_SESSION['success'])
{
?>        
    
      	<div style="width:auto; float:left; margin-top:4px; line-height:22px; height:61px">
      	<div class="content">
        <div class="alert alert-primary alert-white-alt rounded">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="margin-left:10px">&times;</button>
            <div class="icon"><i class="fa fa-check"></i></div>
            <strong>Success!</strong>  <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
        </div>
        </div>
        </div>
        

<?php
}
?>



<?php
if($_SESSION['exist'])
{
?> 


		<div style="width:auto; float:left; margin-top:4px; line-height:22px; height:61px">
      	<div class="content">
		<div class="alert alert-warning alert-white-alt rounded">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<div class="icon"><i class="fa fa-warning"></i></div>
								<strong>Alert!</strong> <?php echo $_SESSION['exist']; unset($_SESSION['exist']); ?>

		</div>
        </div>
        </div>
        
        
<?php
}
?>        
    
    
<?php
if($_SESSION['update'])
{
?>             
        
        <div style="width:auto; float:left; margin-top:4px; line-height:22px; height:61px">
      	<div class="content">
        <div class="alert alert-success alert-white-alt rounded">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<div class="icon"><i class="fa fa-check"></i></div>
								<strong>Success!</strong> <?php echo $_SESSION['update']; unset($_SESSION['update']); ?>
		</div>
        </div>
        </div>
                      

<?php
}
?>




<?php
if($_SESSION['record'])
{
?>
	<div style="width:auto; float:left; margin-top:4px; line-height:22px; height:61px">
    <div class="content">
	<div class="alert alert-info alert-white-alt rounded">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<div class="icon"><i class="fa fa-info-circle"></i></div>
								<strong>No record found.</strong> <?php echo $_SESSION['record']; unset($_SESSION['record']); ?> 
	</div>
    </div>
    </div>
    
    
    
<?php
}
?>








<?php
if($_SESSION['al'])
{
?>
	<div style="width:auto; float:left; margin-top:4px; line-height:22px; height:61px">
    <div class="content">
	<div class="alert alert-info alert-white-alt rounded">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<div class="icon"></div>
								<strong></strong><?php echo $_SESSION['al']; unset($_SESSION['al']); ?>
	</div>
    </div>
    </div>
    
    
    
<?php
}
?>




<?php
if($_SESSION['mail'])
{
?>
      <div style="width:auto; float:left; margin-top:4px; line-height:22px; height:61px">
      <div class="content">
      <div class="alert alert-success alert-white-alt rounded">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<div class="icon"><i class="fa fa-check"></i></div>
								<strong>Mail </strong> <?php  echo $_SESSION['mail']; unset($_SESSION['mail']); ?>
	  </div>
      </div>
      </div>
     
<?php
}
?>






      
        			
      
      </div><!--/.nav-collapse animate-collapse -->
    </div>
  </div>
  
