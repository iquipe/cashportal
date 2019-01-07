<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 23/11/2018
 * Time: 5:27 PM
 */

if (isset($_SERVER['SERVER_NAME'])){
    if ($_SERVER['SERVER_NAME'] == "localhost" || $_SERVER['SERVER_NAME'] == '172.0.0.1'){
        $server = "localhost";
        $username = "root";
        $password = "";
        $database = "cash_portal";
        $port = "3306";
        // Create connection
        $conn = new mysqli($server, $username, $password, $database,$port);
    }else{
        $server = "localhost";
        $username = "root";
        $password = "@passWD8282";
        $database = "cash_portal";
        $port = "3306";
        // Create connection
        $conn = new mysqli($server, $username, $password, $database,$port);
    }

} else{
    echo "CAN NOT CONNECT TO SERVER";
    exit(0);
}

// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}else{
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
  // $mysqli->set_charset("utf8mb4");
    session_start();
}

