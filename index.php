<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 23/11/2018
 * Time: 2:25 PM
 */

if (file_exists("control/config.php")){

    include_once "control/config.php";
    include_once "global/function.php";

    if (isset($_REQUEST['_route'])){

        //link to super admin
        if ($_REQUEST['_route'] === "super-admin"){
            echo "super admin";
           // include_once "template/argon/log.in.php";
        //link to admin
        }elseif($_REQUEST['_route'] ==="admin"){
            $template->user = "administrator";
            include_once "template/argon/log.in.php";
        //link to sign up
        }elseif($_REQUEST['_route'] === "sign-up"){
            include_once "template/argon/sign.up.php";
        }else{
            echo"can find server";
        }
    }elseif (isset($_REQUEST['u'])){
        if ($_REQUEST['u'] === "user"){
            //load the user-interface navigation
            include_once "modules/system.error.php";
            include_once "modules/user.nav.php";
        }elseif ($_REQUEST['u'] === "admin"){
            //load the admin-interface navigation
            include_once "modules/system.error.php";
            include_once "modules/admin.nav.php";
        }elseif ($_REQUEST['u'] === "super-admin"){
            echo "super admin";
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
