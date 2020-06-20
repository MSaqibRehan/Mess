<?php 
require 'includes/connection.php';
require 'includes/header.php'
 ?>

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
        
        <li><a class="app-menu__item" href="students.php"><i class="app-menu__icon fa fa-graduation-cap"></i><span class="app-menu__label">Students</span></a></li>
       
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
          <h1><i class="fa fa-dashboard"></i> Register Student</h1>
          <p>Please enter details of student to register</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Register Student</a></li>
        </ul>
      </div>
      
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <form accept="" method="POST" >
                <div class="form-group">
                  <label class="control-label">Student Name</label>
                  <input class="form-control" type="text" placeholder="Enter full name" required name="name">
                </div>
                <div class="form-group">
                  <label class="control-label">Father Name</label>
                  <input class="form-control" type="text" placeholder="Enter Father Name" required name="fathername">
                </div>
                <div class="form-group">
                  <label class="control-label">Mobile Number</label>
                  <input class="form-control" type="text" placeholder="Enter Student Mobile Number" required name="mobile">
                </div>
                <div class="form-group">
                  <label class="control-label">Roll No.</label>
                  <input class="form-control" type="text" placeholder="Enter Registered Roll Number" required name="rollno">
                </div>
                <div class="form-group">
                  <label class="control-label">Date of Birth</label>
                  <input class="form-control" type="date" placeholder="Enter DOB" required name="dob">
                </div>
                <div class="form-group">
                  <label class="control-label">Gender</label>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" required name="gender">Male
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" required name="gender">Female
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label">Student Image</label>
                  <input class="form-control" type="file" name="image">
                </div>
                
                <div class="form-group">
                  <input type="submit" name="submit" value="Register" class="btn btn-primary" >
                  <input type="reset" name="reset" value="Reset" class="btn btn-secondary">
                </div>
              </form>
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
   
  </body>
</html>