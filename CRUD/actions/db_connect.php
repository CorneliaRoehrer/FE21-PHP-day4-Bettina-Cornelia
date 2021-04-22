<?php 

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "sewing_db";

$connect = mysqli_connect($hostname, $username, $password, $dbname);

// if($connect ->connect_error) {
//     die("Connection failed: ".$connect->connect_error);
// } else {
//     echo "Successfully connected";
// }

?>