<?php
include_once("connection.php");
if($_SESSION['student'])
{
$x=mysql_query("select * from code where status='1' and session='$_SESSION[student]'");
}
else
{
$x=mysql_query("select * from code where status='1'");	
}
?>
			<div class="row">
				<div class="col-md-12">
					<div class="block-flat">
						<div class="header">							
							<h3>Synopsis Record</h3>
						</div>
						<div class="content">
							<div class="table-responsive">
								<table class="table table-bordered" id="datatable" >
									<thead>
										<tr>
											<th>S.No.</th>
                                            <th>Name</th>
											<th>Training</th>
                                            <th>Project Name</th>
                                            <th>Guide</th>
                                            <th>File</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
                                    <?php
									$i=1;
									while($x1=mysql_fetch_array($x))
									{
										$x2=mysql_fetch_array(mysql_query("select * from training where sno='$x1[training]' and status='1'"));
										$x3=mysql_fetch_array(mysql_query("select * from proj_detail where sno='$x1[pname]' and status='1'"));
									?>
									
										<tr class="odd gradeX">
											<td>
                                            <?php
											echo $i;
											?>
											</td>
                                            <td>
                                            <?php
											echo ucwords($x1['name']);
											?>
											</td>
                                            <td>
                                            <?php
											echo $x2['type'];
											?>
											</td>
                                            <td>
                                            <?php
											echo ucwords($x3['pr_name']);
											?>
											</td>
                                            <td>
                                            <?php
											echo ucwords($x1['guide']);
											?>
											</td>
                                            <td>
                                            <a href="download2.php?k1=<?php echo $x1['file'];?>">
                                            <?php
											echo $x1['file'];
											?>
                                            </a>
											</td>
											<td class="center">
                                            <a href="index.php?k1=code&id=<?php echo $x1['sno']; ?>"><button type="button" class="btn btn-primary btn-rad btn-trans">Edit</button></a>
                                            <a href="user_delete.php?k1=code&id=<?php echo $x1['sno']; ?>"><button type="button" class="btn btn-primary btn-rad btn-trans">Delete</button></a>
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