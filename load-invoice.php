 <?php
  include 'includes/connection.php';
  include 'includes/sessions.php';
?>
<?php 
	$month=$_POST['month'];
	$student=$_POST['student'];
 	$startdate=$month."-00";
 	$enddate=$month."-31";
 	$std_query=mysqli_query($conn,"SELECT * FROM student WHERE id=$student");
    $std_record=mysqli_fetch_assoc($std_query);
    $attendence_query=mysqli_query($conn,"SELECT * FROM attendence WHERE std_id=$student AND atdate BETWEEN '$startdate' AND '$enddate'");
    $extra_query=mysqli_query($conn,"SELECT * FROM extra_taken WHERE std_id=$student AND atdate BETWEEN '$startdate' AND '$enddate'");
 	
 	if (!$extra_query || empty($extra_query) || empty(mysqli_fetch_assoc($extra_query))) {
 		$extra = "No extra Taken for this month";
 	}else{
 		$extra=0;
 		while ($extra_set=mysqli_fetch_assoc($extra_query)) {
 			$mid=$extra_set['meal_id'];
 		    $extrapq=mysqli_query($conn, "SELECT * FROM meals WHERE id = $mid");
 		    $extramr=mysqli_fetch_assoc($extrapq);
 		    $extra=$extra+$extramr['price'];
 		}
 	}
 	if (!$attendence_query || empty($attendence_query) || empty(mysqli_fetch_assoc($attendence_query))) {
 		$meals = "No meals Taken for this month";
 	}else{
 		$meals=0;
 		while ($meals_set=mysqli_fetch_assoc($attendence_query)) {
 			$mid=$meals_set['meal_id'];
 		    $mealspq=mysqli_query($conn, "SELECT * FROM meals WHERE id = $mid");
 		    $mealsmr=mysqli_fetch_assoc($mealspq);
 		    $meals=$meals+$mealsmr['price'];
 		}
 	}  
echo "meals:" . $meals."etra : " .$extra;
 	?>
