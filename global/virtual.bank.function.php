<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 01/12/2018
 * Time: 3:10 AM
 */

function all_user_account($conn){

    $sql="SELECT * FROM `get_user` LIMIT 0, 1000";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "
                <tr>
                    <td>{$row['create_date']}</td>
                    <td>{$row['fname']} {$row['lname']}</td>
                    <td>{$row['mobile']}</td>
                    <td>{$row['country']}</td>
                    <td>{$row['account']}</t>
                    <td>{$row['statusID']}</t>
                </tr>
    ";
        }
    }
}

function user_ledger_summary($conn){

    $sql="SELECT * FROM `get_account_summary` LIMIT 0, 1000";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "
                <tr>
                    <td>{$row['create_date']}</td>
                    <td>{$row['fname']} {$row['lname']}</td>
                    <td>{$row['account']}</td>
                    <td>{$row['debit']}</td>
                    <td>{$row['credit']}</t>
                    <td>{$row['statusID']}</t>
                </tr>
    ";
        }
    }

}