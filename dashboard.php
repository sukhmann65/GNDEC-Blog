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


<!----------Complete profile----------------------------------->
      
           
    	<div class="col-lg-12 pull-left">
        <?php
			if($_SESSION['student'] && $_SESSION['profile'])
			{
		?> 
    <div class="block-flat">
                    
                       
						<div class="header">							
							<h3 style="font-weight:bolder; color:black;">For proceeding further</h3>
						</div>
						<div class="content">
							<p> 
                             <?php  echo $_SESSION['profile'];
                 			 ?>
                             <a href='index.php?k1=stureg'>
							 <button type="button" class="btn btn-primary btn-rad">Click Here</button>
                             </a>				
                            </p>
						</div>
					</div>
							<?php 
							}
							?>		
				</div>	
 <!-----------------------complete profile end--------->   
    
        
<!--------------------------------------------------News----------------------------------------->	

 			<div class="col-sm-6 col-md-6 col-lg-6">		

					<div class="panel-group accordion accordion-semi" id="accordion3" >  
					  <div class="panel panel-default" style="border:1px solid #7761a7; "><h3 class="news" style="text-align:center; padding:5px;">Latest News</h3>
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
					  <div class="panel panel-default" style="border:1px solid #7761a7;"><h3 class="news" style="text-align:center; padding:5px;">Placed Students</h3>
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
                <div class="panel-body" >
                <?php
					  $k=mysql_query("select * from placed_std where c_name='$n1[c_name]' and status='1'");
			  		  while($k1=mysql_fetch_array($k))
					  {
						  $k2=mysql_fetch_array(mysql_query("select * from batch where sno='$k1[batch]' and status='1'"));
						  $path="form/img/".$k1['file'];
					?>
					Batch:<?php echo $k2['batch'];?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="view.php?k1=<?php echo $path;?>">(View)</a>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="download2.php?k1=<?php echo $k1['file'];?>">(Download)</a>
                    <br>
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
	 
<!--------------------------------------------Company Rating--------------------->	
    <div class="col-md-12">
					<div class="block-flat">
						<div class="header">							
							<h3>Company Rating</h3>
						</div>
						<div class="content">
							<div class="table-responsive">
								<table class="table table-bordered" id="datatable">
									<thead>
										<tr>
											<th>Batch</th>
                                            <th>Company Name</th>
                                            <th>Rating</th>
											<th>Feedback</th>
										</tr>
									</thead>
                                    <?php
								    $bat=mysql_query("select * from batch where status='1'");
while($batch=mysql_fetch_array($bat))
{

									$c=mysql_query("select * from company where status='1'");
									while($c_name=mysql_fetch_array($c))
									{
										$x=0;
										$r=mysql_query("select * from rating where c_name='$c_name[c_name]' and batch='$batch[sno]' and status='1'");
										
										$count=mysql_num_rows($r);
										if($count>0)
										{
											while($r_name=mysql_fetch_array($r))
											{
												$x+=$r_name['c_rating'];
												$c_nm=$r_name['c_name'];
												$tt=$r_name['sno'];
											}
											    $tot=$count*5;
												$avg=($x/$tot)*100;
												$star=round(5*($avg/100));
												$mm=5-$star;
												?>
									<tbody>
										<tr class="odd gradeX">
											<td>
                                            <?php
											echo $batch['batch'];
											?>
											</td>
											<td>
                                            <?php
											echo ucwords($c_nm);
											?>
											</td>
                                            <td>
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
                                                </td>
											<td class="center">
											<a href="index.php?k1=compny_feedback&k3=<?php echo $c_name['c_name'];?>&k4=<?php echo $batch['sno'];?>&s1=<?php echo $star;?>&s3=<?php echo $mm;?> ">
											<button type="button" class="btn btn-primary btn-rad">View</button>
											</a>
											</td>
											
										</tr>

                                                <?php
										}
									}}
												?>
									</tbody>
								</table>							
							</div>
						</div>
					</div>				
				</div>
                
                				
