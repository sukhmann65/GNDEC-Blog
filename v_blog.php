<head>
<link href="pagination/css/pagination.css" rel="stylesheet" type="text/css" />
	<link href="pagination/css/B_blue.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .records {
            width: 510px;
            margin: 5px;
            padding:2px 5px;
            border:1px solid #B6B6B6;
        }
        
        .record {
            color: #474747;
            margin: 5px 0;
            padding: 3px 5px;
        	background:#E6E6E6;  
            border: 1px solid #B6B6B6;
            cursor: pointer;
            letter-spacing: 2px;
        }
        .record:hover {
            background:#D3D2D2;
        }
        
        
        .round {
        	-moz-border-radius:8px;
        	-khtml-border-radius: 8px;
        	-webkit-border-radius: 8px;
        	border-radius:8px;    
        }    
        
        p.createdBy{
            padding:5px;
            width: 510px;
        	font-size:15px;
        	text-align:center;
        }
        p.createdBy a {color: #666666;text-decoration: none;}        
    </style>    

</head>
<?php
ob_start();
$tr=$_REQUEST['tr'];
/**
 * @link: http://www.Awcore.com/dev
 */
    //connect to the database
    include_once ('connection.php'); 
    //get the function
    include_once ('pagination/function.php');

    	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 5;
    	$startpoint = ($page * $limit) - $limit;
        
        //to make pagination
        $statement = "`blog` where `status` = 1 and `session`='$_SESSION[student]' and `training`='$tr'";
?>

<?php

include_once("connection.php");
 $x=mysql_query("SELECT * FROM {$statement}  LIMIT {$startpoint} , {$limit}");

//$x=mysql_query("select * from blog where training='$tr' and session='$_SESSION[student]' and status='1'");
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
      <div style="float:right;">
      <?php
	echo pagination($statement,$limit,$page);
?>
</div>
<div style="clear:both;"></div>
	</div>
<?php
}
else
{
?>
<div style="text-align:center; font-size:60px;; margin-top:230px; color:#7761a7;">
<button type="button" class="btn btn-primary btn-rad">No Blog Yet!</button>

<?php
	/*echo "No Blog"; */
?>
</div>
<?php	
}
?>
