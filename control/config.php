<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 23/11/2018
 * Time: 2:41 PM
 */
date_default_timezone_set('UTC');
$template = new stdClass();

$template->folder = "black";
$template->content ="Page Content";
$template->dashboard = "template/{$template->folder}/dashboard.php";
$template->form = "template/{$template->folder}/form.php";
$template->table ="template/{$template->folder}/tables.php";