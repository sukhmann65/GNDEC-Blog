<?php
include_once("connection.php");
$k2=$_REQUEST['k2'];
$x=mysql_query("select * from blog  where session='$k2' and status='1'");
?>
	<div class="cl-mcont">		
      <ul class="cbp_tmtimeline">
      <?php
	  while($x1=mysql_fetch_array($x))
	  {
		  $x2=mysql_fetch_array(mysql_query("select * from proj_detail where sno='$x1[project]' and status='1'"));
	  ?>
        <li>
          <time class="cbp_tmtime"> <span style="font-size:30px;"><?php echo $x1['date'];?></span></time>
          <div class="cbp_tmicon cbp_tmicon-phone"></div>
          <div class="cbp_tmlabel">
            <h2>Project: <?php echo $x2['pr_name']; ?>/ Topic: <?php echo $x1['topic']; ?></h2>
            <p><?php echo $x1['des']; ?> <br><br>
            <a style="color:white;" href="download1.php?k1=<?php echo $x1['file'];?>"> <?php echo $x1['file'];?></a>
            </p>
          </div>
        </li>
        <?php
		}
		?>
      </ul>	
	</div>
