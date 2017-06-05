<?php
include_once("connection.php");
if($_SESSION['student'])
{
$x=mysql_query("select * from blog where status='1' and session='$_SESSION[student]'");
}
else
{
$x=mysql_query("select * from blog where status='1'");	
}
?>
			<div class="row">
				<div class="col-md-12"> 
					<div class="block-flat">
						<div class="header">							
							<h3>Blog Record</h3>
						</div>
						<div class="content">
							<div class="table-responsive">
					<!---<input type="text" placeholder="Search" style="padding: 6px 12px; border:1px solid #cccccc; box-sizing: border-box; height:34px; width:153px; float:right;">--->
								<table class="table table-bordered" id="datatable" >
									<thead>
										<tr>
											<th>S.No.</th>
											<th>Training Type</th>
                                            <th>Project Name</th>
                                            <th>Topic</th>
                                            <th>Description</th>
                                            <th>File</th>
                                            <th>Date</th>
                                            <th>Comments</th>                                            
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
                                    <?php
									$i=1;
									while($x1=mysql_fetch_array($x))
									{
										$x2=mysql_fetch_array(mysql_query("select * from training where sno='$x1[training]' and status='1'"));
										$x3=mysql_fetch_array(mysql_query("select * from proj_detail where sno='$x1[project]' and status='1'"));
										$newDate = date("d/m/Y", strtotime($x1[date]));
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
											echo ucwords($x3['pr_name']);
											?>
											</td>
                                            <td>
											<?php
											echo ucwords($x1['topic']);
											?>
											</td>
                                            <td>
											<?php
											echo ucwords($x1['des']);
											?>
											</td>
                                            <td>
                                            <a href="download1.php?k1=<?php echo $x1['file'];?>">
                                            <?php
											echo $x1['file'];
											?>
                                            </a>
											</td>
                                            <td>
											<?php
											echo $newDate;
											?>
											</td>
                                            <td>
											<?php
											echo $x1['comments'];
											?>
											</td>
											<td class="center">
                                            <?php
											if($_SESSION['student'])
											{
											?>
                                            <a href="index.php?k1=blog&id=<?php echo $x1['sno']; ?>"><button type="button" class="btn btn-primary btn-rad btn-trans">Edit</button></a>
                                            <?php
											}
											?>
                                            <a href="user_delete.php?k1=blog&id=<?php echo $x1['sno']; ?>"><button type="button" class="btn btn-primary btn-rad btn-trans">Delete</button></a></td>
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