<?php
ob_start();
include_once("connection.php");
$tr=$_REQUEST['tr'];
$dt=$_REQUEST['dt'];
$x=mysql_query("select * from blog where training='$tr' and date='$dt' and session='$_SESSION[student]' and status='1'");
if(mysql_num_rows($x))
{
?>	
	<div class="cl-mcont">		
      <ul class="cbp_tmtimeline">
      <?php
	  while($x1=mysql_fetch_array($x))
	  {
		  $x2=mysql_fetch_array(mysql_query("select * from proj_detail where sno='$x1[project]' and status='1'"));
		  
		$newDate = date("d-m-Y h:i:s", strtotime($x1[server_date]));
		$newDate1 = date("d-m-Y", strtotime($x1[date]));
		  
	  ?>
        <li>
          <time class="cbp_tmtime"> <span style="font-size:20px;"><?php echo $newDate; ?></span><span style="font-size:25px; margin-top:10px;"><?php echo $newDate1; ?></span></time>
          <div class="cbp_tmicon cbp_tmicon-phone"></div>
          <div class="cbp_tmlabel">
            <h2>Topic:<?php echo ucwords($x1['topic']); ?>
            <?php if($x2['pr_name']!="") { ?>
            / Project:<?php echo ucwords($x2['pr_name']); } ?>
            </h2>
            <p><?php echo ucwords($x1['des']); ?></p><br>
			<?php echo $x1['file']; ?>&nbsp;&nbsp;&nbsp;&nbsp;
             <?php if($x1['file']!=""){?> 
            <a style="color:white;" href="download1.php?k1=<?php echo $x1['file'];?>">(Download)</a>
            <?php } ?>
          </div>
        </li>
        <?php
		} 
		?>
      </ul>	
	</div>
<?php
}
else
{
?>
<div style="text-align:center; font-size:60px;; margin-top:230px; color:#7761a7;">
<button type="button" class="btnn btn-primary btn-rad" >No record!</button>
</div>
<?php	
}
?>