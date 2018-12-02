<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 30/11/2018
 * Time: 5:42 AM
 */

class Mobile{

    function add_mobile($conn){

        $userID = $GLOBALS['userID'];
        $user_name = $_POST['mobile-name'];
        $mobile = $_POST['mobile-number'];
        $network =$_POST['crypto-type'];

        $sql ="INSERT INTO `mobile` (`userID`, `name`, `mobile`, `network`) VALUES (?,?,?,?)";
        $result = $conn->prepare($sql);
        $result->bind_param("ssss",$userID,$user_name,$mobile,$network);

        if ($result->execute() == TRUE){
            header("location: index.php?u={$_SESSION['portal']}&ui=settings&e=2");
        }else{
            header("location: index.php?u={$_SESSION['portal']}&ui=settings&e=109");
        }

    }
     function remove_mobile($conn){

    }

    function send_to_mobile($conn){

    }


}