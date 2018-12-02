<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 24/11/2018
 * Time: 10:16 AM
 */

include_once "setup.php";
include_once "control/db.php";
include_once "global/session.php";
include_once "plugin/qrcode/qrlib.php";
include_once "modules/users.profile.php";
include_once "modules/user.wallet.php";
include_once "modules/user.bank.php";
include_once "modules/cryptocurrency.php";
include_once "modules/mobile.php";

if (!isset($_COOKIE['user-token'])){
    echo "session not found";
}else{
    $ip = $_SERVER['REMOTE_ADDR'];
    $cookie = $_COOKIE['user-token'];
    $token = $_SESSION['user-token'];

    if ($cookie !== $token){
        echo" invalid session";
    }else{
        if(!isset($_REQUEST['submit'])){
            echo "invalid ui session";
        }else{
                $action = $_REQUEST['submit'];
            if ($_SESSION['user-status'] ==3){
                require_once "modules/super.block.navigation.php";
            }elseif ($_SESSION['user-status'] == 2){
                require_once "modules/admin.block.navigation.php";
            }else{
                require_once "modules/user.block.navigation.php";
            }
        }
    }
}
