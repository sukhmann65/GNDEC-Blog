<?php
session_start();
include_once("../connection.php");
include_once("../head.php");
include_once("../scripts.php");
$q1=$_REQUEST['q1'];
if($q1=="ajx_pname1")
{
	$q=$_REQUEST['q'];
?>
               	<div>
              
                  <select  class="form-control" name="proj"  onmouseover="cats(this.value,'ajx_pnamet','display_gname')" onchange="cats(this.value,'ajx_pnamet','display_gname')" required>
                    <?php 
					$y=mysql_query("select * from proj_detail where training='$q' and session='$_SESSION[student]' and status='1' ORDER by pr_name ");
					while($y1=mysql_fetch_array($y))
					{
					?>
    				<option value="<?php echo $y1['sno'];?>"><?php echo $y1['pr_name'];?></option>
        			<?php
					}
					?>
                  </select>	
                  		  								
                </div>
<?php
}
if($q1=="ajx_pnamet")
{
	$q1=$_REQUEST['q'];
	
	$y=mysql_fetch_array(mysql_query("select * from proj_detail where sno='$q' and status='1'"));
	
	?>
    <div>
		<input class="form-control" type="text" name="guide" value="<?php echo $y['guide'];?>" readonly >
        </div>
	<?php
	
}



if($q1=="ajx_trn")
{
	$q=$_REQUEST['q'];
	
	$y=mysql_query("select * from std_trn where training='$q' and status='1' and session='$_SESSION[student]'");
	while($y1=mysql_fetch_array($y))
	{
		$a=mysql_fetch_array(mysql_query("select * from company where status='1' and c_name='$y1[c_name]'"));
		?>
        <div>
		<input class="form-control" type="text" name="cname" value="<?php echo $a['c_name'];?>" readonly >
        </div>
        <?php
	}
}







if($q1=="ajx_training")
{
	$q=$_REQUEST['q'];
	$y=mysql_query("select * from std_trn where training='$q' and status='1' and session='$_SESSION[student]'");
	while($y1=mysql_fetch_array($y))
	{
				$y2=mysql_fetch_array(mysql_query("select * from guide where status='1' and sno='$y1[guide]'"));

		?>
        <div>
		<input class="form-control" type="text" name="guide" value="<?php echo $y2['name'];?>" readonly >
        </div>
        <?php
	}
}


	?>