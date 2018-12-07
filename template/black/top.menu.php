<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 27/11/2018
 * Time: 10:06 AM
 */

function top_menu_profile(){

    return"
        <li class='nav-link'>
            <a href='index.php?u=user&ui=profile&e=1' class='nav-item dropdown-item'>Profile</a>
        </li>
        <li class='nav-link'>
            <a href='index.php?u=user&ui=settings&e=1' class='nav-item dropdown-item'>Settings</a>
        </li>
        <div class='dropdown-divider'></div>
        <li class='nav-link'>
            <a href='index.php?u=user&ui=logout&e=0' class='nav-item dropdown-item'>Log out</a>
        </li>
    ";
}

function top_menu_notification($conn){

    $userID = $GLOBALS['userID'];

    $sql = "SELECT * FROM get_task WHERE get_task.userID = ?";
    $task = $conn->prepare($sql);
    $task->bind_param("s",$userID);

    $task->execute();
    $result =$task->get_result();
    if (mysqli_num_rows($result) > 0){
        while ($tk = mysqli_fetch_assoc($result)){
            return"
                <li class='nav-link'>
                    <a href='#' class='nav-item dropdown-item'>{$tk['task']}</a>
                 </li>
            ";
        }
    }
}