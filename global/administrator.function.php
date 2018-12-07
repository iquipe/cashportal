<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 07/12/2018
 * Time: 5:33 AM
 */

function block_user_details($conn){

    $sql ="SELECT * FROM `get_block_user_details`";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "
                <tr>
                    <td>{$row['clientIP']}</td>
                    <td>{$row['mobile']}</td>
                    <td>{$row['username']}</td>
                    <td>{$row['']}</td>
                    <td>{$row['username']}</td>
                    <td>{$row['username']}</td>
                    <td>
                        <a href='#' class='btn btn-sm btn-primary btn-fab btn-icon btn-round'>
                            <i class='tim-icons icon-simple-remove'></i>
                        </a>
                    </td>
                </tr>
            ";
        }
    }
}