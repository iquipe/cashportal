<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 27/11/2018
 * Time: 7:59 PM
 */

if (!isset($_GET['u'])){
    header("location: index.php");
}else{
    require_once "template/argon/new.password.php";
}