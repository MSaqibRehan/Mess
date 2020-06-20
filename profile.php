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
            <li><a class="treeview-item active" href="attendence.php"><i class="icon fa fa-circle-o"></i> Meal Taken</a></li>
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
          <h1><i class="fa fa-dashboard"></i> User Profile</h1>
          <p>Showing user Profile</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">User Profile</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <?php 
                  if (isset($_SESSION['message'])) {
                    message();
                  }
                ?>
              <div class="row">
                <div class="col-md-6">
                  <?php 
                  $id=$_SESSION['login_id'];
                  
                    $userq=mysqli_query($conn,"SELECT * FROM users WHERE id={$id}");
                     
                    $user_set=mysqli_fetch_assoc($userq);
                   ?>
                   <table class="table table-responsive text-center">
                    <tr>
                      <td colspan="2">
                        <img src="images/user.png" alt="user Image" style="max-height: 200px; max-width: 200px;" class="img rounded-circle img-fluid">
                      </td>

                    </tr>
                    <tr>
                      <th>Full Name</th>
                      <td> <?php echo $user_set['full_name']; ?></td>
                    </tr>
                    <tr>
                      <th>Username</th>
                      <td> <?php echo $user_set['username']; ?></td>
                    </tr>
                    <tr>
                      <th>User Email</th>
                      <td> <?php echo $user_set['email']; ?></td>
                    </tr>
                    <tr>
                      <th>User DOB</th>
                      <td> <?php echo $user_set['dob']; ?></td>
                    </tr>
                    <tr>
                      <th>User Gender</th>
                      <td> <?php echo $user_set['gender']; ?></td>
                    </tr>
                    <tr>
                      <th>User Role</th>
                      <td> <?php echo $user_set['user_role']; ?></td>
                    </tr>
                     
                   </table>
                </div>
                <div class="col-md-6">
                  <h3>Update Password</h3>
                  <form action="" method="POST">
                    <div class="form-group">
                      <label class="control-label">Enter New Password</label>
                      <input type="password" name="password" class="form-control" placeholder="Please Enter New Password" required>
                    </div>
                    <div class="form-group">
                      <input type="submit" value="Update Password" name="submit" class="btn btn-success form-control">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <?php 
      if (isset($_POST['submit'])) {
        $password=$_POST['password'];
        if (empty($password)) {
          $_SESSION['message'] = null;
            if(empty($password)){
              $_SESSION['message'] .= "<li>Please Enter New Password Before Submit</li>";
            }
            header("location:profile.php");
        }else{
          $pass=md5($password);
          $id=$_SESSION['login_id'];
          $query="UPDATE users SET password='$pass' WHERE id=$id";
          if (mysqli_query($conn , $query)) {
              $_SESSION['message'] = "Password Update Success";
              header("location:profile.php");
            }else{
              $_SESSION['message'] = mysqli_error($conn);
              header("location:profile.php");
            }
        }
        
      }
     ?>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
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