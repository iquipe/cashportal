<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 25/11/2018
 * Time: 6:58 PM
 */


include_once "setup.php";
include_once "control/db.php";
include_once "modules/users.profile.php";
include_once "modules/user.wallet.php";
include_once "modules/top.user.account.php";

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

                case "cash-bank";
                    UserBank::transfer_to_wallet_cash($conn);
                    break;

                case"search-account";
                    if ($_POST['check'] == 1){
                        $mobile = $_POST['q'];
                        TopUserAccount::SearchUserByMobile($conn,$mobile);
                    }elseif($_POST['check']== 2){
                        $account = $_POST['q'];
                        TopUserAccount::SearchUserByAccount($conn,$account);
                    }
                break;

                case"top-up-account";
                    TopUserAccount::TopUpClientAccount($conn,$userID);
                break;


                default;
                    echo "page not found";
            }

        }
    }
}
