 <?php
  include 'includes/connection.php';
  include 'includes/sessions.php';
?>
<?php 
	$date=$_POST['month'];
	$student=$_POST['student'];
	$returndata="";

		$returndata.='<table class="table table-striped text-center">';

		$fromdate = date("Y-m-01",strtotime($date));
		$todate = date("Y-m-t", strtotime($date));

		$get_month = date('M',strtotime($fromdate));
		$get_year = date('Y',strtotime($fromdate));

	$meals=null;
 	$std_query=mysqli_query($conn,"SELECT * FROM student WHERE id=$student");
    $std_record=mysqli_fetch_assoc($std_query);
    $attendence_query=mysqli_query($conn,"SELECT * FROM attendence WHERE std_id=$student AND created_at LIKE '$date%'");
    $attendence_count=mysqli_num_rows($attendence_query);
    if ($attendence_count==0) {
    	$meals="No Meals Taken";
    }else{
    	while($mealset = mysqli_fetch_assoc($attendence_query)){
    		$mid=$mealset['meal_id'];
 		    $meal=mysqli_query($conn, "SELECT * FROM meals WHERE id = $mid");
 		    $mealsmr=mysqli_fetch_assoc($meal);
 		    $meals=$meals+$mealsmr['price'];
    	}
    }

    	$extras=null;
    $extra_query=mysqli_query($conn,"SELECT * FROM extra_taken WHERE std_id=$student AND created_at LIKE '$date%'");
    $extra_count=mysqli_num_rows($attendence_query);
    if ($extra_count==0) {
    	$extras="No Extras Taken";
    }else{
    	while($extraset = mysqli_fetch_assoc($extra_query)){
    		$mid1=$extraset['meal_id'];
 		    $extra=mysqli_query($conn, "SELECT * FROM meals WHERE id = $mid1");
 		    $extrasmr=mysqli_fetch_assoc($extra);
 		    $extras=$extras+$extrasmr['price'];
    	}
    }
    	$total=0;
    	if ($extra_count==0 || $attendence_count==0	) {
    		if ($extra_count==0) {
    			$total=$meals;
	    	}elseif($attendence_count==0){
	    		$total=$extras;
	    	}
    	}else{
    		$total=$meals+$extras;
    	}
    	

 $returndata.='<tr ><td colspan="2" class="text-center font-weight-bold text-info" style="font-size:20px">Report Of Month : '. $get_month .','.$get_year.'</td></tr>
 				<tr class="text-center"><td> Total Meals : '.$attendence_count.'</td><td>Total Extras : '.$extra_count.'</td></tr>';

$returndata.='<tr id="header" ><th>Bill of Meals</th><th>'.$meals.'</th></tr>';
$returndata.='<tr id="header"><th>Bill of Extras</th><th>'.$extras.'</th></tr>';


$returndata.='<tr id="header" class="bg-success"><th>Total BIll</th><th>'.$total.'</th></tr>';

 	  

 $returndata.="</table>";

			echo $returndata;
 	?>
