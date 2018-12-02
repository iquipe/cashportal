<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 24/11/2018
 * Time: 10:30 AM
 */

class UserProfile{

    function update_profile($conn){

        $id = $_SESSION['user-id'];
        $f_name =$_POST['f-name'];
        $l_name = $_POST['l-name'];

        $username = $_POST['username'];
        $password = $_POST['password'];

        $email = $_POST['email'];
        $mobile = $_POST['mobile'];

        $address = $_POST['address'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $postal = $_POST['postal'];
        $about = $_POST['about'];

        $sql= "UPDATE `user` SET `username`=?, `password`=?, `email`=?, `fname`=?, `lname`=?, `mobile`=?, `country`=?, `city`=?, `address`=?, `about`=?, `postal`=? WHERE (`userID`='$id')";
        $update = $conn->prepare($sql);
        $update->bind_param("sssssssssss",$username,$password,$email,$f_name,$l_name,$mobile,$country,$city,$address,$about,$postal);

        if ($update->execute() == TRUE){
            header("location: index.php?u={$_SESSION['portal']}&ui=profile&e=2");
        }else{
            header("location: index.php?e=1");
        }

    }

}