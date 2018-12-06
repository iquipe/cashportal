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

// Create connection
$conn =new mysqli($server, $username, $password, $database);

// Check connection
if (!$conn) {
    ///die("Connection failed: " . mysqli_connect_error());
    $server = "iquipe.heliohost.org";
    $username = "iquipe_castporta";
    $password = "@passWD8282";
    $database = "iquipe_cash_portal";
    $conn =new mysqli($server, $username, $password, $database);


}else{
    session_start();
}

