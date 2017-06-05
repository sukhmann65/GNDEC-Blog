<?php
include_once("connection.php");
$batch=$_REQUEST['k2'];
$trn=$_REQUEST['k3'];

$i1=mysql_fetch_array(mysql_query("select * from training where sno='$trn' and status='1'"));

?>
<div class="cl-mcont">
			<div class="row">
				<div class="col-md-12">
					<div class="block-flat">
						<div class="header">							
							<h3>Students Record</h3>
						</div>
						<div class="content">
							<div class="table-responsive">
								<table class="table table-bordered" id="datatable" >
									<thead>
										<tr>
											<th >S.No.</th>
                                            <th >University Roll No.</th>
                                            <th >Student Name</th>
                                            <th >Branch</th>
                                            <th >Course Opted For</th>
                                            <th >Company Name</th>
                                            <th >Synopsis Details</th>
										</tr>
									</thead>
									<tbody>
                                    <?php
									$i=1;
									$a=mysql_fetch_array(mysql_query("select * from guide_details where email='$_SESSION[teacher]' and status='1'"));
									if($_SESSION['teacher'])
									{
										
                                    $z=mysql_query("select * from std_trn where batch='$batch' and training='$i1[sno]' and guide='$a[sno]' and status='1'");
									
									}
									
									else
									{
										$z=mysql_query("select * from std_trn where batch='$batch' and training='$i1[sno]' and status='1'");
									}
									while($z1=mysql_fetch_array($z))
									{
										$z2=mysql_query("select * from stu_reg where session='$z1[email]' and status='1'");
										while($z3=mysql_fetch_array($z2))
										{
									
											$z4=mysql_fetch_array(mysql_query("select * from course where sno='$z1[course]' and status='1'"));
											$y=mysql_fetch_array(mysql_query("select * from synopsis where session='$z3[email]' and status='1'"));
											$y1=mysql_query("select * from synopsis where session='$z3[email]' and status='1'");
									?>

        
                                    
										<tr class="odd gradeX">
											<td>
                                            <?php
											
											echo $i;
											?>
											</td>
											<td>
                                            <?php
											
											echo $z3['univ_rollno'];
											?>
											</td>
                                            <td>
                                            <?php
											echo ucwords($z3['name']);
											?>
											</td>
                                            <td>
                                            <?php
											echo $z3['branch'];
											?>
                                            </td>
                                            <td>
                                            <?php
											echo ucwords($z4['course']);
											?>
                                            </td>
                                            <td>
                                            <?php
											echo ucwords($z1['c_name']);
											?>
                                            </td>
                                            <td class="center">
                                            <?php if(mysql_num_rows($y1)>0)
											{?>
                                            <a href="download.php?k1=<?php echo $y['file'];?>"><button type="button" class="btn btn-primary btn-rad">Synopsis</button></a>
											<?php }
											else
											{
											?>
                                            <button type="button" class="btn btn-info btn-rad">No Synopsis</button>	
                                            <?php    
											}
											?>
                                            
                                            </td>
                                        </tr>
									
                                    <?php
									$i++;
									}
									}
									?>
									</tbody>
       
								</table>							
							</div>
						</div>
					</div>				
				</div>
			</div>
</div>