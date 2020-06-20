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
  if (isset($_SESSION['login_user'])) {
  	$login_user=$_SESSION['login_user'];
  }else{
  	$login_user='';
  }
 ?>
 <?php 
 	if ($action == 'delete') {

	if (isset($_GET['user'])) {
		$selected_user = $_GET['user'];
			
		}	else{
			$selected_user = null;
		}
?>

<?php 
	if (isset($selected_user)) {
		
		$record_query = "SELECT * FROM users WHERE id = $selected_user";
		$record = mysqli_query($conn , $record_query);
		$record_set = mysqli_fetch_assoc($record);
		if ($login_user == $record_set['username']) {

			$_SESSION['message'] = "you cannot delete the logged in account";
			header("location:users.php");
		
		}else{
		$safe_id = mysqli_real_escape_string($conn ,$selected_user );
		$query = "DELETE FROM users WHERE id = $safe_id";
		if (mysqli_query($conn , $query)) {
			$_SESSION['message'] = "user DELETED SUCCESSFULLY";
			header("location:users.php");
			
		}else {
		$_SESSION['message'] = "Error: " . $query . "<br>" . mysqli_error($conn);;
		}}
		
	}
	
 	}
  ?>