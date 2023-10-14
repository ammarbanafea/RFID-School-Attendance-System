<?php

  require'connectDB.php';
  session_start();
  if (!isset($_SESSION['Admin-name'])) {
    header("location: login.php");
  }
if(isset($_SESSION['type']) && $_SESSION['type'] == 1){
	header("location: attendance_List.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link rel="stylesheet" type="text/css" href="css/attendanceList.css">
</head>

<body>
<?php include'header.php'; ?>
<br>
<br>
<h1 class="slideInDown animated">Here are the students List</h1>
<div class="container">
            <br>
            <!--User table-->
            <div class="table-responsive">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-primary">
                            <tr>
                                <th>ID</th>
                                <th>Student Name</th>
                                <th>Student ID</th>
                                <th>Card No</th>
                                <th>Device Department</th>
                                <th>Date</th>
                                <th>Time In</th>
                                <th>Time Out</th>
                            </tr>
                        </thead>

                        <tbody class="table-secondary">

                        <!--Date Filter-->
                        <?php 
                                $id = $_SESSION['id'];
                                $query = "SELECT * FROM admin INNER JOIN students ON students.id = admin.student_id INNER JOIN attendance_list ON students.card_uid = attendance_list.card_uid WHERE admin.id= '$id'";
                                $query_run = mysqli_query($conn, $query);

                                if(mysqli_num_rows($query_run) > 0)
                                 {
                                    foreach($query_run as $row)
                                     {
                        ?>
                                        <tr>
                                            <td><?= $row['id']; ?></td>
                                            <td><?= $row['username']; ?></td>
                                            <td><?= $row['serialnumber']; ?></td>
                                            <td><?= $row['card_uid']; ?></td>
                                            <td><?= $row['device_dep']; ?></td>
                                            <td><?= $row['checkindate']; ?></td>
                                            <td><?= $row['timein']; ?></td>
                                            <td><?= $row['timeout']; ?></td>

                                        </tr>

                        <?php
                                    }
                                }
                                else
                                {
                                    echo "<p> <font color=white>No Record Found</font> </p>";
                                }
                            
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>