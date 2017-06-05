<?php
include_once("connection.php");
if($_SESSION['student'])
{
$x=mysql_query("select * from std_trn where status='1' and session='$_SESSION[student]'");
}
else
{
	$x=mysql_query("select * from std_trn where status='1'");

}
?>
			<div class="row">
				<div class="col-md-12">
					<div class="block-flat">
						<div class="header">							
							<h3>Student Training</h3>
						</div>
						<div class="content">
							<div class="table-responsive">
								<table class="table table-bordered" id="datatable" >
									<thead>
										<tr>
                                            <th>Name</th>
                                            <th>Batch</th>
											<th>Training Type</th>
                                            <th>Course</th>
                                            <th>Guide</th>
                                            <th>Company Name</th>
                                            <th>Concerned Person</th>
                                            <th>Concerned Person No.</th>
                                            <th>Action</th>
										</tr>
									</thead>
									<tbody>
                                    <?php
									while($x1=mysql_fetch_array($x))
									{
										$x2=mysql_fetch_array(mysql_query("select * from training where sno='$x1[training]' and status='1'"));
										$x3=mysql_fetch_array(mysql_query("select * from batch where sno='$x1[batch]' and status='1'"));
										$x4=mysql_fetch_array(mysql_query("select * from course where sno='$x1[course]' and status='1'"));
										$x5=mysql_fetch_array(mysql_query("select * from guide where sno='$x1[guide]' and status='1'"));
										$x6=mysql_fetch_array(mysql_query("select * from company where sno='$x1[c_name]' and status='1'"));
										
									?>

									
										<tr class="odd gradeX">
											<td>
											<?php
											echo ucwords($x1['name']);
											?>
											</td>
                                            <td>
											<?php
											echo $x3['batch'];
											?>
											</td>
                                            <td>
											<?php
											echo ucwords($x2['type']);
											?>
											</td>
                                            <td>
											<?php
											echo ucwords($x4['course']);
											?>
											</td>
                                            <td>
											<?php
											echo ucwords($x5['name']);
											?>
											</td>
                                            <td>
											<?php
											echo ucwords($x1['c_name']);
											?>
											</td>
                                            <td>
											<?php
											echo ucwords($x1['conc_person']);
											?>
											</td>
                                            <td>
											<?php
											echo $x1['conc_no'];
											?>
											</td>
											<td class="center">
                                             <?php
											if($_SESSION['student'])
											{
											?>
                                            <a href="index.php?k1=trn_type&id=<?php echo $x1['sno']; ?>"><button type="button" class="btn btn-primary btn-rad btn-trans">Edit</button></a>
                                            <?php
											}
											?>
                                            <a href="user_delete.php?k1=trn_type&id=<?php echo $x1['sno']; ?>"><button type="button" class="btn btn-primary btn-rad btn-trans">Delete</button></a></td>
										</tr>
									
                                    <?php
									
									}
									?>
									</tbody>

								</table>							
							</div>
						</div>
					</div>				
				</div>
			</div>