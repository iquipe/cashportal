<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 30/11/2018
 * Time: 3:08 PM
 */

function dashboard(){
    
    return"
    <meta charset='utf-8' />
    <link rel='apple-touch-icon' sizes='76x76' href='template/black/assets/img/apple-icon.png'>
    <link rel='icon' type='image/png' href='template/black/assets/img/favicon.png'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' />
    <title>
       {$GLOBALS['app-title']}
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href='https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800' rel='stylesheet' />
    <link href='https://use.fontawesome.com/releases/v5.0.6/css/all.css' rel='stylesheet'>
    <!-- Nucleo Icons -->
    <link href='template/black/assets/css/nucleo-icons.css' rel='stylesheet' />
    <!-- CSS Files -->
    <link href='template/black/assets/css/bootstrap.min.css' rel='stylesheet' />
    <link href='template/black/assets/css/black-dashboard.css?v=1.0.0' rel='stylesheet' />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href='template/black/assets/demo/demo.css' rel='stylesheet' />
    ";
}