<?php
  include 'includes/connection.php';
  include 'includes/sessions.php';
?>
<?php 
   if (isset($_SESSION['login_user'])) {
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

	if (isset($_GET['student'])) {
		$selected_student = $_GET['student'];
			
		}	else{
			$selected_student = null;
		}
?>

<?php 
		$safe_id = mysqli_real_escape_string($conn ,$selected_student );
		$query = "UPDATE student SET status='inactive' WHERE id = $safe_id";
		if (mysqli_query($conn , $query)) {
			$_SESSION['message'] = "STUDENT DELETED SUCCESSFULLY";
			header("location:students.php");
			
		}else {
		$_SESSION['message'] = "Error: " . $query . "<br>" . mysqli_error($conn);;
		}
		
	}
	
 	
  ?>