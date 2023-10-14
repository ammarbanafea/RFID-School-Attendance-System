<?php
//Database connection
include_once 'connectDB.php';
$start_date = $_REQUEST['start_date'];
$end_date = $_REQUEST['end_date'];
$serialnumber = $_REQUEST['serialnumber'];
$device_uid = $_REQUEST['device_uid'];


//Custom function to filter the excel data
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
}

//Excel file name for download 
$fileName = "Attendance_List-" . date('d-m-Y') . ".xls";

// Column names 
$fields = array('ID', 'STUDENT NAME', 'STUDENT ID', 'CARD NO.', 'DEVICE DEPT', 'DATE', 'TIME IN', 'TIME OUT');

//Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n"; 




//Fetch records from database 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$start_date = $_REQUEST['start_date'];
$end_date = $_REQUEST['end_date'];
$serialnumber = $_REQUEST['serialnumber'];
$device_uid = $_REQUEST['device_uid'];

    $query = $conn->query("SELECT * FROM `attendance_list` WHERE checkindate BETWEEN '$start_date' AND '$end_date' AND serialnumber  ='$serialnumber' AND device_uid='$device_uid'"); 
    if($query->num_rows > 0){ 
        //Output each row of the data 
        while($row = $query->fetch_assoc()){ 
            $lineData = array($row['id'], $row['username'], $row['serialnumber'], $row['card_uid'], $row['device_dep'], $row['checkindate'], $row['timein'], $row['timeout']); 
            array_walk($lineData, 'filterData'); 
            $excelData .= implode("\t", array_values($lineData)) . "\n"; 
        } 
    }else{ 
        $excelData .= 'No records found...'. "\n"; 
    }
}

 
 
//Headers for download 
header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
 
// Render excel data 
echo $excelData; 
 
exit;

?>