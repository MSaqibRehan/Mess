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
                 
                    <form action="" class="row">
                    <div class="form-group col-md-4">
                      <label class="control-label">Select Month</label>
                      <input type="month" class="form-control" id="month" name="month" placeholder="Please Select Month">
                      <input type="hidden" name="student" id="student" value="<?php echo $stdid ?>">
                      
                    </div>
                    <div class="form-group col-md-3">
                      <label class="control-label"></label>
                      <button type="button" id="getinvoice" class="btn btn-primary form-control mt-2">Create Invoice</button>
                    </div>
                  </form>
                  <div class="row">
                    <div class="col-md-12">
                      <span class="errormonth">
                        
                      </span>
                    </div>
                  </div>
                  <div class="load_data">
                    
                  </div>
              
                  
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
    
    <script type="text/javascript">
      $('#getinvoice').click(function(e){  
    e.preventDefault();
    var month = $('#month').val();
    if(month == ''){
      $('.errormonth').html(
      '<span style="color:red;">Enter month !</span>'
      );
      $('#month').focus();
      return false;
      }else{
          $('.errormonth').html("");
        }
          var student=$('#student').val();
alert(month);
          $.ajax({
            url : "load-invoice.php",
            method:"POST",
            data:{ month:month, student:student},           
              success:function(data){
                $('.load_data').html(data);
                  }
            });
  });

    </script>


  </body>
</html>