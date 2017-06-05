<?php
include_once("connection.php");
function limit_words($string, $word_limit)
{
    $words = explode(" ",$string);
    return implode(" ",array_splice($words,0,$word_limit));
}
 
?>
    <div class="cl-mcont">		
			<div class="row">
				
        <div class="col-sm-6 col-md-6 col-lg-6">
        
<!--------------------------------------------------News----------------------------------------->			

					<div class="panel-group accordion accordion-semi" id="accordion3">  
					  <div class="panel panel-default" style="border:1px solid #7761a7;"><h3 class="news" style="text-align:center; padding:5px" >Latest News</h3>
                      <?php
					  $m=mysql_query("select * from news where status='1'");
			  		  while($m1=mysql_fetch_array($m))
			  		  {
		      		  ?>
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion3" href="#ac3-<?php echo $m1['sno']; ?>">
                    <i class="fa fa-angle-right"></i>
                    <?php
				  echo ucwords($m1['news_head']);
				  ?>
                  </a>
                </h4>
              </div>
              <div id="ac3-<?php echo $m1['sno']; ?>" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
				echo ucwords(limit_words($m1['news_detail'],30));
				?>
                <a href="index.php?k1=read_news&k2=<?php echo $m1['sno']?>" style="text-decoration:underline">Read More</a></div>
              </div>
              <?php 
			  	}
			  	?>
					  </div>
					</div>	
					
				</div>
				
 <!----------------------------------Placed Students-------------------------------------->  	

					<div class="panel-group accordion accordion-semi" id="accordion4">
					  <div class="panel panel-default" style="border:1px solid #7761a7;"><h3 class="news" style="text-align:center; padding:5px">Placed Students</h3>
                      <?php
					  $u=0;
					  $n=mysql_query("select * from placed_std where status='1' group by c_name");
			  		  while($n1=mysql_fetch_array($n))
			  		  {
						  if($u==0)
						  $count=$n1['c_name'];
						  $n2=mysql_fetch_array(mysql_query("select * from batch where sno='$n1[batch]' and status='1'"));
		      		  ?>
                      <?php
				  if($u==0 || $count!=$n1['c_name'])
				  {
					  ?>
              <div class="panel-heading warning">
                <h4 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion4" href="#ac4-<?php echo $n1['sno']; ?>">
                  <i class="fa fa-angle-right"></i> 
                  <?php
				  echo ucwords($n1['c_name']);
				  ?>
                </a>
                </h4>
              </div>
              <?php 
				  }
				  ?>
              <div id="ac4-<?php echo $n1['sno']; ?>" class="panel-collapse collapse">
                <div class="panel-body">
                <?php
					  $k=mysql_query("select * from placed_std where c_name='$n1[c_name]' and status='1'");
			  		  while($k1=mysql_fetch_array($k))
					  {
						  $k2=mysql_fetch_array(mysql_query("select * from batch where sno='$k1[batch]' and status='1'"));
						  $path="user forms/files/".$k1['file'];
					?>
					Batch:<?php echo $k2['batch'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a style="color:black;" href="view.php?k1=<?php echo $path;?>">(View)</a>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a style="color:black;" href="download2.php?k1=<?php echo $k1['file'];?>">(Download)</a> <br>
					<?php
				
					  }
					  ?>
                </div>
              </div>
              <?php
			  $u++; 
			  	}
			  	?>
					  </div>
					</div>		
				</div>
			
      </div>