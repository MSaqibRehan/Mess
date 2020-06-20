 <?php
  include 'includes/connection.php';
  include 'includes/sessions.php';
  include 'includes/header.php';
?>
<?php 
   if (!isset($_SESSION['login_user'])) {

     $_SESSION['message'] = "<li class='text-danger font-weight-bold'>Login required!</li>";
     header("location:login.php");
   }
?>
    <!-- Sidebar menu-->
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" width="30" height="30" src="images/user.png" alt="User Image">
        <div>
          <p class="app-sidebar__user-name font-weight-bold"><?php echo $_SESSION['login_user']; ?></p>
          <p class="app-sidebar__user-designation"><?php echo $_SESSION['user_role'] ?></p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="index.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <?php 
          if ($_SESSION['user_type'] !="admin") {
        ?>
          <li><a class="app-menu__item" href="users.php"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Users</span></a></li>
        <?php
          }
         ?>
         <!-- ====================================== -->
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-cutlery"></i><span class="app-menu__label">Meals</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="meals.php"><i class="icon fa fa-circle-o"></i> Active Meals</a></li>
            <li><a class="treeview-item" href="inactive-meals.php" target="_blank" rel="noopener"><i class="icon fa fa-circle-o"></i> Inactive Meals</a></li>
            
          </ul>
        </li>
        <!-- ============================================================================= -->
        
        <li><a class="app-menu__item active" href="students.php"><i class="app-menu__icon fa fa-graduation-cap"></i><span class="app-menu__label">Students</span></a></li>
       
        <!-- ===================================================================== -->
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Attendence</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="attendence.php"><i class="icon fa fa-circle-o"></i> Meal Taken</a></li>
            <li><a class="treeview-item" href="extra-taken.php"><i class="icon fa fa-circle-o"></i>Extra Taken</a></li>
            
          </ul>
        </li>
        <!-- ============================================================ -->

        <li><a class="app-menu__item" href="logout.php"><i class="app-menu__icon fa fa-sign-out"></i><span class="app-menu__label">Log Out</span></a></li>
        
      </ul>
    </aside>
  <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> student Record</h1>
          <p>Displaying all the registered students</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item active"><a href="#">students</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title">
              <div class="row">
                <div class="col-md-12 d-flex justify-content-end">
                  <a href="student-form.php" class="btn btn-primary">Add new student</a>
                </div>
              </div>
            </div>
            <div class="tile-body">
            	<?php 
                  if (isset($_SESSION['message'])) {
                    message();
                  }
                ?>
            	<?php 
            		$student_list=mysqli_query($conn, "SELECT * FROM student WHERE status = 'active'");

            	?>
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Father Name</th>
                    <th>Rll no.</th>
                    <th>Mobile No.</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>CNIC</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                 <?php 
                	while ($record =mysqli_fetch_assoc($student_list)) {
                ?>
	                  <tr>
	                    <td><?= $record['std_name'] ?></td>
	                    <td><?= $record['father_name'] ?></td>
                      <td><?= $record['roll_no'] ?></td>
	                    <td><?= $record['mobile_no'] ?></td>
	                    <td><?= $record['dob'] ?></td>
	                    <td><?= $record['gender'] ?></td>
                      <td><?= $record['cnic'] ?></td>
                      <td>
                        <a href="student-record.php?student=<?php echo urlencode($record['id']); ?>" class="mx-2" ><i class="fa fa-eye fa-2x" aria-hidden="true"></i>
                        </a>
                        <a href="student-form.php?student=<?php echo urlencode($record['id']); ?>" class="mx-2" ><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
                        </a>
                        <a onclick =" return confirm ('Are you sure?')" href="action-student.php?student=<?php echo urlencode($record['id']); ?>&action=delete" class="mx-2"><i class="fa Example of trash-o fa-trash-o fa-2x" aria-hidden="true"></i>
</a>
                      </td>
	                  </tr>
                 <?php } ?> 
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>

   
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Data table plugin-->
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
  </body>
</html>