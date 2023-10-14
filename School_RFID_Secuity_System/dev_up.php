<?php 
session_start();
if (!isset($_SESSION['Admin-name'])) {
    header("location: login.php");
  }
if($_SESSION['type'] == 0){
	header("location: student_List.php");
}
?>

<div id="enrollment" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
	<form method="post" action="parent_config.php">
	<div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
	  <input type="hidden" name="id" id="enrollmentModel" value="">
	  <input type="hidden" name="device_mode" value="1">
      <div class="modal-body">
        <p>Do you really want to change this Device Mode?</p>
      </div>
      <div class="modal-footer">
	  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="enrollmentUpdate" class="btn btn-info" >Submit</button>
      </div>
    </div>
	</form>
    

  </div>
</div>

<div id="attendance" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <form method="post" action="parent_config.php">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
		<input type="hidden" name="id" id="attendanceModel" value="" >
	  	<input type="hidden" name="device_mode" value="1">
      </div>
      <div class="modal-body">
        <p>Do you really want to change this Device Mode?</p>
      </div>
      <div class="modal-footer">
	  	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="attendanceUpdate" class="btn btn-info">Submit</button>
      </div>
    </div>
  </form>
  </div>
</div>
<div class="table-responsive">          
	<table class="table">
		<thead>
	      <tr>
	        <th>Device Name</th>
	        <th>Department</th>
	        <th>Device No.</th>
	        <th>Created Date</th>
	        <th>Mode</th>
	        <th>Configration</th>
	      </tr>
    	</thead>
    	<tbody>
			<?php  
		    	require'connectDB.php';

				//Show available devices
		    	$sql = "SELECT * FROM devices ORDER BY id ASC";
				$result = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($result, $sql)) {
				    echo '<p class="error">SQL Error</p>';
				} 

				//Device mode
				else{
				    mysqli_stmt_execute($result);
				    $resultl = mysqli_stmt_get_result($result);
				    echo '<form action="" method="POST" enctype="multipart/form-data">';
					    while ($row = mysqli_fetch_assoc($resultl)){

					      	$radio1 = ($row["device_mode"] == 0) ? "checked" : "" ;
					      	$radio2 = ($row["device_mode"] == 1) ? "checked" : "" ;

					      	$de_mode = '<div class="mode_select">
					      	<input type="radio" id="'.$row["id"].'-one" name="'.$row["id"].'"  data-id="'.$row["id"].'" value="0" '.$radio1.'/>
					                  
										<button type="button" class="btn btn-info btn-lg" data-toggle="modal" value= '.$row["id"].' data-target="#enrollment"  id="enrollmentValue" onClick="getEnrollmentValue('.$row["id"].')">Enrollment</button>
		                    <input type="radio" id="'.$row["id"].'-two" name="'.$row["id"].'"  data-id="'.$row["id"].'" value="1" '.$radio2.'/>
					                   
										<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#attendance" id="attendanceValue"
										onClick="getAttendanceValue('.$row["id"].')"
										>Attendance</button>
					                    </div>';

					    	echo '<tr>
							        <td>'.$row["device_name"].'</td>
							        <td>'.$row["device_dep"].'</td>
							        <td><button type="button" class="dev_uid_up btn btn-warning" id="del_'.$row["id"].'" data-id="'.$row["id"].'" title="Update this device Token"><span class="glyphicon glyphicon-refresh"> </span></button>
							        	'.$row["device_uid"].'
							        </td>
							        <td>'.$row["device_date"].'</td>
							        <td>'.$de_mode.'</td>
							        <td>
								    	<button type="button" class="dev_del btn btn-danger" id="del_'.$row["id"].'" data-id="'.$row["id"].'" title="Delete this device"><span class="glyphicon glyphicon-trash"></span></button>
								    </td>
							      </tr>';
					    }
				    echo '</form>';
				}
		    ?>
    	</tbody>
	</table>
</div>
<script>
	function getEnrollmentValue(id){

		// let enrollmentId = document.getElementById("enrollmentValue");
			let enrollmentModel = $('#enrollmentModel').val(id);
	}

	function getAttendanceValue(id){

// let enrollmentId = document.getElementById("enrollmentValue");
	let enrollmentModel = $('#attendanceModel').val(id);
}

</script>

