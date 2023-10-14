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
	<title>Parent</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/manageStudents.css">

   
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/bootbox.min.js"></script>
	<script  type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/parent.js"></script>
	<script>
	  	$(window).on("load resize ", function() {
		    var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
		    $('.tbl-header').css({'padding-right':scrollWidth});
		}).resize();
	</script>
	<script>
	  $(document).ready(function(){
	  	  $.ajax({
	        url: "parent_manage.php"
	        }).done(function(data) {
	        $('#manage_parent').html(data);
	      });
	    setInterval(function(){
	      $.ajax({
	        url: "parent_manage.php"
	        }).done(function(data) {
	        $('#manage_parent').html(data);
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
	<h1 class="slideInDown animated">Add a Parent or update information or remove</h1>
	<div class="form-style-5 slideInDown animated">
		<form enctype="multipart/form-data" >
			<div class="alert_user"></div>
			<fieldset>
				<legend><span class="number">1</span> Parent Information</legend>
                <label for="name"><b>Parent Name</b></label>
				<input type="text" name="admin_name" id="admin_name">
				<input type="hidden" name="id" id="id">
                <label for="name"><b>Parent Email</b></label>
				<input type="text" name="admin_email" id="admin_email">
                <label for="number"><b>Password</b></label>
				<input type="hidden" name="admin_pwd" id="password">
				<input type="text" name="admin_pwd" id="admin_pwd">
				<fieldset>
			<legend><span class="number">2</span> Additional Information</legend>
			<label>
				<label for="Device"><b>Student Name</b></label>
                    <select class="dev_sel" name="student_id" id="student_id" style="color: #000;">
                      <option value="0"></option>
                      <?php
                        require'connectDB.php';
                        $sql = "SELECT * FROM students ORDER BY id ASC";
                        $result = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($result, $sql)) {
                            echo '<p class="error">SQL Error</p>';
                        } 
                        else{
                            mysqli_stmt_execute($result);
                            $resultl = mysqli_stmt_get_result($result);
                            while ($row = mysqli_fetch_assoc($resultl)){
                      ?>
                              <option value="<?php echo $row['id'];?>"><?php echo $row['username']; ?></option>
                      <?php
                            }
                        }
                      ?>
                    </select>
	          	
	      	</label >
			</fieldset>
			<!-- <input type="submit"  name="Add" class="parent_add" value="Add Parent"> -->
			<button type="button" name="Add" class="parent_add">Add Parent</button>
			<button type="button" name="user_upd" class="user_upd">Update Parent</button>
			<button type="button" name="user_rmo" class="user_rmo">Remove Parent</button>
		</form>
	</div>

	<!--Student table-->
	<div class="section">
		
		<div class="slideInRight animated">
			<div id="manage_parent"></div>
		</div>
	</div>
</main>
</body>
</html>