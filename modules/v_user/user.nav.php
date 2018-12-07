<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 24/11/2018
 * Time: 5:30 AM
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

                case"settings";
                    $title ="Account Number: ". $_COOKIE['user-account'];
                    $content = "user/settings.php";
                    include_once $template->table;
                break;

                case "dashboard";
                    include_once "user/user.dashboard.php";
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
                   // include_once "plugin/qrcode/qrlib.php";
                    $content = "modules/crypto.pay.out.php";
                    //$content = "user/m.checkout.php";
                    include_once $template->table;
                break;

                default;
                    echo "page not found";
            }
        }
    }
}
