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
							<h3>Students Project Record</h3>
						</div>
						<div class="content">
							<div class="table-responsive">
								<table class="table table-bordered" id="datatable" >
									<thead>
										<tr>
											<th>S. No.</th>
                                            <th>University Roll No.</th>
                                            <th>Student Name</th>
                                            <th>Branch</th>
                                            <th>Company Name</th>
                                            <th>Project Name</th>
										</tr>
									</thead>
									<tbody>
                                    <?php
									$i=1;
									$a=mysql_fetch_array(mysql_query("select * from guide_details where email='$_SESSION[teacher]' and status='1'"));
									if($_SESSION['teacher'])
									{
										$z2=mysql_query("select * from proj_detail where batch='$batch' and guide='$a[username]' and training='$i1[sno]' and status='1'");
									}
									else
									{
										$z2=mysql_query("select * from proj_detail where batch='$batch' and training='$i1[sno]' and status='1'");
									}
										while($z3=mysql_fetch_array($z2))
										{
											$z5=mysql_fetch_array(mysql_query("select * from stu_reg where session='$z3[session]' and status='1'"));
											$z6=mysql_fetch_array(mysql_query("select * from std_trn where session='$z3[session]' and status='1'"));
					
									?>

        
                                    
										<tr class="odd gradeX">
											<td>
											<?php
											echo $i;
											?>
											</td>
											<td>
                                            <?php
											echo $z5['univ_rollno'];
											?>
											</td>
                                            <td>
                                            <?php
											echo ucwords($z5['name']);
											?>
											</td>
                                            <td>
                                            <?php
											echo $z5['branch'];
											?>
                                            </td>
                                            <td>
                                            <?php
											echo ucwords($z6['c_name']);
											?>
                                            </td>
                                            <td>
                                            <?php
											echo ucwords($z3['pr_name']);
											?>
                                            </td>
                                        </tr>
									
                                    <?php
									$i++;
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