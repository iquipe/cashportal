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
            $sql = "SELECT * FROM get_user WHERE `username` = ? and `password` = ?";
            $check = $conn->prepare($sql);
            $check->bind_param("ss",$username,$password);

            //sign up session
            $username = $_POST['username'];
            $password = $_POST['password'];
            $check->execute();

            $result =$check->get_result();
            $login = mysqli_fetch_assoc($result);
            if(isset($login["token"])){

                $token = $login["token"];
                $userStatus = ((($login['statusID']*2)-16043572)/1024);
                $account = $login["account"];
                $userID = ((($login['userID']*2)-16043572)/1024);
                $_SESSION['user-token'] = $token;

                setcookie("user-token",$token,time()+(86400 * 30),"/");
                setcookie("user-account",$account,time()+(86400 * 30),"/");
                setcookie("user-track-id",$userID,time()+(86400 * 30),"/");
                setcookie("user-status-id",$userStatus,time()+(86400 * 30),"/");

                switch ($userStatus){
                    case 3:
                        header("location: index.php?u=super.admin&ui=dashboard&e=1");
                    break;

                    case 2:
                        header("location: index.php?u=admin&ui=dashboard&e=1");
                        break;
                    default:
                        header("location: index.php?u=user&ui=dashboard&e=1");
                }

            }else{
                header("location: index.php?validate=1");
            }

        }
    }elseif ($_POST['submit'] === "Create account"){

        //check if email exist
        $sql = "SELECT * FROM get_user WHERE get_user.email = ?";
        $check = $conn->prepare($sql);
        $check->bind_param("s",$email);

        //sign up session
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        $check->execute();

        $result =$check->get_result();
        if (mysqli_num_rows($result) > 0){
            //mail exist
            header("location: index.php?validate=1");
        }else{

            $account = date("Hyimsd");
            $token = $username."/".$password."/".$email;
            $token = md5(md5($token,true));
            $sql = "INSERT INTO `user` (`username`, `password`, `email`,`token`,`account`) VALUES (?,?,?,?,?)";
            $create = $conn->prepare($sql);
            $create->bind_param("sssss",$username,$password,$email,$token,$account);

            if ($create->execute() === TRUE){
                $last_id = mysqli_insert_id($conn);
                $userID = ((($last_id*2)-16043572)/1024);
                $_SESSION['user-token'] =$token;
                setcookie("user-token",$token,time()+(86400 * 30),"/");
                setcookie("user-account",$account,time()+(86400 * 30),"/");
                setcookie("user-track-id",$userID,time()+(86400 * 30),"/");

                header("location: index.php?u=user&ui=dashboard&e=1");

            }else{
                header("location: index.php?create-account=0");
            }
        }

    }
}
