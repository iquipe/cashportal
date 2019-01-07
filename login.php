<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 23/11/2018
 * Time: 4:00 PM
 */

include_once "control/db.php";

if(!$_SERVER["REQUEST_METHOD"] ==="POST"){

}else{

    if ($_POST['submit'] === "Sign In"){
        //login session
        if (!isset($_POST['username'])){
            echo "no username found";
            exit(0);
        }elseif(!isset($_POST['password'])){
            echo "no username found";
            exit(0);
        }else{

            //check if email exist
            $sql = "SELECT * FROM `user` WHERE `username` = ? and `password` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss",$username,$password);

            //sign up session
            $username = $_POST['username'];
            $password = $_POST['password'];
            $stmt->execute();

            $result = $stmt->get_result();
            if($result->num_rows == 0){
                header("location: index.php?validate=0");
            }else {
                while ($row = $result->fetch_assoc()) {
                    $token = $row['token'];
                    $status = $row['statusID'];
                    $account = $row["account"];
                    $userID = ((($row['userID'] * 2) - 16043572) / 1024);
                    $_SESSION['user-token'] = $token;
                    $_SESSION['user-status'] = $status;
                    $userStatus = $row['statusID'];

                    setcookie("user-token", $token, time() + (86400 * 30), "/");
                    setcookie("user-account", $account, time() + (86400 * 30), "/");
                    setcookie("user-track-id", $userID, time() + (86400 * 30), "/");

                    header("location: index.php?u=user&ui=dashboard&e=1");
                }
            }
        }
    }elseif ($_POST['submit'] === "Create account"){

        //check if email exist
        $sql = "SELECT * FROM get_user WHERE get_user.email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s",$email);

        //sign up session
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        $stmt->execute();

        $result = $stmt->get_result();
        if (mysqli_num_rows($result) > 0){
            //mail exist
            header("location: index.php?validate=1");
        }else{

            $account = date("Hyimsd");
            $token = $username."/".$password."/".$email;
            $token = md5(md5($token,true));
            $token = "u-".rand(1000,9999)."".$token."".rand(99,10);
            $sql = "INSERT INTO `user` (`username`, `password`, `email`,`token`,`account`) VALUES (?,?,?,?,?)";
            $create = $conn->prepare($sql);
            $create->bind_param("sssss",$username,$password,$email,$token,$account);

            if ($create->execute() === TRUE){

                $last_id = mysqli_insert_id($conn);
                $userID = ((($last_id*2)-16043572)/1024);
                $_SESSION['user-token'] =$token;
                $_SESSION['user-status'] = "1";
                setcookie("user-token",$token,time()+(86400 * 30),"/");
                setcookie("user-account",$account,time()+(86400 * 30),"/");
                setcookie("user-track-id",$userID,time()+(86400 * 30),"/");

                header("location: index.php?u=user&ui=dashboard&e=1");

            }else{
                header("location: index.php?create-account=0");
            }
        }

    }elseif($_POST['submit'] === "Recovery"){
        if (empty($_POST['email-recovery'])){
            header("location: index.php?_route=recovery");
        }else{

            $sql = "SELECT * FROM get_user WHERE get_user.email = ?";
            $check = $conn->prepare($sql);
            $check->bind_param("s",$email);

            $email = $_POST['email-recovery'];
            $check->execute();
            $result =$check->get_result();
            if (mysqli_num_rows($result) > 0){
                $user = mysqli_fetch_assoc($result);
              echo  $username= $user['username'];
                $password = $user['password'];
                $user = date('YmdHis')."/".$username."/".$password;
                $token = md5(md5($user,true));
                setcookie("token", $token , time() + (60 * 5));

                header("location: index.php?u={$token}&e=1");
            }else{
                $token = md5(date("YmdHis"));
                header("location: index.php?u={$token}&e=107");
            }

        }

    }elseif ($_POST['submit'] === "Change"){
        if ($_COOKIE['token'] === $_GET['token']){

            $sql = "UPDATE `user` SET `password`='$password' WHERE (`userID`='11')";
            $check = $conn->prepare($sql);
            $check->bind_param("s",$password);

            $password = $_POST['password'];
            $check->execute();

            //setcookie("token", $token , time() - (60 * 5));
        }

    }
}
