<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 23/11/2018
 * Time: 5:27 PM
 */

$server = "localhost";
$username = "root";
$password = "";
$database = "cash_portal";

//$server = "iquipe.heliohost.org";
//$username = "iquipe_cashporta";
//$password = "@passWD8282";
//$database = "iquipe_cashportal";
$port = "3306";
// Create connection
$conn = new mysqli($server, $username, $password, $database,$port);

// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}else{
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
  // $mysqli->set_charset("utf8mb4");
    session_start();
}

