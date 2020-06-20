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
<?php 
  if (isset($_GET['user'])) {
    $userid=$_GET['user'];
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
          <h1><i class="fa fa-dashboard"></i> Register User</h1>
          <p>Please enter details to register a new user</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Register User</a></li>
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
                <?php 
                  if (isset($_GET['user'])) {
                    $id=$_GET['user'];
                    $record_set=mysqli_query($conn , "SELECT * FROM users WHERE id = $id");
                   
                    $user_set = mysqli_fetch_assoc($record_set)
                    ?>

                   
                    <form action="" method="POST" >
                      <div class="form-group">
                        <label class="control-label">Name</label>
                        <input class="form-control" value="<?php echo $user_set['full_name']; ?>" type="text" placeholder="Enter full name" required name="name">
                      </div>
                      <div class="form-group">
                        <label class="control-label">Username</label>
                        <input class="form-control" type="text" value="<?php echo $user_set['username']; ?>" placeholder="Enter username" required name="username">
                      </div>
                      <div class="form-group">
                        <label class="control-label">Email</label>
                        <input class="form-control" type="email" value="<?php echo $user_set['email']; ?>" placeholder="Enter email address" required name="email">
                      </div>
                      <div class="form-group">
                        <label class="control-label">Password</label>
                        <input class="form-control" type="password" placeholder="Enter new Password to change" required name="password">
                      </div>
                      <div class="form-group">
                        <label class="control-label">Date of Birth</label>
                        <input class="form-control" type="date" placeholder="Enter DOB" value="<?php echo $user_set['dob']; ?>" required name="dob">
                      </div>
                      <div class="form-group">
                        <label class="control-label">Gender</label>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" <?php if($user_set['gender'] == 'male'){echo 'checked';} ?> value="male" required name="gender">Male
                          </label>
                        </div>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" <?php if($user_set['gender'] == 'female'){echo 'checked';} ?> value="female" required name="gender">Female
                          </label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label">User Role</label>
                        <input class="form-control" placeholder="Enter Role of the user" value="<?php echo $user_set['user_role']; ?>" type="text" required name="role">
                      </div>
                      <div class="form-group">
                        <input type="submit" name="update" value="Update User" class="btn btn-primary" >
                        <input type="reset" name="reset" value="Reset" class="btn btn-secondary">
                      </div>
                    </form>
                  <?php
                    
                  }else{
                    ?>

                   
                    <form action="" method="POST" >
                      <div class="form-group">
                        <label class="control-label">Name</label>
                        <input class="form-control" type="text" placeholder="Enter full name" required name="name">
                      </div>
                      <div class="form-group">
                        <label class="control-label">Username</label>
                        <input class="form-control" type="text" placeholder="Enter username" required name="username">
                      </div>
                      <div class="form-group">
                        <label class="control-label">Email</label>
                        <input class="form-control" type="email" placeholder="Enter email address" required name="email">
                      </div>
                      <div class="form-group">
                        <label class="control-label">Password</label>
                        <input class="form-control" type="password" placeholder="Enter Password" required name="password">
                      </div>
                      <div class="form-group">
                        <label class="control-label">Date of Birth</label>
                        <input class="form-control" type="date" placeholder="Enter DOB" required name="dob">
                      </div>
                      <div class="form-group">
                        <label class="control-label">Gender</label>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" checked value="male" required name="gender">Male
                          </label>
                        </div>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" value="female" required name="gender">Female
                          </label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label">User Role</label>
                        <input class="form-control" type="text" required name="role">
                      </div>
                      <div class="form-group">
                        <input type="submit" name="submit" value="Register" class="btn btn-primary" >
                        <input type="reset" name="reset" value="Reset" class="btn btn-secondary">
                      </div>
                    </form>
                  <?php 
                 }
                 ?>
            </div>
            
          </div>
        </div>
      </div>
    </main>
    <?php
      if (isset($_POST['submit'])) {
        
        $name = mysqli_real_escape_string($conn , $_POST['name']);
        $username = mysqli_real_escape_string($conn , $_POST['username']);
        $email = mysqli_real_escape_string($conn , $_POST['email']);
        $password = mysqli_real_escape_string($conn , $_POST['password']);
        $dob = mysqli_real_escape_string($conn , $_POST['dob']);
        $gender = mysqli_real_escape_string($conn , $_POST['gender']);
        $role = mysqli_real_escape_string($conn , $_POST['role']);

       

        $comment_query = "SELECT * FROM users WHERE username = '$username' ";
             $comments = mysqli_query($conn , $comment_query);
             $count = mysqli_num_rows($comments);
             
        
        date_default_timezone_set("Asia/Karachi");
       $date =  date("Y-m-d H:i:s");
       $author ="rehan";
        

   
       if (empty($name) || empty($username) || empty($email) || empty($password) || empty($dob) || empty($role) || !preg_match("/^[a-zA-Z0-9#;]+$/" , $username) ||  $count>= 0  ) {

            $_SESSION['message'] = null;
            if(empty($name)){
              $_SESSION['message'] .= "<li>Please Enter Your Name</li>";
            }
            if (empty($username)) {
              $_SESSION['message'] .= "<li>Enter user name</li>" ;
            }elseif (!preg_match("/^[a-zA-Z 0-9$;]+$/" , $username)) {
             $_SESSION['message'] .= "<li>no special characters are allowed for username</li>" ;
            }elseif( $count>= 0){
              $_SESSION['message'] .= "<li>Username Already Taken . Try Another One</li>" ;
            }
             if(empty($email)){
              $_SESSION['message'] .= "<li>Please Enter Valid email address</li>";
            }
            if(empty($password)){
              $_SESSION['message'] .= "<li>Please Enter password</li>";
            }
            if(empty($dob)){
              $_SESSION['message'] .= "<li>Please Enter Date of Birth</li>";
            }
            if(empty($role)){
              $_SESSION['message'] .= "<li>Please Enter Role of user</li>";
            }

              header("location:user-form.php");
          
          }else{
            $pass = md5($password);
            $query = "INSERT INTO users (full_name ,username,email,password,dob,gender,user_type,user_role,created_by,created_at) VALUES('{$name}' , '{$username}' , '{$email}' , '{$pass}','{$dob}','{$gender}','admin','{$role}'  , '{$author}', '{$date}')";
            if (mysqli_query($conn , $query)) {
              $_SESSION['message'] = "New User Added";
              header("location:users.php");
            }else{
              $_SESSION['message'] = mysqli_error($conn);
              header("location:user-form.php");
            }
          }
        }

      if (isset($_POST['update'])) {
        
        $name = mysqli_real_escape_string($conn , $_POST['name']);
        $username = mysqli_real_escape_string($conn , $_POST['username']);
        $email = mysqli_real_escape_string($conn , $_POST['email']);
        $password = mysqli_real_escape_string($conn , $_POST['password']);
        $dob = mysqli_real_escape_string($conn , $_POST['dob']);
        $gender = mysqli_real_escape_string($conn , $_POST['gender']);
        $role = mysqli_real_escape_string($conn , $_POST['role']);

       

        $comment_query = "SELECT * FROM users WHERE username = '$username' AND id !=$userid ";
             $comments = mysqli_query($conn , $comment_query);
             $count = mysqli_num_rows($comments);
             
        
        date_default_timezone_set("Asia/Karachi");
       $date =  date("Y-m-d H:i:s");
       $author ="rehan";
        

   
       if (empty($name) || empty($username) || empty($email)  || empty($dob) || empty($role) || !preg_match("/^[a-zA-Z0-9#;]+$/" , $username) ||  $count>= 1  ) {

            $_SESSION['message'] = null;
            if(empty($name)){
              $_SESSION['message'] .= "<li>Please Enter Your Name</li>";
            }
            if (empty($username)) {
              $_SESSION['message'] .= "<li>Enter user name</li>" ;
            }elseif (!preg_match("/^[a-zA-Z 0-9$;]+$/" , $username)) {
             $_SESSION['message'] .= "<li>no special characters are allowed for username</li>" ;
            }elseif( $count>= 0){
              $_SESSION['message'] .= "<li>Username Already Taken . Try Another One</li>" ;
            }
             if(empty($email)){
              $_SESSION['message'] .= "<li>Please Enter Valid email address</li>";
            }
            
            if(empty($dob)){
              $_SESSION['message'] .= "<li>Please Enter Date of Birth</li>";
            }
            if(empty($role)){
              $_SESSION['message'] .= "<li>Please Enter Role of user</li>";
            }

              header("location:user-form.php");
          
          }else{
          if ( empty($password)) {
            $query = "UPDATE users SET full_name ='{$name}' ,username ='{$username}' ,email = '{$email}',dob = '{$dob}',gender = '{$gender}',user_role='{$role}',created_by ='{$author}',created_at = '{$date}' WHERE id=$userid";
            if (mysqli_query($conn , $query)) {
              $_SESSION['message'] = " User Updated SUCCESSFULLY";
              header("location:users.php");
            }else{
              $_SESSION['message'] = mysqli_error($conn);
              header("location:user-form.php");
            }
          }else{
            $pass = md5($password);
            $query = "UPDATE users SET full_name ='{$name}' ,username ='{$username}' ,email = '{$email}',password = '{$pass}',dob = '{$dob}',gender = '{$gender}',user_role='{$role}',created_by ='{$author}',created_at = '{$date}' WHERE id=$userid";
            if (mysqli_query($conn , $query)) {
              $_SESSION['message'] = "User Updated SUCCESSFULLY";
              header("location:users.php");
            }else{
              $_SESSION['message'] = mysqli_error($conn);
              header("location:user-form.php");
            }
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