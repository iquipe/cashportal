<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 24/11/2018
 * Time: 3:25 AM
 */

function logout(){
    session_unset();
    session_destroy();
    setcookie("user-token", "", time() - (86400 * 30));
    setcookie("user-account", "", time() - (86400 * 30));
    setcookie("user-track-id", "", time() -(86400 * 30));
    setcookie("user-status-id", "", time() - (86400 * 30));
    header("location: index.php");
}

function top_up_account($conn,$userID){

    $sql="SELECT * FROM `get_top_up_user_acct` where  userID='$userID' ORDER BY tranID DESC LIMIT 0,8";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "
                <tr>
                    <td>{$row['tran_time']}</td>
                    <td>{$row['ref']}</td>
                    <td>{$row['account']}</t>
                    <td>{$row['mobile']}</td>
                    <td class=\"text-right\">{$row['amount']}</td>
                </tr>
    ";
        }
    }
}

function user_transaction($conn,$userID){

    $sql="SELECT * FROM `user_transaction` where  userID='$userID' LIMIT 0, 1000";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "
                <tr>
                    <td>{$row['tran_date']}</td>
                    <td>{$row['detail']}</td>
                    <td>{$row['ref']}</td>
                    <td>{$row['payID']}</td>
                    <td class=\"text-right\">{$row['debt']}</td>
                    <td class=\"text-right\">{$row['credit']}</td>
                </tr>
    ";
        }
    }

}

function user_bank_transaction($conn,$userID){

    $sql="SELECT * FROM `get_transaction` where  userID='$userID' LIMIT 0, 1000";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "
                <tr>
                    <td>{$row['tran_date']}</td>
                    <td>{$row['detail']}</td>
                    <td>{$row['ref']}</td>
                    <td>{$row['payID']}</td>
                    <td class=\"text-right\">{$row['debt']}</td>
                    <td class=\"text-right\">{$row['credit']}</td>
                </tr>
    ";
        }
    }

}

function user_wallet_transaction($conn,$userID){

    $sql="SELECT * FROM `get_transaction` where  userID='$userID' ORDER BY tran_time DESC LIMIT 0, 8";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "
                <tr>
                    <td>{$row['tran_date']}</td>
                    <td>{$row['ref']}</td>
                    <td>{$row['detail']}</td>
                    <td class=\"text-right\">{$row['cash_dr']}</td>
                    <td class=\"text-right\">{$row['cash_cr']}</td>
                </tr>
    ";
        }
    }

}