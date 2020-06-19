 <?php
  include 'includes/connection.php';
  include 'includes/sessions.php';
  include 'includes/header.php';
?>
<?php 
   if (isset($_SESSION['login_student'])) {
     $_SESSION['message'] = "<li class='text-danger font-weight-bold'>Login required!</li>";
     header("location:login.php");
   }
?>
<?php 
  if (isset($_GET['student'])) {
    $stdid=$_GET['student'];
  }
 ?>
 <?php 
    $std_query=mysqli_query($conn,"SELECT * FROM student WHERE id=$stdid");
    $std_record=mysqli_fetch_assoc($std_query);
    $attendence_query=mysqli_query($conn,"SELECT * FROM attendence WHERE std_id=$stdid");
    $extra_query=mysqli_query($conn,"SELECT * FROM extra_taken WHERE std_id=$stdid");
  ?>
    <!-- Sidebar menu-->
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
            <div class="tile-body">
            <h3>Student Details</h3>
            <div class="bs-component">
              <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#profile">Profile</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#meals">Meals Taken</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#invoice">Invoice</a></li>

              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="profile">
                  <div class="row">
                    
                    <div class="col-md-8 mx-auto">
                      <div class="row my-5">
                        <div class="col-12">
                          <table class="table">
                            <tr>
                              <td colspan="2" class="text-center">
                                <img src="images/user.png" style="max-height: 200px; max-width: 200px;" alt="user Image"  class="img img-fluid rounded-circle mx-auto">
                              </td>
                            </tr>
                            <tr>
                              <th>Student Name</th>
                              <td> <?php echo $std_record['std_name']; ?></td>
                            </tr>
                            <tr>
                              <th>Father Name</th>
                              <td> <?php echo $std_record['father_name']; ?></td>
                            </tr>
                            <tr>
                              <th>Student CNIC</th>
                              <td> <?php echo $std_record['cnic']; ?></td>
                            </tr>
                            <tr>
                              <th>Student Roll No</th>
                              <td> <?php echo $std_record['roll_no']; ?></td>
                            </tr>
                            <tr>
                              <th>Student Mobile No</th>
                              <td> <?php echo $std_record['mobile_no']; ?></td>
                            </tr>
                            <tr>
                              <th>Student DOB</th>
                              <td> <?php echo $std_record['dob']; ?></td>
                            </tr>
                            <tr>
                              <th>Student Gender</th>
                              <td> <?php echo $std_record['gender']; ?></td>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="meals">
                  <h3 class="my-3">Attendence / Meals Taken</h3>
                  
                          <table class="table table-hover table-bordered mt-5" id="sampleTable">
                            <thead>
                              <tr>
                                <th>Meal Taken</th>
                                <th>Meal Category</th>
                                <th>Date</th>
                                <th>Meal Taken By</th>
                              </tr>
                            </thead>
                            <tbody>
                    <?php 
                       while ($att_record=mysqli_fetch_assoc($attendence_query)) {
                        $id=$att_record['meal_id'];
                        $meal_query=mysqli_query($conn,"SELECT * FROM meals WHERE id=$id");
                        $meal_record=mysqli_fetch_assoc($meal_query)
                     ?> 
                        <tr>
                          <td><?php echo $meal_record['meal_name'] ?></td>
                          <td><?php echo $meal_record['category'] ?></td>
                          <td><?php echo $att_record['atdate'] ?></td>
                          <td><?php echo $att_record['mcreated_by'] ?></td>
                        </tr>
                    <?php
                      }
                    ?>
                            </tbody>
                          </table>
                        
                        <hr>

                          <h3 class="my-3">Extra meals Taken</h3>
                  
                          <table class="table table-hover table-bordered mt-5" id="sampleTable1">
                            <thead>
                              <tr>
                                <th>Meal Taken</th>
                                <th>Meal Category</th>
                                <th>Date</th>
                                <th>Meal Taken By</th>
                              </tr>
                            </thead>
                            <tbody>
                    <?php 
                       while ($att_record=mysqli_fetch_assoc($extra_query)) {
                        $id=$att_record['meal_id'];
                        $meal_query=mysqli_query($conn,"SELECT * FROM meals WHERE id=$id");
                        $meal_record=mysqli_fetch_assoc($meal_query)
                     ?> 
                        <tr>
                          <td><?php echo $meal_record['meal_name'] ?></td>
                          <td><?php echo $meal_record['category'] ?></td>
                          <td><?php echo $att_record['atdate'] ?></td>
                          <td><?php echo $att_record['mcreated_by'] ?></td>
                        </tr>
                    <?php
                      }
                    ?>
                            </tbody>
                          </table>

                    
                </div>
                <div class="tab-pane fade" id="invoice">
                  <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.</p>
                </div>
               
              </div>
            </div>





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
    <script type="text/javascript">$('#sampleTable').DataTable();$('#sampleTable1').DataTable();</script>
    <!-- Google analytics script-->
    
  </body>
</html>