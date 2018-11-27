<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 23/11/2018
 * Time: 2:41 PM
 */

if (!isset($userID)){
    $userID = $_COOKIE['user-track-id'];
    $userID =((($userID*1024)+16043572)/2);
    $GLOBALS['userID'] = $userID;
}

if (!isset($userStatus)){
    $userStatus = $_COOKIE['user-status-id'];
    $userStatus =((($userStatus*1024)+16043572)/2);
}

