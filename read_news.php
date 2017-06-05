<?php
include_once("connection.php");
$k2=$_REQUEST['k2'];
$x=mysql_fetch_array(mysql_query("select * from news where status='1' and sno='$k2'"));
$path="form/img/".$x['image'];
?>
<div class="cl-mcont">
<h3 style="text-align:center; font-family:Times New Roman; font-size:30px;"><?php echo ucwords($x['news_head']); ?></h3>
	<div style="margin-top:30px; font-style:italic;"><pre style="font-size:16px;"><?php echo $x['news_detail']; ?></pre> </div>
</div>