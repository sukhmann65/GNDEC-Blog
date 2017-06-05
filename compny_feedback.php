<?php
ob_start();
$id=$_REQUEST['k3'];
$k4=$_REQUEST['k4'];
$k5=$_REQUEST['k5'];
$star=$_REQUEST['s1'];
$mm=$_REQUEST['s3'];
include_once("connection.php");

$x1=mysql_query("select * from rating where c_name='$id' and batch='$k4'");
?>
	<div class="cl-mcont">
    
	<span style=" margin-left:18%; font-size:20px; font-weight:bold; color:#7761a7;">
    	Company: <span style="color:#FCA90F; font-weight:bolder;">
		<?php echo ucwords($id); ?>
        </span>
    </span>
    <span style="float:right; font-size:20px; font-weight:bold; color:#7761a7;">
        Rating:
         <?php
         for($i=1;$i<=$star;$i++)
         {
         ?>
         <img src="images/Star-Full.png" height="30px" width="30px;" >
         <?php 
         }
         for($i=1;$i<=$mm;$i++)
         {
         ?>
         <img src="images/Star-Full1.png" height="30px" width="30px;" >
         <?php 
         }
         ?>
     </span>
    
          <ul class="cbp_tmtimeline">
      <?php
	  while($x3=mysql_fetch_array($x1))
	  {
		$x2=mysql_fetch_array(mysql_query("select * from stu_reg where session='$x3[session]'"));
	  ?>
        <li>
          <time class="cbp_tmtime"> <span style="font-size:30px;"></span></time>
          <div class="cbp_tmicon cbp_tmicon-phone"></div>
          <div class="cbp_tmlabel">
            <h2>Name:<?php echo ucwords($x2['name']); ?></h2>
            <p style="text-decoration:underline;">Feedback:</p>
			<p><?php  echo $x3['comments'];?></p>
          </div>
        </li>
		<?php
		} 
		?>
        
      </ul>	
	</div>

	
