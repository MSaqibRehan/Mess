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
<?php
  if (isset($_GET['student'])) {
    $studentid=$_GET['student'];
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
        <li><a class="app-menu__item active" href="user-form.php"><i class="app-menu__icon fa fa-circle-o"></i><span class="app-menu__label">Register User</span></a></li>
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
          <h1><i class="fa fa-dashboard"></i> Register Student</h1>
          <p>Please enter details to register a new Student</p>
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
               <?php
                  if (isset($_SESSION['message'])) {
                    message();
                  }
                ?>
                <?php
                  if (isset($_GET['student'])) {
                    $id=$_GET['student'];
                    $record_set=mysqli_query($conn , "SELECT * FROM student WHERE id = $id");

                    $student_set = mysqli_fetch_assoc($record_set)
                    ?>


                    <form accept="" method="POST" >
                <div class="form-group">
                  <label class="control-label">Student Name</label>
                  <input class="form-control" type="text" value="<?php echo $student_set['std_name'] ?>" placeholder="Enter full name" required name="name">
                </div>
                <div class="form-group">
                  <label class="control-label">Father Name</label>
                  <input class="form-control" type="text" value="<?php echo $student_set['father_name'] ?>" placeholder="Enter Father Name" required name="fathername">
                </div>
                <div class="form-group">
                  <label class="control-label">Mobile Number</label>
                  <input class="form-control" type="text" value="<?php echo $student_set['mobile_no'] ?>" placeholder="Enter Student Mobile Number" required name="mobile">
                </div>
                <div class="form-group">
                  <label class="control-label">CNIC No.</label>
                  <input class="form-control" type="text" value="<?php echo $student_set['cnic'] ?>" maxlength="13" placeholder="Enter cnic without dashes" required name="cnic">
                </div>
                <div class="form-group">
                  <label class="control-label">Roll No.</label>
                  <input class="form-control" type="text" value="<?php echo $student_set['roll_no'] ?>" placeholder="Enter Registered Roll Number" required name="rollno">
                </div>
                <div class="form-group">
                  <label class="control-label">Date of Birth</label>
                  <input class="form-control" type="date" value="<?php echo $student_set['dob'] ?>" placeholder="Enter DOB" required name="dob">
                </div>
                <div class="form-group">
                        <label class="control-label">Gender</label>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" <?php if($student_set['gender'] == 'male'){echo 'checked';} ?> value="male" required name="gender">Male
                          </label>
                        </div>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" <?php if($student_set['gender'] == 'female'){echo 'checked';} ?> value="female" required name="gender">Female
                          </label>
                        </div>
                      </div>
                <div class="form-group">
                  <input type="submit" name="update" value="Update Record" class="btn btn-primary" >
                  <input type="reset" name="reset" value="Reset" class="btn btn-secondary">
                </div>
              </form>
                  <?php

                  }else{
                    ?>


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
                  <label class="control-label">CNIC No.</label>
                  <input class="form-control" type="text" maxlength="13" placeholder="Enter cnic without dashes" required name="cnic">
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
                      <input class="form-check-input" type="radio" value="male" required name="gender">Male
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" value="female" required name="gender">Female
                    </label>
                  </div>
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
        $fathername = mysqli_real_escape_string($conn , $_POST['fathername']);
        $mobile = mysqli_real_escape_string($conn , $_POST['mobile']);
        $rollno = mysqli_real_escape_string($conn , $_POST['rollno']);
        $dob = mysqli_real_escape_string($conn , $_POST['dob']);
        $gender = mysqli_real_escape_string($conn , $_POST['gender']);
        $cnic = mysqli_real_escape_string($conn , $_POST['cnic']);


        date_default_timezone_set("Asia/Karachi");
       $date =  date("Y-m-d H:i:s");
       $author ="rehan";



       if (empty($name) || empty($fathername) || empty($mobile) || empty($rollno) || empty($dob) || empty($cnic)  ) {

            $_SESSION['message'] = null;
            if(empty($name)){
              $_SESSION['message'] .= "<li>Please Enter Student's Name</li>";
            }
            if (empty($fathername)) {
              $_SESSION['message'] .= "<li>Enter Father's name</li>" ;
            }
             if(empty($mobile)){
              $_SESSION['message'] .= "<li>Please Enter Valid Mobile Number</li>";
            }
            if(empty($rollno)){
              $_SESSION['message'] .= "<li>Please Enter Student's Roll Number</li>";
            }
            if(empty($dob)){
              $_SESSION['message'] .= "<li>Please Enter Date of Birth</li>";
            }
            if(empty($cnic)){
              $_SESSION['message'] .= "<li>Please Enter Student's CNIC</li>";
            }

              header("location:student-form.php");

          }else{
            $query = "INSERT INTO student (std_name, father_name, mobile_no, roll_no, dob, gender, cnic, status, created_by, created_at) VALUES('{$name}' , '{$fathername}' , '{$mobile}' , '{$rollno}','{$dob}','{$gender}','{$cnic}' ,'active'  , '{$author}', '{$date}')";
            if (mysqli_query($conn , $query)) {
              $_SESSION['message'] = "New Student Added SuccessFully";
              header("location:students.php");
            }else{
              $_SESSION['message'] = mysqli_error($conn);
              header("location:student-form.php");
            }
          }
        }

      if (isset($_POST['update'])) {

        $name = mysqli_real_escape_string($conn , $_POST['name']);
        $fathername = mysqli_real_escape_string($conn , $_POST['fathername']);
        $mobile = mysqli_real_escape_string($conn , $_POST['mobile']);
        $rollno = mysqli_real_escape_string($conn , $_POST['rollno']);
        $dob = mysqli_real_escape_string($conn , $_POST['dob']);
        $gender = mysqli_real_escape_string($conn , $_POST['gender']);
        $cnic = mysqli_real_escape_string($conn , $_POST['cnic']);



       

        date_default_timezone_set("Asia/Karachi");
       $date =  date("Y-m-d H:i:s");
       $author ="rehan";



       if (empty($name) || empty($fathername) || empty($mobile) || empty($rollno) || empty($dob) || empty($cnic)  ) {

            $_SESSION['message'] = null;
            if(empty($name)){
              $_SESSION['message'] .= "<li>Please Enter Student's Name</li>";
            }
            if (empty($fathername)) {
              $_SESSION['message'] .= "<li>Enter Father's name</li>" ;
            }
             if(empty($mobile)){
              $_SESSION['message'] .= "<li>Please Enter Valid Mobile Number</li>";
            }
            if(empty($rollno)){
              $_SESSION['message'] .= "<li>Please Enter Student's Roll Number</li>";
            }
            if(empty($dob)){
              $_SESSION['message'] .= "<li>Please Enter Date of Birth</li>";
            }
            if(empty($cnic)){
              $_SESSION['message'] .= "<li>Please Enter Student's CNIC</li>";
            }

              header("location:student-form.php");

          }else{

            $query = "UPDATE student SET std_name ='{$name}' ,father_name ='{$fathername}' ,mobile_no = '{$mobile}', roll_no='$rollno' ,dob = '{$dob}',gender = '{$gender}',cnic='{$cnic}',created_by ='{$author}',created_at = '{$date}' WHERE id=$studentid";
            if (mysqli_query($conn , $query)) {
              $_SESSION['message'] = " Student Updated SuccessFully";
              header("location:students.php");
            }else{
              $_SESSION['message'] = mysqli_error($conn);
              header("location:student-form.php");
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