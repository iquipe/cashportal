<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 29/11/2018
 * Time: 7:12 AM
 */

class CryptoCurrency{

    function add_address($conn){

        $userID = $GLOBALS['userID'];
        $wallet = $_POST['crypto-type'];
        $address = $_POST['crypto-wallet'];

        $sql ="INSERT INTO `crypto_address` (`userID`, `walletID`, `address`) VALUES (?,?,?)";
        $result = $conn->prepare($sql);
        $result->bind_param("sss",$userID,$wallet,$address);

        if ($result->execute() == TRUE){
            header("location: index.php?u={$_SESSION['portal']}&ui=settings&e=2");
        }else{
            header("location: index.php?u={$_SESSION['portal']}&ui=settings&e=109");
        }
    }

    function remove_address($conn){

        //$userID = $GLOBALS['userID'];
        $cryptoID = $_POST['crypto-type'];

        $sql ="DELETE FROM `crypto_address` WHERE (`cryptoID`=?)";
        $result = $conn->prepare($sql);
        $result->bind_param("s",$cryptoID);

        if ($result->execute() == TRUE){
            header("location: index.php?u={$_SESSION['portal']}&ui=settings&e=2");
        }else{
            header("location: index.php?u={$_SESSION['portal']}&ui=settings&e=109");
        }
    }
}