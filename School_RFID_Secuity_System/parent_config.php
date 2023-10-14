<?php  
//Connect to database
require'connectDB.php';

//Add parent
if (isset($_POST['Add'])) {
    $name = $_POST['admin_name'];
    $email = $_POST['admin_email'];
    $student_id = $_POST['student_id'];
    $pass = $_POST['admin_pwd'];
    $password = password_hash($pass,  PASSWORD_DEFAULT);

    
    //check if there any selected parent
    $sql = "INSERT INTO `admin` (admin_name, admin_email, admin_pwd, student_id) VALUES ('$name', '$email', '$password', '$student_id')";
    $result = mysqli_query($conn , $sql);
}

//update parent
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['admin_name'];
    $email = $_POST['admin_email'];
    $admin_pwdShow = $_POST['admin_pwdShow'];
    $password = $_POST['admin_pwd'];
    $student_id = $_POST['student_id'];
    if(!empty($admin_pwdShow)){
        $password = $_POST['admin_pwdShow'];
    }else{
        $pass = $_POST['admin_pwd'];
        $password = password_hash($pass,  PASSWORD_DEFAULT);
        
    }
    //check if there any selected parent
    $sql = "UPDATE `admin` SET `admin_name`='$name',`admin_email`='$email',`admin_pwd`='$password' ,`student_id`= '$student_id'  WHERE id =$id";
    $result = mysqli_query($conn , $sql);
    echo $result;
    exit();
}


//select parent 
if (isset($_GET['selectButton'])) {
    $id = $_GET['id'];
    $sqlShow = "SELECT * FROM  `admin`  WHERE id={$id}";
    $result = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($result, $sqlShow)) {
        echo '<p class="error">SQL Error</p>';
    }
    else{
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        header('Content-Type: application/json');
        $data = array();
        if ($row = mysqli_fetch_assoc($resultl)) {
            foreach ($resultl as $row) {
                $data[] = $row;
            }
        }
        print json_encode($data);
    
        $resultl->close();
        $conn->close();
    } 
 }
// delete parent 
if (isset($_POST['Delete'])) {
    $id = $_POST['id'];
    if (empty($id)) {
        echo "There no selected user to remove";
        exit();
    } else {
        $sql = "DELETE FROM `admin` WHERE id={$id}";
        $result = mysqli_query($conn , $sql);
        echo $result;
        exit();

    }
}


if(isset($_POST['enrollmentUpdate'])){
    $id = $_POST['id'];
    $device_mode = $_POST['device_mode'];
    if(empty($id)){
        echo "There no selected user to remove";
        exit();
    }else{
        $sql = "UPDATE `devices` SET`device_mode`='{$device_mode}' WHERE id={$id};";
        $result = mysqli_query($conn , $sql);
        header("location: manage_Students.php");
    }
}

if(isset($_POST['attendanceUpdate'])){
    $id = $_POST['id'];
    $device_mode = $_POST['device_mode'];
    if(empty($id)){
        echo "There no selected user to remove";
        exit();
    }else{
        $sql = "UPDATE `devices` SET`device_mode`='{$device_mode}' WHERE id={$id};";
        $result = mysqli_query($conn , $sql);
        header("location:attendance_List.php");
    }
}
?>