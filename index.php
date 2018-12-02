<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 23/11/2018
 * Time: 2:25 PM
 */

if (file_exists("control/config.php")){
    include_once "setup.php";
    include_once "control/db.php";
    include_once "control/config.php";
    include_once "global/function.php";

    if (isset($_REQUEST['_route'])){

        //link to super admin
        if ($_REQUEST['_route'] === "super"){
            $template->user = "super admin";
            include_once "template/argon/log.in.php";
        //link to admin
        }elseif($_REQUEST['_route'] ==="admin"){
            $template->user = "administrator";
            include_once "template/argon/log.in.php";
        //link to sign up
        }elseif($_REQUEST['_route'] === "sign-up"){
            include_once "template/argon/sign.up.php";
        }elseif($_REQUEST['_route'] === "recovery"){
            include_once "template/argon/password.recovery.php";
        }elseif($_REQUEST['_route'] === "about-us"){
            include_once "template/argon/about.us.php";
        }elseif($_REQUEST['_route'] === "global-account"){
            include_once "template/argon/global.account.php";
        }else{
            echo"can find server";
        }
    }elseif (isset($_REQUEST['u'])){
        if ($_REQUEST['u'] === "user"){
            //load the user-interface navigation
            $_SESSION['portal']='user';
            include_once "modules/system.error.php";
            include_once "modules/user.nav.php";
        }elseif ($_REQUEST['u'] === "admin"){
            //load the admin-interface navigation
            $_SESSION['portal']='admin';
            include_once "modules/system.error.php";
            include_once "modules/admin.nav.php";
        }elseif ($_REQUEST['u'] === "super"){
            $_SESSION['portal']='super';
            include_once "modules/system.error.php";
            include_once "modules/v_bank/super.nav.php";
        }else{
            //link to the login page
            include_once "template/argon/log.in.php";
        }
    }else{
        //link to the login page
       include_once "template/argon/log.in.php";
    }

}else{
    echo"server over load";
}
