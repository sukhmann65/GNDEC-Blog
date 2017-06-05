<div class="cl-mcont">
<div class="col-md-12">
      
        <div class="block-flat" style="border:2px solid #dadada;">
          <div class="header">							
            <h3>Change Password</h3>
          </div>
          <div class="content">
              <form class="form-horizontal group-border-dashed" action="update_pwd.php"  parsley-validate novalidate method="post">
              	
				<div class="form-group">
                <label class="col-sm-3 control-label"></label>
                <div class="col-sm-9" style="text-align:right;">
                <label>Fields marked with asterisk (<span style="color:#cc0000;">*</span>) are mandatory.</label>
                </div>
              </div>
				
				<div class="form-group">
              		<label for="inputPassword3" class="col-sm-3 control-label">Current Password<span style="color:#cc0000;">*</span></label>
              			<div class="col-sm-6">
                			<input type="password" name="curr_pwd" required class="form-control" id="inputPassword3">
              			</div>
              	</div>
                
                <div class="form-group">
              		<label for="inputPassword3" class="col-sm-3 control-label">New Password<span style="color:#cc0000;">*</span></label>
              			<div class="col-sm-6">
                			<input type="password" name="new_pwd" required class="form-control" id="inputPassword3">
              			</div>
              	</div>
                
                <div class="form-group">
              		<label for="inputPassword3" class="col-sm-3 control-label">Retype Password<span style="color:#cc0000;">*</span></label>
              			<div class="col-sm-6">
                			<input type="password" name="retype_pwd" required class="form-control" id="inputPassword3">
              			</div>
              	</div>
              
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button class="btn btn-default"><a href="user_clear.php?k=edit_pwd">Cancel</a></button>
				 
                </div>
              </div>
            </form>
          </div>
        </div>
        
      </div>
    </div>	