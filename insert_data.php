<?php
//include_once('config.php');

// $servername = "149.28.87.71";
// $username = "suwtgfcadr";
// $password = "7VefaXPUjB";
// $dbname = "suwtgfcadr";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "followup_email";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}else {
     echo "Ambuj";
}

$LeadID="5665165";
$Status="Reject";
$Name="Ambuj Sharma";


$sql = "INSERT INTO followup_email(LeadId, LoanStatus, EmailCampName,createdBy, updatedBy) VALUES('$LeadID', '$Status', '$Name', '$LeadID','RadCred' )";


// echo date("d",strtotime("20-06-2022"));
// echo date("m",strtotime("20-06-2022"));
// echo date("Y",strtotime("20-06-2022"));

//echo date('d-m-Y', strtotime("2022-06-20"));

// INSERT INTO followup_email (
// LeadID = $Get['LeadId'],
// Name    = $Get['txtName'],
// createdBy   = $Get['LeadId'],
// updatedBy   = $Get['LeadId'],
// status = 1);


if ($conn->query($sql) === TRUE) {
     echo "New record created successfully";
     //echo $ret;
} else {
     echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();



$ip = getenv('HTTP_CLIENT_IP')?:
getenv('HTTP_X_FORWARDED_FOR')?:
getenv('HTTP_X_FORWARDED')?:
getenv('HTTP_FORWARDED_FOR')?:
getenv('HTTP_FORWARDED')?:
getenv('REMOTE_ADDR');
echo $ip;

 ?>
