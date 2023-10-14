<?php
  require'connectDB.php';
  session_start();
  if (!isset($_SESSION['Admin-name'])) {
    header("location: login.php");
  }

  if(isset($_SESSION['type']) && $_SESSION['type'] == 0){
	header("location: student_List.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance List</title>
    <link rel="stylesheet" type="text/css" href="css/attendanceList.css">
</head>

<body>
<?php include'header.php'; ?>
<br>
<br>
<h1 class="slideInDown animated">Here are the students attendance</h1>
<div class="container">
    <div class="modal-content">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="card-body">
                    <form action="" method="GET">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select from this Date</label>
                                    <input type="date" name="start_date" value="<?php if(isset($_GET['start_date'])){ echo $_GET['start_date']; } ?>" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>To End of this Date</label>
                                    <input type="date" name="end_date" value="<?php if(isset($_GET['end_date'])){ echo $_GET['end_date']; } ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                
                                    <label for="Device"><b>Device</b></label>
                                        <select class="dev_sel dev_sel2" name="device_uid" id="device_uid" style="color: #000;">
                                        <option value="0"></option>
                                        <?php
                                            require'connectDB.php';
                                            $sql = "SELECT * FROM devices ORDER BY id ASC";
                                            $result = mysqli_stmt_init($conn);
                                            if (!mysqli_stmt_prepare($result, $sql)) {
                                                echo '<p class="error">SQL Error</p>';
                                            } 
                                            else{
                                                mysqli_stmt_execute($result);
                                                $resultl = mysqli_stmt_get_result($result);
                                                while ($row = mysqli_fetch_assoc($resultl)){
                                        ?>
                                                <option value="<?php echo $row['device_uid'];?>" 
                                                <?php 
                                                if(isset($_GET['device_uid']) == $row['device_uid']){ ?>
                                                    selected
                                                <?php
                                                }
                                                ?>
                                                ><?php echo $row['device_name']; ?></option>
                                        <?php
                                                }
                                            }
                                        ?>
                                        </select>
                                    
                                </label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                
                                    <label for="Device"><b>Student Name</b></label>
                                        <select class="dev_sel dev_sel2" name="serialnumber" id="serialnumber" style="color: #000;">
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
                                                <option value="<?php echo $row['serialnumber'];?>" 
                                                <?php 
                                                if(isset($_GET['serialnumber']) == $row['serialnumber']){ ?>
                                                    selected
                                                <?php
                                                }
                                                ?>
                                                ><?php echo $row['username']; ?></option>
                                        <?php
                                                }
                                            }
                                        ?>
                                        </select>
                                    
                                </label>
                                </div>
                            </div>

                            <
                            <div class="col-md-4">
                                <div class="form-group">
                                    <br>
                                    <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                    </form>
                            <!--Export to Excel-->
                            <form method="POST" action="export_Excel.php">
                                <div class="form-group">
                                <input type="hidden" name="start_date" value="<?php if(isset($_GET['start_date'])){ echo $_GET['start_date']; } ?>" class="form-control">
                                <input type="hidden" name="end_date" value="<?php if(isset($_GET['end_date'])){ echo $_GET['end_date']; } ?>" class="form-control">
                                <input type="hidden" name="serialnumber" value="<?php if(isset($_GET['serialnumber'])){ echo $_GET['serialnumber']; } ?>" class="form-control">
                                <input type="hidden" name="device_uid" value="<?php if(isset($_GET['device_uid'])){ echo $_GET['device_uid']; } ?>" class="form-control">
                                    <button type="submit" class="btn btn-primary" 
                                    action="export_Excel.php" style="background-color:#4CAF50;">Export to Excel</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
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
                            if(isset($_GET['start_date']) && isset($_GET['end_date']) || isset($_GET['device_uid']) || isset($_GET['serialnumber']))
                            {
                                $start_date = $_GET['start_date'];
                                $end_date = $_GET['end_date'];
                                $serialnumber = $_GET['serialnumber'];
                                $device_uid = $_GET['device_uid'];

                                $query = "SELECT * FROM `attendance_list` WHERE checkindate BETWEEN '$start_date' AND '$end_date' AND serialnumber = '$serialnumber' AND device_uid='$device_uid'";
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