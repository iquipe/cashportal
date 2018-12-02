<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 25/11/2018
 * Time: 3:04 PM
 */


include_once "control/db.php";
include_once "global/session.php";
include_once "global/function.php";


if (!isset($_COOKIE['user-token'])){
    echo "session not found";
}else{
    $ip = $_SERVER['REMOTE_ADDR'];
    $cookie = $_COOKIE['user-token'];
    $token = $_SESSION['user-token'];
    if ($cookie !== $token){
        echo" invalid session";
    }else{
        if(!isset($_REQUEST['ui'])){
            echo "invalid ui session";
        }else{
            $ui = $_REQUEST['ui'];

            switch ($ui){

                case"logout";
                    logout();
                    break;

                case "dashboard";
                    include_once "admin/admin.dashboard.php";
                    break;

                case"top.up-client";
                    $title ="Account Number: ". $_COOKIE['user-account'];
                    $content = "admin/top.up.client.account.php";
                    include_once $template->table;
                    break;
                break;

                case"profile";
                    $title ="Account Number: ". $_COOKIE['user-account'];
                    $content = "user/profile.php";
                    include_once $template->form;
                    break;

                case"transaction";
                    $title ="Account Number: ". $_COOKIE['user-account'];
                    $content = "user/transaction.php";
                    include_once $template->table;
                    break;

                case"bank";
                    $title ="Account Number: ". $_COOKIE['user-account'];
                    $content = "user/user.bank.php";
                    include_once $template->table;
                    break;

                case"wallet";
                    $title ="Account Number: ". $_COOKIE['user-account'];
                    $content = "user/user.wallet.php";
                    include_once $template->table;
                    break;

                case"m.checkout";
                    $title = "Mobile Checkout";

                    break;


                default;
                    echo "page not found";
            }

        }
    }
}
