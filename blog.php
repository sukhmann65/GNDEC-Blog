<?php
$id=$_REQUEST['id'];
$x=mysql_fetch_array(mysql_query("select * from stu_reg where session='$_SESSION[student]' and status='1'"));
$y=mysql_fetch_array(mysql_query("select * from blog where sno='$id' and status='1'"));
$path="user forms/files/".$y['file'];
?>
<div class="cl-mcont">
<div class="col-md-12">
      
        <div class="block-flat">
          <div class="header">							
            <h3>Blog</h3>
          </div>
          <div class="content">
              <form class="form-horizontal group-border-dashed" action="<?php if($id) { echo 'user_update.php'; } else { echo 'user_insert.php'; }?>" parsley-validate novalidate method="post" enctype="multipart/form-data">
              
			  <div class="form-group">
                <label class="col-sm-3 control-label"></label>
                <div class="col-sm-9" style="text-align:right;">
                <label>Fields marked with asterisk (<span style="color:#cc0000;">*</span>) are mandatory.</label>
                </div>
              </div>
			  
              <div class="form-group">
                <label class="col-sm-3 control-label">Name</label>
                <div class="col-sm-6">
                  <input type="text" name="name" value="<?php echo $x['name'];?>" class="form-control" readonly />
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-3 control-label">Training<span style="color:#cc0000;">*</span></label>
                <div class="col-sm-6">
                  <select class="form-control" name="trn" required>
                    <option selected disabled>Select Your Training Type</option>
                     <?php
					 $x=mysql_query("select * from std_trn where status='1' and session='$_SESSION[student]' ORDER by training");
						while($x1=mysql_fetch_array($x))
						{
							$x2=mysql_query("select * from training where status='1' and sno='$x1[training]'");
							while($x3=mysql_fetch_array($x2))
							{					
								echo "<option value='$x3[sno]'";
								if($x3['sno']==$y['training'])
								{
									echo "selected='selected'";
								}
								echo ">$x3[type]</option>";
							}
						}
					?>
                             
                  </select>
				  								
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-3 control-label">Project</label>
                <div class="col-sm-6">
                  <select class="form-control" name="proj" >
                    <option selected disabled>Select</option>
                     <?php
					$x=mysql_query("select * from proj_detail where status='1' and session='$_SESSION[student]' ORDER by pr_name");
					while($x1=mysql_fetch_array($x))
					{					
					echo "<option value='$x1[sno]'";
					if($x1['sno']==$y['project'])
					{
						echo "selected='selected'";
					}
					
					echo ">$x1[pr_name]</option>";
						}
					?>
         
                  </select>
				  								
                </div>
              </div>
               
               <div class="form-group">
                <label class="col-sm-3 control-label">Topic<span style="color:#cc0000;">*</span></label>
                <div class="col-sm-6">
                  <input type="text" name="topic" class="form-control" value="<?php echo $y['topic'];?>" required />
                </div>
              </div>
              
               <div class="form-group">
                <label class="col-sm-3 control-label">Description<span style="color:#cc0000;">*</span></label>
                <div class="col-sm-6">
                  <textarea class="form-control" name="des" required><?php echo $y['des'];?></textarea>
                </div>
            </div>
            
               <div class="form-group">
                <label class="col-sm-3 control-label">Upload File</label>
                <div class="col-sm-6">
                  <input type="file" name="file" class="form-control" required/>
                  <?php if($id)
				  {
				  	echo $y['file'];
				  }
				  ?>
                  <span style="color:#cc0000; font-size:13px; font-weight:200; line-height:21px; box-sizing:border-box; font-family:'Open Sans', sans-serif;"><?php
                                    if($_SESSION['falert'])
                                    {
                                        echo $_SESSION['falert'];
                                        unset($_SESSION['falert']);
                                    }
                  ?></span>
                </div>(Upload zip or rar file.)
              </div>
              

              <div class="form-group">
                <label class="col-sm-3 control-label">Date<span style="color:#cc0000;">*</span></label>
                <div class="col-sm-6">
                  <input class="form-control" size="16" type="text" id="datepicker" name="date" value="<?php echo $y['date'];?>" required />
                </div> <!---<img src="user forms/calendar-blue.png" style="margin-top:5px;">--->
              </div> 

            <div class="form-group">
                <label class="col-sm-3 control-label">Comments</label>
                <div class="col-sm-6">
                  <textarea class="form-control" name="comm" ><?php echo $y['comments'];?></textarea>
                </div>
            </div>
            
          
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="hidden" name="h1" value="blogg">
                  <input type="hidden" name="h2" value="<?php echo $id; ?>">	
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button class="btn btn-default"><a href="user_clear.php?k=bl">Cancel</a></button>
                </div>
              </div>
            </form>
          </div>
        </div>
        
      </div>
      <?php include_once("user tables/tblog.php"); ?>
    </div>	
