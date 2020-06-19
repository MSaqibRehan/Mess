<?php 
require 'includes/connection.php';
require 'includes/header.php'
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
        <li><a class="app-menu__item" href="user-register.php"><i class="app-menu__icon fa fa-circle-o"></i><span class="app-menu__label">Register User</span></a></li>
        <li><a class="app-menu__item " href="student-register.php"><i class="app-menu__icon fa fa-circle-o"></i><span class="app-menu__label">Register Student</span></a></li>
        <li><a class="app-menu__item active" href="register-meal.php"><i class="app-menu__icon fa fa-circle-o"></i><span class="app-menu__label">Add New Meal</span></a></li>
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
          <h1><i class="fa fa-dashboard"></i> Add New Meal</h1>
          <p>Please enter details of Add a new Meal</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Add New Meal</a></li>
        </ul>
      </div>
      
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <form action="" method="POST" >
                <div class="form-group">
                  <label class="control-label">Meal Name</label>
                  <input class="form-control" type="text" placeholder="Enter Meal Name" required name="name">
                </div>
                <div class="form-group" >
                  <label class="control-label">Meal Category</label>
                  <select name="category" class="form-control">
                    <option value="-1" selected>Select Meal Category</option>
                    <option value="breakfast">BreakFast</option>
                    <option value="lunch">Lunch</option>
                    <option value="dinner">Dinner</option>
                    
                  </select>
                </div>
                <div class="form-group">
                  <label class="control-label">Meal Price</label>
                  <input class="form-control" type="number" placeholder="Enter Meal Price" required name="price">
                </div>
                <div class="form-group" >
                  <label class="control-label">Meal Status</label>
                  <select name="category" class="form-control">
                    <option value="active" selected="">Continued</option>
                    <option value="inactive">Dis Continued</option>
                  </select>
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