<?php
include_once("connection.php");
if($_SESSION['student'])
{
$x=mysql_query("select * from proj_detail where status='1' and session='$_SESSION[student]'");
}
else
{
	$x=mysql_query("select * from proj_detail where status='1'");

}
?>
			<div class="row">
				<div class="col-md-12">
					<div class="block-flat">
						<div class="header">							
							<h3>Project Details</h3>
                        </div>    						
						<div class="content">
                        	<div class="table-responsive">
								<table class="table table-bordered" id="datatable" >
									<thead>
										<tr>
											<th>S.No.</th>
											<th>Training Type</th>
                                            <th>Project Name</th>
                                            <th>College Guide</th>
                                            <th>Trainer Name</th>
                                            <th>Description</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
                                    <?php
									$i=1;
									while($x1=mysql_fetch_array($x))
									{
										$x2=mysql_fetch_array(mysql_query("select * from training where sno='$x1[training]' and status='1'"));
									?>

									
										<tr class="odd gradeX">
											<td>
											<?php
											echo $i;
											?>
											</td>
											<td>
											<?php
											echo $x2['type'];
											?>
											</td>
                                            <td>
											<?php
											echo ucwords($x1['pr_name']);
											?>
											</td>
                                            <td>
											<?php
											echo ucwords($x1['guide']);
											?>
											</td>
                                            <td>
											<?php
											echo ucwords($x1['tr_name']);
											?>
											</td>
                                            <td>
											<?php
											echo ucwords($x1['pr_desc']);
											?>
											</td>
											<td class="center">
                                            <?php
											if($_SESSION['student'])
											{
											?>
                                            <a href="index.php?k1=projdetails&id=<?php echo $x1['sno']; ?>"><button type="button" class="btn btn-primary btn-rad btn-trans">Edit</button></a>
                                            <?php
											}
											?>
                                            <a href="user_delete.php?k1=projdetails&id=<?php echo $x1['sno']; ?>"><button type="button" class="btn btn-primary btn-rad btn-trans">Delete</button></a></td>
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