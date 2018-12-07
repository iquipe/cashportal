<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 23/11/2018
 * Time: 2:41 PM
 */


include_once "template/argon/function.php";

// user, merchant, bank
include_once "template/black/header.php";
include_once "template/black/top.menu.php";
include_once "template/black/side.menu.php";

date_default_timezone_set('UTC');

$GLOBALS['app-title'] = APP_TITLE;

$template = new stdClass();

$template->folder = "black";
$template->content ="Page Content";
$template->dashboard = "template/{$template->folder}/dashboard.php";
$template->form = "template/{$template->folder}/form.php";
$template->table ="template/{$template->folder}/tables.php";

$template->lable['start'] ="start";
