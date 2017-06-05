<script src="user forms/cat.js">
</script>
<?php
$id=$_REQUEST['id'];
$y=mysql_fetch_array(mysql_query("select * from proj_detail where sno='$id' and status='1'"));
$x=mysql_fetch_array(mysql_query("select * from stu_reg where session='$_SESSION[student]' and status='1'"));
$x1=mysql_fetch_array(mysql_query("select * from batch where sno='$x[batch]' and status='1'"));
?>
<div class="cl-mcont">
<div class="col-md-12">
      
        <div class="block-flat">
          <div class="header">							
            <h3>Project Details</h3>
          </div>
          <div class="content">
		  
              <form class="form-horizontal group-border-dashed" action="<?php if($id) { echo 'user_update.php'; } else { echo 'user_insert.php'; } ?>" method="post" name="frm">
              
			  <div class="form-group">
                <label class="col-sm-3 control-label"></label>
                <div class="col-sm-9" style="text-align:right;">
                <label>Fields marked with asterisk (<span style="color:#cc0000;">*</span>) are mandatory.</label>
                </div>
              </div>
			  
              <div class="form-group">
                <label class="col-sm-3 control-label">Batch</label>
                <div class="col-sm-6">
                  <input type="text" name="batch" class="form-control" value="<?php echo $x1['batch'];?>" readonly />
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-3 control-label">Training<span style="color:#cc0000;">*</span></label>
                <div class="col-sm-6">
                  <select class="form-control <?php if($_SESSION['talert']){echo "parsley-error";}?>" name="tr" onchange="cats(this.value,'ajx_training','display_guide')">
                    <option selected disabled>Select Your Training Type</option>
                    <?php
					 	$x=mysql_query("select * from std_trn where status='1' and session='$_SESSION[student]' ORDER by training "); 
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

              <div class="form-group">
                <label class="col-sm-3 control-label">College Guide<span style="color:#cc0000;">*</span></label>
                <div class="col-sm-6" id="display_guide">
                <?php
				if($id)
				{
				/*	$i=mysql_fetch_array(mysql_query("select * from guide where sno='$y[guide]' and status='1'"));*/?>
                    <input type="text" name="guide" class="form-control" value="<?php echo $y['guide'];?>" readonly   />
					<?php }
					else
					{?>
                  <select class="form-control <?php if($_SESSION['galert']){echo "parsley-error";}?>" name="guide" required>
                    <option selected disabled >Select Guide Name</option>
                     <?php
					 $x=mysql_query("select * from guide where status='1' ORDER by name");
					 while($x1=mysql_fetch_array($x))
					{
					?>				
					<option value="<?php echo $x1['sno']; ?>"><?php echo ucwords($x1['name']); ?></option>
					<?php
					}}
					?>
                  </select>
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
                <label class="col-sm-3 control-label">Project Name</span></label>
                <div class="col-sm-6">
                  <input type="text" name="pname" class="form-control value="<?php echo $y['pr_name'];?>" onKeyDown="kk();"  id="ss"/>
                  
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-3 control-label">Trainer Name</label>
                <div class="col-sm-6">
                  <input type="text" name="tname" class="form-control" value="<?php echo $y['tr_name'];?>" />
                </div>
              </div>
              
            <div class="form-group">
                <label class="col-sm-3 control-label">Project Description</label>
                <div class="col-sm-6">
                  <textarea class="form-control"  name="pdesc"><?php echo $y['pr_desc'];?></textarea>
                 
                </div>
            </div>
                      
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="hidden" name="h1" value="proj">
                  <input type="hidden" name="h2" value="<?php echo $id; ?>">                   	
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button class="btn btn-default"><a href="user_clear.php?k=pr">Cancel</a></button>
                </div>
              </div>
            </form>
          </div>
        </div>
        
      </div>
     <?php include_once("user tables/tprojdetails.php");?>  

    </div>	
<script language="javascript">
function kk()
{
	document.getElementById("ss").style.textTransform="capitalize";
}
</script>