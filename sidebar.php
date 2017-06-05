  <div class="cl-sidebar">
    <div class="cl-toggle"><i class="fa fa-bars"></i></div>
    <div class="cl-navblock">
      <div class="menu-space">
        <div class="content">
          <div class="sidebar-logo">
            <div class="logo">
                
            </div>
          </div>
          
		  
          <ul class="cl-vnavigation">
            <li class="active" ><a href="index.php?k1=dashboard"><i class="fa fa-home"></i><span>Dashboard</span></a></li>
            
             <!----------------------Admin----------------------------------------------->
             <?php
			if($_SESSION['admin'])
			{
			?>
            <li><a href="index.php?k1=queries"><i class="fa fa-list-alt"></i><span>Queries</span></a>
            </li>
            
            <li><a href="index.php?k1=reg_stu"><i class="fa fa-list-alt"></i><span>Verify Students</span></a>
            </li>
            
            <li><a href="index.php?k1=stu_verified"><i class="fa fa-list-alt"></i><span>Registered Students</span></a>
            </li>
            
            <li><a href="index.php?k1=guide_std"><i class="fa fa-list-alt"></i><span>Guide Students</span></a>
            </li>
            
            <li><a href="#"><i class="fa fa-list-alt"></i><span>Forms</span></a>
              <ul class="sub-menu">
              	<li  ><a href="index.php?k1=batch">Batch</a></li>
                <li  ><a href="index.php?k1=course">Course</a></li>
                <li  ><a href="index.php?k1=training">Training</a></li>
                <li  ><a href="index.php?k1=company">Company</a></li>
                <li  ><a href="index.php?k1=guide">Guide</a></li>
                <li  ><a href="index.php?k1=guidedetail">Guide Details</a></li>
              </ul>
            </li>
            
            <li><a href="#"><i class="fa fa-list-alt"></i><span>Placement Record</span></a>
            	<ul class="sub-menu">
                <li  ><a href="index.php?k1=students">Top Students</a></li>
                <li  ><a href="index.php?k1=placed_std">Students Placed</a></li>
           <!----     <li  ><a href="index.php?k1=std">Placed Students</a></li> ------>
				</ul>
            </li>
            
            <li><a href="index.php?k1=news"><i class="fa fa-list-alt"></i><span>News</span></a>
            </li>
            <?php
			}
			?>
           <!--------------------------------Students----------------------------------------------->
            <?php
			if($_SESSION['student'])
			{
				
            ?>
            <li><a href="#"><i class="fa fa-list-alt"></i><span>Student Profile</span></a>
            	<ul class="sub-menu"> <?php
				$std=mysql_query("select * from student_login where email='$_SESSION[student]'");
                $std1=mysql_fetch_array($std);
				if($std1['pwd_status']==0)
				{
			?>
                <li><a href="index.php?k1=stureg">Student Profile</a></li>
				<?php 
				}
				if($std1['pwd_status']==1 || $_SESSION['admin'])
				{
				?>
                <li  ><a href="index.php?k1=trn_type">Training Type</a></li>
                <li  ><a href="index.php?k1=details">Student Details</a></li>
				</ul>
            </li>
            
  <!---          <li><a href="index.php?k1=details"><i class="fa fa-list-alt"></i><span>Details</span></a>
            </li>  --->
            
            <li><a href="index.php?k1=projdetails"><i class="fa fa-list-alt"></i><span>Project Details</span></a>
            </li>
                
            <li><a href="index.php?k1=blog"><i class="fa fa-list-alt"></i><span>Write Blog</span></a>
            </li>
            
            <li><a href="index.php?k1=oldrecord"><i class="fa fa-list-alt"></i><span>View Old Record</span></a>
            </li>
            
            <li><a href="index.php?k1=view_blog"><i class="fa fa-list-alt"></i><span>View Blog</span></a>
            </li>
            
            <li><a href="index.php?k1=nps"><i class="fa fa-list-alt"></i><span>News & Placed Students</span></a>
            </li>
                        
            <li><a href="index.php?k1=synopsis"><i class="fa fa-list-alt"></i><span>Upload Synopsis</span></a>
            </li>
            
            <li><a href="index.php?k1=code"><i class="fa fa-list-alt"></i><span>Upload Source Code</span></a>
            </li>
            
            <li><a href="index.php?k1=rating"><i class="fa fa-list-alt"></i><span>Company Rating</span></a>
            </li>
            
            <?php
			}}
			?>
             
             <!----------------------Guide----------------------------------------------->
            <?php
			if($_SESSION['teacher'] || $_SESSION['admin'])
			{
			?>
            <li><a href="index.php?k1=list_std"><i class="fa fa-list-alt"></i><span>List Of Students</span></a>
            </li>
            
            <li><a href="index.php?k1=stdinfo"><i class="fa fa-list-alt"></i><span>Students Blog</span></a>
            </li>
            
            <li><a href="index.php?k1=g_synopsis"><i class="fa fa-list-alt"></i><span>Students Synopsis</span></a>
            </li>
            
            <li><a href="index.php?k1=projects"><i class="fa fa-list-alt"></i><span>Students Projects</span></a>
            </li>
            <?php
			}
			?>
            
            

          </ul>
        </div>
      </div>
<!-------      <div class="text-right collapse-button" style="padding:7px 9px;">
        <input type="text" class="form-control search" placeholder="Search..." />
        <button id="sidebar-collapse" class="btn btn-default" style=""><i style="color:#fff;" class="fa fa-angle-left"></i></button>
      </div>   --------->
    </div>
  </div>
