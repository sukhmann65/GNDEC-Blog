<?php
include_once("connection.php");
?>
<div class="cl-mcont">
<div class="col-md-12">
      
        <div class="block-flat">
          <div class="header">							
            <h3>Select Batch and Training</h3>
          </div>
          <div class="content"><span style="margin-left:650px;">Fields marked with asterisk (<span style="color:#cc0000;">*</span>) are mandatory.</span>
              <form class="form-horizontal group-border-dashed" action="guide_forms/alert.php" parsley-validate novalidate method="post">
              
              <div class="form-group">
                <label class="col-sm-3 control-label">Batch<span style="color:#cc0000;">*</span></label>
                <div class="col-sm-6">
                  <select class="form-control" name="batch" required>
                    <option selected disabled>Select</option>
                    <?php
					$x=mysql_query("select * from batch where status='1' ORDER by batch");
					while($x1=mysql_fetch_array($x))
					{
					?>
					<option value="<?php echo $x1['sno']; ?>"><?php echo $x1['batch']; ?></option>
					<?php
					}
					?>
                  </select>				  								
                </div>
              </div>

              
              <div class="form-group">
                <label class="col-sm-3 control-label">Training<span style="color:#cc0000;">*</span></label>
                <div class="col-sm-6">
                  <select class="form-control" name="trn" required>
                    <option selected disabled>Select</option>
                    <?php
					$y=mysql_query("select * from training where status='1' ORDER by type");
					while($y1=mysql_fetch_array($y))
					{
					?>
					<option value="<?php echo $y1['sno']; ?>"><?php echo $y1['type']; ?></option>
					<?php
					}
					?>
                  </select>
				  								
                </div>
              </div>
 

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="hidden" name="k1" value="view_list">
                  <input type="hidden" name="h" value="list">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button class="btn btn-default"><a href="user_clear.php?k=lists">Cancel</a></button>
                </div>
              </div>
            </form>
          </div>
        </div>
        
      </div>
    </div>	
