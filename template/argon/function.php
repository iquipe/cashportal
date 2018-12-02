<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 01/12/2018
 * Time: 12:09 AM
 */

function start_menu(){
    return"
        <a href='index.php' class='dropdown-item'>Login</a>
        <a href='?_route=sign-up' class='dropdown-item'>Register</a>
        <a href='?_route=recovery' class='dropdown-item'>Recover</a>
        <a href='?_route=global-account' class='dropdown-item'>Global Account</a>
        ";
}

