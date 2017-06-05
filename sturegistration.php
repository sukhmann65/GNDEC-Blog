<?php
include_once("connection.php");
$id=$_REQUEST['id']; 
$j=mysql_fetch_array(mysql_query("select * from student_login where email='$_SESSION[student]' and status='1'"));
$y=mysql_fetch_array(mysql_query("select * from stu_reg where sno='$id' and status='1'"));
?>
<div class="cl-mcont">
<div class="col-md-12">
      
        <div class="block-flat">
          <div class="header">							
            <h3>Complete Your Profile</h3>
          </div>
          <div class="content">
              <form class="form-horizontal group-border-dashed" action="<?php if($id) { echo 'user_update.php'; } else { echo 'user_insert.php'; } ?>" parsley-validate novalidate method="post">
              
			  <div class="form-group">
                <label class="col-sm-3 control-label"></label>
                <div class="col-sm-9" style="text-align:right;">
                <label>Fields marked with asterisk (<span style="color:#cc0000;">*</span>) are mandatory.</label>
                </div>
              </div>
			  
              <div class="form-group">
                <label class="col-sm-3 control-label">College Roll No.<span style="color:#cc0000;">*</span></label>
                <div class="col-sm-6">
                  <input parsley-type="number" type="text" name="cno" class="form-control" value="<?php echo $y['colg_rollno'];?>" required />
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-3 control-label">University Roll No.<span style="color:#cc0000;">*</span></label>
                <div class="col-sm-6">
                  <input parsley-type="number" type="text" name="uno" class="form-control" value="<?php echo $y['univ_rollno'];?>" required />
                </div>
              </div>
              
               <div class="form-group">
                <label class="col-sm-3 control-label">Name<span style="color:#cc0000;">*</span></label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="name" value="<?php
				  if($id)
				  {
				  echo $y['name'];
				  
				  }
				  else
				  {
				  echo $j['name']; 
				  }
				  ?>"
				  
				  />
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-3 control-label">E-Mail<span style="color:#cc0000;">*</span></label>
                <div class="col-sm-6">
                  <input type="email" name="email" class="form-control" value="<?php echo $j['email'];?>" readonly parsley-type="email" />
                </div>
              </div>
              
               <div class="form-group">
                <label class="col-sm-3 control-label">Phone No.<span style="color:#cc0000;">*</span></label>
                <div class="col-sm-6">
                  <input parsley-type="phone" name="phno" type="text" class="form-control" value="<?php echo $j['phone']; ?>" readonly />
                </div>
              </div>
              
       
                
              <div class="form-group">
                <label class="col-sm-3 control-label">Select Entry Batch<span style="color:#cc0000;">*</span></label>
                <div class="col-sm-6">
                  <select class="form-control" name="batch" required>
                    <option selected disabled>Select Your Batch</option>
                     <?php
					 $x=mysql_query("select * from batch where status='1' ORDER by batch");
					 while($x1=mysql_fetch_array($x))
					{				
					echo "<option value='$x1[sno]'";
					if($x1['sno']==$y['batch'])
					{
						echo "selected='selected'";
					}
					
					echo ">$x1[batch]</option>";
						}
					?>
         
                  </select>
				  								
                </div>
              </div>
              
     <?php /*         <div class="form-group">
                <label class="col-sm-3 control-label">Guide<span style="color:#cc0000;">*</span></label>
                <div class="col-sm-6">
                  <select class="form-control" name="guide" required>
                    <option selected disabled>Select Guide Name</option> 
                     <?php
					 $x=mysql_query("select * from guide where status='1' ORDER by name");
					 while($x1=mysql_fetch_array($x))
					{				
					echo "<option value='$x1[sno]'";
					if($x1['sno']==$y['guide'])
					{
						echo "selected='selected'";
					}
					
					echo ">$x1[name]</option>";
						}
					?>
                            
                  </select>
				  								
                </div>
              </div> */ ?>
              
              
              
              
              <div class="form-group">
                <label class="col-sm-3 control-label">Branch<span style="color:#cc0000;">*</span></label>
                <div class="col-sm-6">
                  <select class="form-control" name="course" required>
				
				<option >Select</option>

                    <option <?php if($y['branch']==CSE){?> selected="selected"<?php }?>>CSE</option>
                    <option <?php if($y['branch']==IT){?> selected="selected"<?php }?>>IT</option>
                    <option <?php if($y['branch']==ECE){?> selected="selected"<?php }?>>ECE</option>
                    <option <?php if($y['branch']==EE){?> selected="selected"<?php }?>>EE</option>
                    <option <?php if($y['branch']==ME){?> selected="selected"<?php }?>>ME</option>
                    <option <?php if($y['branch']==CE){?> selected="selected"<?php }?>>CE</option>
                    <option <?php if($y['branch']==PE){?> selected="selected"<?php }?>>PE</option>


				
                  </select>									
                </div>
              </div>
              
              
              <?php /*
              <div class="form-group">
                <label class="col-sm-3 control-label">Course<span style="color:#cc0000;">*</span></label>
                <div class="col-sm-6">
                  <select class="form-control" name="course" required>
                    <option selected disabled>Select Your Course</option>
                     <?php
					$x=mysql_query("select * from course where status='1' ORDER by course");
					while($x1=mysql_fetch_array($x))
					{					
					echo "<option value='$x1[sno]'";
					if($x1['sno']==$y['course'])
					{
						echo "selected='selected'";
					}
					
					echo ">$x1[course]</option>";
						}
					?>
                             
                  </select>
				  								
                </div>
              </div>  */ ?>
              
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="hidden" name="h1" value="stureg">
                  <input type="hidden" name="h2" value="<?php echo $id; ?>">                                 	
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button class="btn btn-default"><a href="user_clear.php?k=stdreg">Cancel</a></button>
                </div>
              </div>
            </form>
          </div>
        </div>
        
      </div>
    </div>	
    
