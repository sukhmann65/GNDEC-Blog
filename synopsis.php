<script src="user forms/cat.js">
</script>
<?php
include_once("connection.php");
$id=$_REQUEST['id'];
$x5=mysql_fetch_array(mysql_query("select * from stu_reg where session='$_SESSION[student]' and status='1'"));
$y=mysql_fetch_array(mysql_query("select * from synopsis where sno='$id' and status='1'"));
$path="user forms/files/".$y['file'];
?>
<div class="cl-mcont">
<div class="col-md-12">
      
        <div class="block-flat">
          <div class="header">							
            <h3>Upload Synopsis</h3>
          </div>
          <div class="content">
              <form class="form-horizontal group-border-dashed" action="<?php if($id) { echo 'user_update.php'; } else { echo 'user_insert.php'; }?>" method="post" enctype="multipart/form-data">
              
			  <div class="form-group">
                <label class="col-sm-3 control-label"></label>
                <div class="col-sm-9" style="text-align:right;">
                <label>Fields marked with asterisk (<span style="color:#cc0000;">*</span>) are mandatory.</label>
                </div>
              </div>
			  
              <div class="form-group">
                <label class="col-sm-3 control-label">Name</label>
                <div class="col-sm-6">
                  <input type="text" name="name" value="<?php echo $x5['name'];?>" class="form-control" readonly />
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-3 control-label">Training<span style="color:#cc0000;">*</span></label>
                <div class="col-sm-6">
                <?php
				if($id)
				{
					$i=mysql_fetch_array(mysql_query("select * from training where sno='$y[training]'"));?>
                    <input type="text" name="trn" class="form-control" value="<?php echo $i['type'];?>" readonly  />
                <?php
				}
				else
				{
				?>
                  <select class="form-control <?php if($_SESSION['talert']){echo "parsley-error";}?>" name="trn"  onchange="cats(this.value,'ajx_pname1','display_pnam')" >
                    <option selected disabled>Select Your Training Type</option>
                    <?php
					
					$x=mysql_query("select * from std_trn where status='1' and session='$_SESSION[student]' ORDER by training");
					while($x1=mysql_fetch_array($x))
					{
						$x2=mysql_query("select * from training where status='1' and sno='$x1[training]'");
						while($x3=mysql_fetch_array($x2))
					{
					?>
					<option value="<?php echo $x3['sno']; ?>"><?php echo $x3['type']; ?></option>
					<?php
					}
					}
					}
					?>
                  </select>
                  <span style="color:#cc0000; font-size:13px; font-weight:200; line-height:21px; box-sizing:border-box; font-family:'Open Sans', sans-serif;">	
                  <?php
                                    if($_SESSION['talert'])
                                    {
                                        echo $_SESSION['talert'];
                                        unset($_SESSION['talert']);
                                    }
                  ?>
                  </span>		  								
                </div>
              </div>
              
              
              <div class="form-group" >
                <label class="col-sm-3 control-label">Project Name<span style="color:#cc0000;">*</span></label>
                <div class="col-sm-6" id="display_pnam">
                <?php
				if($id)
				{
					$j=mysql_fetch_array(mysql_query("select * from proj_detail where sno='$y[pname]' and status='1'")); ?>
					<input type="text" name="proj" class="form-control" value="<?php echo $j['pr_name'];?>" readonly  />
                    <?php
				}
				else
				{

				?>
                  <select class="form-control <?php if($_SESSION['palert']){echo "parsley-error";}?>" name="proj" readonly>
                    <option selected disabled>Select your project name</option>
                     <?php
					$y=mysql_query("select * from proj_detail where status='1' and session='$_SESSION[student]' ORDER by pr_name");
					while($y1=mysql_fetch_array($y))
					{
					?>
				
					<?php
					} }
					?>
         
                  </select>
                  <span style="color:#cc0000; font-size:13px; font-weight:200; line-height:21px; box-sizing:border-box; font-family:'Open Sans', sans-serif;">
                  <?php
                                    if($_SESSION['palert'])
                                    {
                                        echo $_SESSION['palert'];
                                        unset($_SESSION['palert']);
                                    }
                  ?>
				  </span>							
                </div>
              </div>
              

              <div class="form-group">
                <label class="col-sm-3 control-label">Guide<span style="color:#cc0000;">*</span></label>
                <div class="col-sm-6" id="display_gname">
                <?php
				if($id)
				{
					?>
					<input type="text" name="guide" class="form-control" value="<?php echo $y['guide'];?>" readonly/>
                    <?php }
					else
					{
				?>
                  <input type="text" name="guide" class="form-control <?php if($_SESSION['galert']){echo "parsley-error";}?>" readonly /> 
				  <?php 
				  }
				  ?>
                  <span style="color:#cc0000; font-size:13px; font-weight:200; line-height:21px; box-sizing:border-box; font-family:'Open Sans', sans-serif;">
                  <?php
                                    if($_SESSION['galert'])
                                    {
                                        echo $_SESSION['galert'];
                                        unset($_SESSION['galert']);
                                    }
                  ?>
                  </span>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-3 control-label">Upload File<span style="color:#cc0000;">*</span></label>
                <div class="col-sm-6">
                  <input type="file" name="file" class="form-control <?php if($_SESSION['falert']){echo "parsley-error";}?>" />
                  <?php if($id)
				  {
				  	echo $y['file'];
				  }
				  ?>
                  <span style="color:#cc0000; font-size:13px; font-weight:200; line-height:21px; box-sizing:border-box; font-family:'Open Sans', sans-serif;">
                  <?php														
                  	if($_SESSION['falert'])
                    {
                    	echo $_SESSION['falert'];
                        unset($_SESSION['falert']);
                    }
                  ?>
                  </span>
                </div>
                <span style="color:red;">Upload zip or rar file.</span>
              </div>
                                    
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="hidden" name="h1" value="synopsis">
                  <input type="hidden" name="h2" value="<?php echo $id; ?>">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button class="btn btn-default"><a href="user_clear.php?k=synp">Cancel</a></button>
                </div>
              </div>
            </form>
          </div>
        </div>
        
      </div>
      <?php include_once("user tables/tsynopsis.php"); ?>
    </div>	
