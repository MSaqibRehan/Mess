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
  if (isset($_GET['meal'])) {
    $mealid=$_GET['meal'];
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
          <h1><i class="fa fa-dashboard"></i> Register Meal</h1>
          <p>Please enter details to register a new Meal</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Register Meal</a></li>
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
                  if (isset($_GET['meal'])) {
                    $id=$_GET['meal'];
                    $record_set=mysqli_query($conn , "SELECT * FROM meals WHERE id = $id");
                   
                    $meal_set = mysqli_fetch_assoc($record_set)
                    ?>

                   
                    <form accept="" method="POST" >
                      <div class="form-group">
                        <label class="control-label">Meal Name</label>
                        <input class="form-control" value="<?php echo $meal_set['meal_name']; ?>" type="text" placeholder="Enter full name" required name="name">
                      </div>
                      <div class="form-group">
                        <label class="control-label">Meal Category</label>
                        <select name="category" class="form-control">
                          <?php 
                            if ($meal_set['category'] == 'breakfast') {
                          ?>
                            <option value="breakfast">Breakfast</option>
                            <option value="lunch">Lunch</option>
                            <option value="dinner">Dinner</option>
                          <?php                              
                            }
                          ?>
                          <?php 
                            if ($meal_set['category'] == 'lunch') {
                          ?>
                            <option value="lunch">Lunch</option>                            
                            <option value="breakfast">Breakfast</option>
                            <option value="dinner">Dinner</option>
                          <?php                              
                            }
                          ?>
                          <?php 
                            if ($meal_set['category'] == 'dinner') {
                          ?>
                            <option value="dinner">Dinner</option>
                            <option value="breakfast">Breakfast</option>
                            <option value="lunch">Lunch</option>                            
                            
                            
                          <?php                              
                            }
                          ?>

                          
                        </select>
    
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label">Price</label>
                        <input class="form-control" onkeypress="return mask(this,event);" type="text" placeholder="Enter Price of one meal" value="<?php echo $meal_set['price'] ?>" required name="price">
                      </div>
                      <div class="form-group">
                        <input type="submit" name="update" value="Update Meal" class="btn btn-primary" >
                        <input type="reset" name="reset" value="Reset" class="btn btn-secondary">
                      </div>
                    </form>
                  <?php
                    
                  }else{
                    ?>

                   
                     <form accept="" method="POST" >
                      <div class="form-group">
                        <label class="control-label">Meal Name</label>
                        <input class="form-control" type="text" placeholder="Enter full name" required name="name">

                      </div>
                      <div class="form-group">
                        <label class="control-label">Meal Category</label>
                        <select name="category" class="form-control">
                          <option value="null" >Please Select a Category</option>
                          <option value="breakfast">Breakfast</option>
                          <option value="lunch">Lunch</option>
                          <option value="dinner">Dinner</option>
                        </select>
    
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label">Price</label>
                        <input class="form-control" type="text" onkeypress="return mask(this,event);" placeholder="Enter Price of one meal in PKR" required name="price">
                      </div>
                      <div class="form-group">
                        <input type="submit" name="submit" value="Register Meal" class="btn btn-primary" >
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
        $category = mysqli_real_escape_string($conn , $_POST['category']);
        $price = mysqli_real_escape_string($conn , $_POST['price']);
        

             
        
        date_default_timezone_set("Asia/Karachi");
       $date =  date("Y-m-d H:i:s");
       $author ="rehan";
        

   
       if (empty($name)  || empty($price) || $category =="null" ) {

            $_SESSION['message'] = null;
            if(empty($name)){
              $_SESSION['message'] .= "<li>Please Enter Meal Name</li>";
            }
            if( $category == "null"){
              $_SESSION['message'] .= "<li>Please Select Category</li>" ;
            }
             if(empty($price)){
              $_SESSION['message'] .= "<li>Please Enter Valid price</li>";
            }
           

              header("location:meals-form.php");
          
          }else{
            $query = "INSERT INTO meals (meal_name , category ,price ,status ,created_by ,created_at) VALUES('{$name}' , '{$category}' , '{$price}', 'active'  , '{$author}', '{$date}')";
            if (mysqli_query($conn , $query)) {
              $_SESSION['message'] = "New Meal Added";
              header("location:meals.php");
            }else{
              $_SESSION['message'] = mysqli_error($conn);
              header("location:meals-form.php");
            }
          }
        }

      if (isset($_POST['update'])) {
        
        $name = mysqli_real_escape_string($conn , $_POST['name']);
        $category = mysqli_real_escape_string($conn , $_POST['category']);
        $price = mysqli_real_escape_string($conn , $_POST['price']);
       

        
        date_default_timezone_set("Asia/Karachi");
       $date =  date("Y-m-d H:i:s");
       $author ="rehan";
        

   
       if (empty($name) || empty($category) || empty($price) || $category =="null" ) {

            $_SESSION['message'] = null;
            if(empty($name)){
              $_SESSION['message'] .= "<li>Please Enter Meal Name</li>";
            }
            if (empty($category)) {
              $_SESSION['message'] .= "<li>Please Select Category</li>" ;
            }elseif( $category == "null"){
              $_SESSION['message'] .= "<li>Please Select Category</li>" ;
            }
             if(empty($price)){
              $_SESSION['message'] .= "<li>Please Enter Valid price</li>";
            }
           

              header("location:meals-form.php");
          
          }else{
            $query = "UPDATE meals SET meal_name ='{$name}' ,category ='{$category}' ,price = '{$price}',created_by ='{$author}',created_at = '{$date}' WHERE id=$mealid";
            if (mysqli_query($conn , $query)) {
              $_SESSION['message'] = " Meal Updated SUCCESSFULLY";
              header("location:meals.php");
            }else{
              $_SESSION['message'] = mysqli_error($conn);
              header("location:meals-form.php?meal=$mealid");
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