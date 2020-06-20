<?php
  include 'includes/connection.php';
  include 'includes/sessions.php';
?>
<?php 
   if (!isset($_SESSION['login_user'])) {
     $_SESSION['message'] = "<li class='text-danger font-weight-bold'>Login required!</li>";
     header("location:login.php");
   }
?>

<?php 
  if (isset($_GET['action'])) {
    $action=$_GET['action'];
  }else{
  	$action='';
  }

 ?>
 <?php 
 	if ($action == 'delete') {

	if (isset($_GET['meal'])) {
		$selected_meal = $_GET['meal'];
			
		}	else{
			$selected_student = null;
		}
?>

<?php 
		$safe_id = mysqli_real_escape_string($conn ,$selected_meal );
		$query = "UPDATE meals SET status='inactive' WHERE id = $safe_id";
		if (mysqli_query($conn , $query)) {
			$_SESSION['message'] = "MEAL DELETED SUCCESSFULLY";
			header("location:meals.php");
			
		}else {
		$_SESSION['message'] = "Error: " . $query . "<br>" . mysqli_error($conn);;
		}
		
	}
	if ($action == 'restore') {

	if (isset($_GET['meal'])) {
		$selected_meal = $_GET['meal'];
			
		}	else{
			$selected_student = null;
		}
?>

<?php 
		$safe_id = mysqli_real_escape_string($conn ,$selected_meal );
		$query = "UPDATE meals SET status='active' WHERE id = $safe_id";
		if (mysqli_query($conn , $query)) {
			$_SESSION['message'] = "MEAL Restored SUCCESSFULLY";
			header("location:inactive-meals.php");
			
		}else {
		$_SESSION['message'] = "Error: " . $query . "<br>" . mysqli_error($conn);;
		}
		
	}
	
 	
  ?>