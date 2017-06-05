<script src="user forms/cat.js">
</script>
<?php
include_once("connection.php");
?>
<div class="cl-mcont">
<div class="col-md-12">
      
        <div class="block-flat">
          <div class="header">							
            <h3>Company Rating</h3>
          </div>
          <div class="content">
              <form class="form-horizontal group-border-dashed" action="user_insert.php"  method="post" name="frm" onSubmit="return len();">
              
			  <div class="form-group">
                <label class="col-sm-3 control-label"></label>
                <div class="col-sm-9" style="text-align:right;">
                <label>Fields marked with asterisk (<span style="color:#cc0000;">*</span>) are mandatory.</label>
                </div>
              </div>
			  
              <div class="form-group">
                <label class="col-sm-3 control-label">Training<span style="color:#cc0000;">*</span></label>
                <div class="col-sm-6">
                  <select class="form-control" name="trn" onchange="cats(this.value,'ajx_trn','display_cname')" >
                    <option selected disabled>Select Your Training Type</option>
                     <?php
					
					$x=mysql_query("select * from std_trn where status='1' and session='$_SESSION[student]' ORDER by training ");
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
                <label class="col-sm-3 control-label">Company Name<span style="color:#cc0000;">*</span></label>
                <div class="col-sm-6" id="display_cname">
                  <input type="text" name="cname" class="form-control" readonly />
                </div>
              </div>
              
              
              
              <div class="form-group">
                <label class="col-sm-3 control-label">Company Rating<span style="color:#cc0000;">*</span></label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="c_rate" placeholder="Rating out of 5" onKeyDown="leng();" id="ss"/><span id="crate"></span>
                </div>
              </div>
              
              
              <div class="form-group">
                <label class="col-sm-3 control-label">Feedback</label>
                <div class="col-sm-6">
                  <textarea class="form-control" name="comm"></textarea>
                </div>
            </div>
                          
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="hidden" name="h1" value="c_rating">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button class="btn btn-default">Cancel</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        
      </div>
    </div>	
<script language="javascript">
function len()
{
	var c_rate=document.frm.c_rate.value;
	if(c_rate=="" )
	{
		document.getElementById("crate").innerHTML="This field is required.";
		document.getElementById("crate").style.color="#cc0000";
		document.getElementById("ss").style.borderColor="#cc0000";
		return false;
	}
	if(isNaN(c_rate) || ((c_rate>5)))
	{
		document.getElementById("crate").innerHTML="This should be less than or equal to 5.";
		document.getElementById("crate").style.color="#cc0000";
		document.getElementById("ss").style.borderColor="#cc0000";
		return false;
	}
	
}
function leng()
{
	if(document.frm.c_rate.value!=="")
	{
		document.getElementById("crate").innerHTML="";
	}
	if(!(isNaN(document.frm.c_rate.value)))
	{
		document.getElementById("crate").innerHTML="";
	}
}
</script>