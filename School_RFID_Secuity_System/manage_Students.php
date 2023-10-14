<?php
session_start();

if (!isset($_SESSION['Admin-name'])) {
  header("location: login.php");
}
if(isset($_SESSION['type']) && $_SESSION['type'] == 0){
	header("location: student_List.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Students Management</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/manageStudents.css">

    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.js"
	        integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	        crossorigin="anonymous">
	</script>
    <script type="text/javascript" src="js/bootbox.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script src="js/manage_students.js"></script>
	<script>
	  	$(window).on("load resize ", function() {
		    var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
		    $('.tbl-header').css({'padding-right':scrollWidth});
		}).resize();
	</script>
	<script>
	  $(document).ready(function(){
	  	  $.ajax({
	        url: "manage_Students_Table.php"
	        }).done(function(data) {
	        $('#manage_students').html(data);
	      });
	    setInterval(function(){
	      $.ajax({
	        url: "manage_Students_Table.php"
	        }).done(function(data) {
	        $('#manage_students').html(data);
	      });
	    },5000);
	  });
	</script>
</head>
<body>
<?php include'header.php';?>
<main>
	<br>
	<br>
	<br>
	<h1 class="slideInDown animated">Add a new student or update information or remove</h1>
	<div class="form-style-5 slideInDown animated">
		<form enctype="multipart/form-data">
			<div class="alert_user"></div>
			<fieldset>
				<legend><span class="number">1</span> Student Information</legend>
				<input type="hidden" name="user_id" id="user_id">
                <label for="name"><b>Student Name</b></label>
				<input type="text" name="name" id="name">
                <label for="number"><b>Student ID</b></label>
				<input type="text" name="number" id="number">
                <label for="address"><b>Student Address</b></label>
				<input type="address" name="address" id="address">
			</fieldset>
			<fieldset>
			<legend><span class="number">2</span> Additional Information</legend>
			<label>
				<label for="Device"><b>Student Course</b></label>
                    <select class="dev_sel" name="dev_sel" id="dev_sel" style="color: #000;">
                      <option value="0">All Departments</option>
                      <?php
                        require'connectDB.php';
                        $sql = "SELECT * FROM devices ORDER BY device_name ASC";
                        $result = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($result, $sql)) {
                            echo '<p class="error">SQL Error</p>';
                        } 
                        else{
                            mysqli_stmt_execute($result);
                            $resultl = mysqli_stmt_get_result($result);
                            while ($row = mysqli_fetch_assoc($resultl)){
                      ?>
                              <option value="<?php echo $row['device_uid'];?>"><?php echo $row['device_dep']; ?></option>
                      <?php
                            }
                        }
                      ?>
                    </select>

				<input type="radio" name="gender" class="gender" value="Male" checked="checked">Male
				<input type="radio" name="gender" class="gender" value="Female">Female
	          	
	      	</label >
			</fieldset>
			<br>
			<button type="button" name="user_add" class="user_add">Add Student</button>
			<button type="button" name="user_upd" class="user_upd">Update Student</button>
			<button type="button" name="user_rmo" class="user_rmo">Remove Student</button>
		</form>
	</div>

	<!--Student table-->
	<div class="section">
		
		<div class="slideInRight animated">
			<div id="manage_students"></div>
		</div>
	</div>
</main>
</body>
</html>