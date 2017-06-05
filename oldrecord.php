<div class="cl-mcont">
<div class="col-md-12">
      
        <div class="block-flat">
          <div class="header">							
            <h3>Old Record</h3>
          </div>
          <div class="content">
              <form class="form-horizontal group-border-dashed" action="index.php" parsley-validate novalidate method="post">
              
			  <div class="form-group">
                <label class="col-sm-3 control-label"></label>
                <div class="col-sm-9" style="text-align:right;">
                <label>Fields marked with asterisk (<span style="color:#cc0000;">*</span>) are mandatory.</label>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-3 control-label">Training<span style="color:#cc0000;">*</span></label>
                <div class="col-sm-6">
                  <select class="form-control" name="tr" required>
                    <option selected disabled>Select Your Training Type</option>
                     <?php
						$x=mysql_query("select * from std_trn where status='1' and session='$_SESSION[student]' ORDER by training ");
						
						while($x1=mysql_fetch_array($x))
						{
							$x2=mysql_fetch_array(mysql_query("select * from training where status='1' and sno='$x1[training]'"));
						?>
							<option value="<?php echo $x2['sno']; ?>"><?php echo $x2['type']; ?></option>
					<?php
						}
					?>

                             
                  </select>
				  								
                </div>
              </div>
              
              <div class="form-group">
                  <label class="col-sm-3 control-label">Date<span style="color:#cc0000;">*</span></label>
                  <div class="col-sm-6">
                    <input type="text" name="dt" class="form-control" id="datepicker" required>
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="hidden" name="k1" value="record">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button class="btn btn-default"><a href="user_clear.php?k=oldrec">Cancel</a></button>
				 
                </div>
              </div>
            </form>
          </div>
        </div>
        
      </div>
    </div>	