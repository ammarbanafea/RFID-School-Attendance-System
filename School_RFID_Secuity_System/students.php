<?php
session_start();
if (!isset($_SESSION['Admin-name'])) {
  header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Students</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/favicon.png">

    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <script>
      $(window).on("load resize ", function() {
        var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
        $('.tbl-header').css({'padding-right':scrollWidth});
    }).resize();
    </script>
</head>
<body>
<?php include'header.php'; ?> 
<main>
<section>
  <h1 class="slideInDown animated">Here are all the students</h1>
  <!--Student table-->
  <div class="table-responsive slideInRight animated" style="max-height: 400px;"> 
    <table class="table">
      <thead class="table-primary">
        <tr>
          <th>Student ID</th>
          <th>Student Name</th>
          <th>Gender</th>
          <th>Address</th>
          <th>Card No.</th>
        </tr>
      </thead>

      <tbody class="table-secondary">
        <?php
          //Connect to database
          require'connectDB.php';

          	//Count students
            $sql="select count('1') from students";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($result);
			echo "<h2> Students ($row[0])</h2>";

            $sql = "SELECT * FROM students WHERE add_card=1 ORDER BY id ASC";
            $result = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($result, $sql)) {
                echo '<p class="error">SQL Error</p>';
            }
            else{
                mysqli_stmt_execute($result);
                $resultl = mysqli_stmt_get_result($result);
              if (mysqli_num_rows($resultl) > 0){
                  while ($row = mysqli_fetch_assoc($resultl)){
          ?>
                      <TR>
                      <TD><?php echo $row['serialnumber'];?></TD>
                      <TD><?php echo $row['username'];?></TD>
                      <TD><?php echo $row['gender'];?></TD>
                      <TD><?php echo $row['address'];?></TD>
                      <TD><?php echo $row['card_uid'];?></TD>
                      </TR>
        <?php
                }   
            }
          }
        ?>
      </tbody>
    </table>
  </div>
</section>
</main>
</body>
</html>