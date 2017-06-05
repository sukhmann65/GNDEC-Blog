<?php
include_once("connection.php");
$x=mysql_fetch_array(mysql_query("select * from stu_reg where session='$_SESSION[student]' and status='1'"));
$x1=mysql_fetch_array(mysql_query("select * from batch where sno='$x[batch]' and status='1'"));
$id=$_REQUEST['id'];
$y=mysql_fetch_array(mysql_query("select * from std_trn where sno='$id' and status='1'"));
?>
<div class="cl-mcont">
<div class="col-md-12">
      
        <div class="block-flat">
          <div class="header">							
            <h3>Student Training Information</h3>
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
                <label class="col-sm-3 control-label">Name</label>
                <div class="col-sm-6">
                  <input type="text" name="name" value="<?php echo $x['name'];?>" class="form-control" readonly />
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-3 control-label">E-Mail</label>
                <div class="col-sm-6">
                  <input type="email" name="email" class="form-control" value="<?php echo $x['email'];?>"required parsley-type="email" readonly />
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-3 control-label">Batch</label>
                <div class="col-sm-6">
                  <input type="text" name="batch" class="form-control" value="<?php echo $x1['batch'];?>" readonly />
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-3 control-label">Training Type<span style="color:#cc0000;">*</span></label>
                <div class="col-sm-6">
                    <?php
					if($id)
					{
						$i=mysql_fetch_array(mysql_query("select * from training where sno='$y[training]' and status='1'"));?>
                    <input type="text" name="trn" class="form-control" value="<?php echo $i['type'];?>" readonly  />
					<?php }
					else
					{?>
                    <select class="form-control" name="trn" required>
                    <option selected disabled>Select</option>
                    <?php
					$z=mysql_query("select * from training where status='1' ORDER by type" );
					while($z1=mysql_fetch_array($z))
					{					
					?>
					<option value="<?php echo $z1['sno']?>"><?php echo $z1['type']?></option>
					<?php
                    }
					}
					?>
                  </select>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-3 control-label">Course<span style="color:#cc0000;">*</span></label>
                <div class="col-sm-6">
                  <select class="form-control" name="course" required>
                    <option selected disabled>Select Your Course</option>
                    <?php
					$z=mysql_query("select * from course where status='1' ORDER by course");
					while($z1=mysql_fetch_array($z))
					{					
						echo "<option value='$z1[sno]'";
						if($z1['sno']==$y['course'])
						{
							echo "selected='selected'";
						}
						echo ">$z1[course]</option>";
					}
					?>
                  </select>			  								
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-3 control-label">Guide<span style="color:#cc0000;">*</span></label>
                <div class="col-sm-6">
                  <select class="form-control" name="guide" required>
                    <option selected disabled>Select Guide Name</option> 
                     <?php
					 $u=mysql_query("select * from guide where status='1' ORDER by name");
					 while($u1=mysql_fetch_array($u))
					{				
					echo "<option value='$u1[sno]'";
					if($u1['sno']==$y['guide'])
					{
						echo "selected='selected'";
					}
					
					echo ">$u1[name]</option>";
						}
					?>
                  </select>
                </div>
              </div>
          
         <div class="form-group">
                <label  class="col-sm-3 control-label">Company Name<span style="color:#cc0000;">*</span></label>
                <div class="col-sm-6">
                
                <input list="browsers" name="c_name" class="form-control">
                
<datalist id="browsers">
 <?php
					$b=mysql_query("select * from company where status='1'");
					while($b1=mysql_fetch_array($b))
					{		
					
						echo "<option value='$b1[c_name]'";
						if($b1['c_name']==$y['c_name'])
						{
							echo "selected='selected'";
						}
						echo ">$b1[c_name]</option>";
					}
					?>
</datalist>
                
                
                
                
                
                
                    
                   
                </div>
              </div>
            
     <?php /***     <div class="form-group">
                <label class="col-sm-3 control-label">Company Address<span style="color:#cc0000;">*</span></label>
                <div class="col-sm-6">
                  <textarea class="form-control" name="c_add" required><?php echo $y['c_add'];?></textarea>
                </div>
            </div>  */ ?>
            
            <div class="form-group">
                <label class="col-sm-3 control-label">Concerned Person<span style="color:#cc0000;">*</span></label>
                <div class="col-sm-6">
                  <input type="text" name="c_person" class="form-control" value="<?php echo $y['conc_person'];?>" required />
                </div>
              </div>
              
               <div class="form-group">
                <label class="col-sm-3 control-label">Concerned Person No.<span style="color:#cc0000;">*</span></label>
                <div class="col-sm-6">
                  <input parsley-type="phone" name="c_num" type="text" class="form-control" value="<?php echo $y['conc_no'];?>" required />
                </div>
              </div>  
			  
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="hidden" name="h1" value="type">
                  <input type="hidden" name="h2" value="<?php echo $id; ?>">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button class="btn btn-default"><a href="user_clear.php?k=type">Cancel</a></button>
                </div>
              </div>
            </form>
          </div>
        </div>
        
      </div>
     <?php include_once("user tables/tstd_trn.php");?>  
</div>	
