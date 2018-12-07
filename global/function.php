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
    //setcookie("user-status-id", "", time() - (86400 * 30));
    header("location: index.php");
}

function chart($conn){
    $sql = "SELECT * FROM `get_account`";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['credit'].",";
        }
    }
}
function get_system_account($conn){

    $sql = "SELECT * FROM `get_account`";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <h3 class='card-title'>Account <i class='tim-icons icon-send text-success '></i>{$row['account']}</h3>
            <h3 class='card-title'>Cash In <i class='tim-icons icon-send text-primary '></i>{$row['debit']}</h3>
            <h3 class='card-title'>Cash Out<i class='tim-icons icon-send text-danger '></i>{$row['credit']}</h3>
            <h3 class='card-title'>Available<i class='tim-icons icon-send text-success '></i>{$row['bal']}</h3>
         ";
        }
    }
}

function get_information($conn){

    $sql="SELECT * FROM `get_info` LIMIT 0, 6";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {

            echo"
                <tr>
                    <td>
                        <div class='form-check'>
                            <label class='form-check-label'>
                                <input class='form-check-input' type='checkbox' value=''>
                                    <span class='form-check-sign'>
                                        <span class='check'></span>
                                    </span>
                            </label>
                        </div>
                    </td>
                    <td>
                        <p class='title'>{$row['title']}</p>
                        <p class='text-muted'>{$row['note']}</p>
                    </td>
                    <td class='td-actions text-right'>
                        <button type='button' rel='tooltip' title='' class='btn btn-link' data-original-title='Edit Task'>
                            <i class='tim-icons icon-pencil'></i>
                        </button>
                    </td>
                </tr>
            ";

        }
    }
}

function general_ledger($conn){

    $sql="SELECT * FROM `get_general_ledger` ORDER BY tranID DESC LIMIT 0, 7";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo"
                <tr>
                    <td>{$row['tran_date']}</td>
                    <td>{$row['account']}</td>
                    <td>{$row['ref']}</td>
                    <td class='text-center'>{$row['debit']}</td>
                    <td class='text - center'>{$row['credit']}</td>
                </tr>
            ";

        }
    }

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
                    <td class='text-right'>{$row['amount']}</td>
                </tr>
    ";
        }
    }
}

function user_transaction($conn,$userID){

    $sql="SELECT * FROM `user_transaction` where  userID='$userID' ORDER BY tranID DESC LIMIT 0, 25";
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
                    <td class='text-right'>{$row['debt']}</td>
                    <td class='text-right'>{$row['credit']}</td>
                </tr>
    ";
        }
    }

}

function user_bank_transaction($conn,$userID){

    $sql="SELECT * FROM `get_transaction` where  userID='$userID' ORDER BY tranID DESC LIMIT 0, 8";
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
                    <td class='text-right'>{$row['bank_dr']}</td>
                    <td class='text-right'>{$row['bank_cr']}</td>
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
                    <td class='text-right'>{$row['cash_dr']}</td>
                    <td class='text-right'>{$row['cash_cr']}</td>
                </tr>
    ";
        }
    }
}

function user_crypto_wallet($conn,$userID){

    $sql="SELECT * FROM `user_crypto_wallet` where userID='$userID'";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "
                <tr>
                    <td>{$row['wallet_type']} Wallet</td>
                    <td>{$row['address']}</td>
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

function user_bank_details($conn,$userID){

    $sql="SELECT * FROM `user_bank_details` where userID='$userID'";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "
                <tr>
                    <td>{$row['country']} Wallet</td>
                    <td>{$row['bank']}</td>
                    <td>{$row['acctNumber']}</td>
                    <td>{$row['acctName']}</td>
                    <td>{$row['swift']}</td>
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

function user_mobile($conn,$userID){

    $sql ="SELECT * FROM `user_mobile` where userID='$userID'";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "
                <tr>
                    <td>{$row['name']}</td>
                    <td>{$row['mobile']}</td>
                    <td>{$row['network']}</td>
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

