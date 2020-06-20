 <?php
  include 'includes/connection.php';
  include 'includes/sessions.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Loin - Mess Management</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover w-100">
        <div class="row w-100 mx-auto">
          <div class="col-md-6 mx-auto">
            <?php 
                  if (isset($_SESSION['message'])) {
                    message();
                  }
                ?>
          </div>
            
          </div>
      </div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Mess Management</h1>
      </div>
      <div class="login-box">
        
        <form class="login-form" action="" method="POST">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" type="text" placeholder="Username" name="username" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" name="password" placeholder="Password">
          </div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <label>
                  <input type="checkbox"><span class="label-text">Stay Signed in</span>
                </label>
              </div>
                
            </div>
          </div>
          <div class="form-group btn-container">
           
            <button type="submit" name="login" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
        </form>
        <form class="forget-form" action="">
          <!-- <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3> -->
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="text" placeholder="Email">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
          </div>
        </form>
      </div>
    </section>
    <?php 
      if(isset($_POST['login'])) {
        // username and password sent from form 
        
        $myusername = $_POST['username'];
        $mypassword = $_POST['password']; 
        
       

        if ( empty($myusername) ||empty($mypassword) ) {

            $_SESSION['message'] = null;
            if(empty($myusername)){
              $_SESSION['message'] .= "<li>Please Enter Username</li>";
            }
            if(empty($mypassword)){
              $_SESSION['message'] .= "<li>Please Enter Password</li>" ;
            }
            
           

              header("location:login.php");
          
          }else{
            $pass=md5($mypassword);
             $sql = "SELECT * FROM users WHERE username = '$myusername' and password = '$pass'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
                       

           $count = mysqli_num_rows($result);
        
            // If result matched $myusername and $mypassword, table row must be 1 row
          
            if($count == 1) {
               $_SESSION['login_user'] = $myusername;
               $_SESSION['user_type'] = $row['user_type'];
               $_SESSION['user_role'] = $row['user_role'];
               $_SESSION['login_id'] = $row['id'];

                $_SESSION['message']   = "Welcome To Mess Management System : ".$myusername ;
               
               header("location: index.php");
            }else {
               $_SESSION['message'] = "Invalid Username or password";
               header("location:login.php");
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
   
  </body>
</html>