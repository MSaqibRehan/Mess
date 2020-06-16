<?php
  include 'includes/connection.php';
  include 'includes/sessions.php';
  include 'includes/header.php';
?>
<?php 
   if (isset($_SESSION['login_user'])) {
     $_SESSION['message'] = "<li class='text-danger font-weight-bold'>Login required!</li>";
     header("location:login.php");
   }
?>


    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">John Doe</p>
          <p class="app-sidebar__user-designation">Frontend Developer</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="index.html"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item active" href="user-register.php"><i class="app-menu__icon fa fa-circle-o"></i><span class="app-menu__label">Register User</span></a></li>
        <li><a class="app-menu__item" href="student-register.php"><i class="app-menu__icon fa fa-circle-o"></i><span class="app-menu__label">Register Student</span></a></li>
        <li><a class="app-menu__item " href="register-meal.php"><i class="app-menu__icon fa fa-circle-o"></i><span class="app-menu__label">Add New Meal</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">UI Elements</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="bootstrap-components.html"><i class="icon fa fa-circle-o"></i> Bootstrap Elements</a></li>
            <li><a class="treeview-item" href="https://fontawesome.com/v4.7.0/icons/" target="_blank" rel="noopener"><i class="icon fa fa-circle-o"></i> Font Icons</a></li>
            <li><a class="treeview-item" href="ui-cards.html"><i class="icon fa fa-circle-o"></i> Cards</a></li>
            <li><a class="treeview-item" href="widgets.html"><i class="icon fa fa-circle-o"></i> Widgets</a></li>
          </ul>
        </li>
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
              <form accept="" method="POST" >
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
                      <input class="form-check-input" type="radio" checked required name="gender">Male
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" required name="gender">Female
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label">User Image</label>
                  <input class="form-control" type="file" required name="image">
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

       
        
        date_default_timezone_set("Asia/Karachi");
       $date =  date("Y-m-d H:i:s");
       $author ="rehan";
        

   
       if (empty($name) || empty($username) || empty($email) || empty($password) || empty($dob) || empty($role) || !preg_match("/^[a-zA-Z0-9#;]+$/" , $username)  ) {

            $_SESSION['message'] = null;
            if(empty($name)){
              $_SESSION['message'] .= "<li>Please Enter Your Name</li>";
            }
            if (empty($username)) {
              $_SESSION['message'] .= "<li>Enter user name</li>" ;
            }elseif (!preg_match("/^[a-zA-Z 0-9$;]+$/" , $username)) {
             $_SESSION['message'] .= "<li>no special characters are allowed for username</li>" ;
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

              header("location:user-register.php");
          
          }else
            $pass = md5($password);
            $query = "INSERT INTO users (full_name ,username,email,password,dob,gender,user_type,user_role,created_by,created_at) VALUES('{$name}' , '{$username}' , '{$email}' , '{$pass}','{$dob}','{$gender}','admin','{$role}'  , '{$author}', '{$date}')";
            if (mysqli_query($conn , $query)) {
              $_SESSION['message'] = "New User Added";
              header("location:user-register.php");
            }else{
              $_SESSION['message'] = mysqli_error($conn);
              header("location:user-register.php");
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