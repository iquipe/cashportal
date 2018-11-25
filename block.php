<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 24/11/2018
 * Time: 10:16 AM
 */

include_once "setup.php";
include_once "control/db.php";
include_once "modules/users.profile.php";
include_once "modules/user.wallet.php";

if (!isset($_COOKIE['user-token'])){
    echo "session not found";
}else{
    $ip = $_SERVER['REMOTE_ADDR'];
    $cookie = $_COOKIE['user-token'];
    $token = $_SESSION['user-token'];

    if ($cookie !== $token){
        echo" invalid session";
    }else{
        if(!isset($_POST['submit'])){
            echo "invalid ui session";
        }else{
            $action = $_POST['submit'];

            switch ($action){

                case"logout";
                    logout();
                    break;

                case "profile";
                    UserProfile::update_profile($conn);
                break;

                case"send-cash-wallet";
                    UserWallet::send_cash($conn);
                break;

                default;
                    echo "page not found";
            }

        }
    }
}
