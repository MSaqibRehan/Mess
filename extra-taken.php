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
  if (isset($_GET['meal'])) {
    $mealid=$_GET['meal'];
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
          <h1><i class="fa fa-dashboard"></i> Add Extra Taken</h1>
          <p>Please enter details to Add the Extra Taken</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Add Extra Taken</a></li>
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
                     <form action="" method="POST" >
                      <?php 
                       

                       ?>
                      <div class="form-group">
                        <label class="control-label">Student RollNo</label>
                        <select name="student" class="form-control" >
                          <option value="null">Select Student</option>
                        <?php 
                           $record=mysqli_query($conn,"SELECT * FROM student WHERE status='active'");
                          while ($record_set=mysqli_fetch_assoc($record)) {
                            ?>
                              <option value="<?php echo $record_set['id'] ?>"><?php echo $record_set['roll_no'] ?></option>
                            
                            <?php
                              
                          }
                         ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label class="control-label">Extra Meal Name</label>
                        <select name="meal" class="form-control" >
                          <option value="null">Select Meal</option>
                        <?php 
                           $mrecord=mysqli_query($conn,"SELECT * FROM meals WHERE status='active'");
                          while ($mrecord_set=mysqli_fetch_assoc($mrecord)) {
                            ?>
                              <option value="<?php echo $mrecord_set['id'] ?>"><?php echo $mrecord_set['meal_name'] ?></option>
                            
                            <?php
                              
                          }
                         ?>
                        </select>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label">Attendence Date</label>
                        <input class="form-control" type="date"  placeholder="Enter Attendence date" required name="date">
                      </div>
                      <div class="form-group">
                        <input type="submit" name="submit" value="Add Extra Taken" class="btn btn-primary" >
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
        
        $std = mysqli_real_escape_string($conn , $_POST['student']);
        $meal = mysqli_real_escape_string($conn , $_POST['meal']);
        $atdate = mysqli_real_escape_string($conn , $_POST['date']);
        

             
        
        date_default_timezone_set("Asia/Karachi");
       $date =  date("Y-m-d H:i:s");
       $author ="rehan";
        

   
       if ($std=='null'  || empty($atdate) || $meal =='null' ) {

            $_SESSION['message'] = null;
            if($std=='null'){
              $_SESSION['message'] .= "<li>Please Select Student</li>";
            }
            if( $meal == 'null'){
              $_SESSION['message'] .= "<li>Please Select Meal</li>" ;
            }
             if(empty($atdate)){
              $_SESSION['message'] .= "<li>Please Enter Date</li>";
            }
           

              header("location:attendence.php");
          
          }else{
            $query = "INSERT INTO extra_taken (std_id , meal_id ,atdate ,mcreated_by ,created_at) VALUES('{$std}' , '{$meal}' , '{$atdate}'  , '{$author}', '{$date}')";
            if (mysqli_query($conn , $query)) {
              $_SESSION['message'] = "Attendence Marked SuccessFully";
              header("location:attendence.php");
            }else{
              $_SESSION['message'] = mysqli_error($conn);
              header("location:attendence.php");
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
    <script type="text/javascript" src="js/plugins/bootstrap-notify.min.js"></script>
    <script type="text/javascript" src="js/plugins/sweetalert.min.js"></script>
    <!-- Google analytics script-->
   
    <script type="text/javascript">
      function mask(textbox, e) {

      var charCode = (e.which) ? e.which : e.keyCode;
      if (charCode == 46 || charCode > 31&& (charCode < 48 || charCode > 57)) 
         {
            $.notify({
              title: "Oppsss: ",
              message: "Only Numbers are allowed!",
              icon: 'fa fa-check' 
            },{
              type: "warning"
            });
            return false;
         }
     else
         {
             return true;
         }
       }
    </script>
  </body>
</html>