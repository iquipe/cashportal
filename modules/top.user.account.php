<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 25/11/2018
 * Time: 8:27 PM
 */

class TopUserAccount{

    function SearchUserByMobile($conn,$mobile){

        $sql="SELECT * FROM `get_user_summary` where mobile ='$mobile'";
        $result=$conn->query($sql);
        if($result->num_rows > 0) {
            $m = $result->fetch_assoc();
            $_SESSION['transferID'] = $m['userID'];
            $_SESSION['account'] = $m['account'];
            $_SESSION['mobile'] = $m['mobile'];
            $_SESSION['name'] = $m['fname'] ." ". $m['lname'];
            $_SESSION['debit'] = $m['dr'];
            $_SESSION['credit'] = $m['cr'];
            $_SESSION['balance'] = $m['bal'];

            header("location: index.php?u=admin&ui=top.up-client&e=1");
        }else{
            $_SESSION['transferID'] = "";
            $_SESSION['account'] = "";
            $_SESSION['mobile'] = "";
            $_SESSION['name'] = "";
            $_SESSION['debit'] = "";
            $_SESSION['credit'] ="";
            $_SESSION['balance'] = "";
            header("location: index.php?u=admin&ui=top.up-client&e=0");
        }
    }

    function SearchUserByAccount($conn,$account){

        $sql="SELECT * FROM `get_user_summary` where account ='$account'";
        $result=$conn->query($sql);
        if($result->num_rows > 0) {
            $m = $result->fetch_assoc();
            $_SESSION['transferID'] = $m['userID'];
            $_SESSION['account'] = $m['account'];
            $_SESSION['mobile'] = $m['mobile'];
            $_SESSION['name'] = $m['fname'] ." ". $m['lname'];
            $_SESSION['debit'] = $m['dr'];
            $_SESSION['credit'] = $m['cr'];
            $_SESSION['balance'] = $m['bal'];

            header("location: index.php?u=admin&ui=top.up-client&e=1");
        }else{
            $_SESSION['transferID'] = "";
            $_SESSION['account'] = "";
            $_SESSION['mobile'] = "";
            $_SESSION['name'] = "";
            $_SESSION['debit'] = "";
            $_SESSION['credit'] ="";
            $_SESSION['balance'] = "";
            header("location: index.php?u=admin&ui=top.up-client&e=0");
        }
    }

    function TopUpClientAccount($conn,$userID){

        $now = date('Y-m-d H:i:s');
        $date = date('Y-m-d');
        $transferID = $_SESSION['transferID'];
        $refer = $_POST['ref'];
        $amount = $_POST['amount'];
        $description = $_POST['description'];
        $acct_type = "1";

        if ($transferID == $userID){
            header("location: index.php?u=admin&ui=top.up-client&e=106");
            exit(0);
        }else{

            //check if there is cash at blank
            $sql ="SELECT * FROM user_bank_total WHERE userID='$userID'";
            $bank =mysqli_query($conn,$sql);

            if ($bank->num_rows > 0){
                $bal = $bank->fetch_assoc();

                if($bal['balance'] > 20){

                    $charges = (($amount * TRANSFER_CHARGES) + SMS_CHARGES);
                    $total_transfer = $charges + $amount;

                    if($bal['balance'] > $total_transfer){

                        //top-up cash account and debit user account
                        $sql ="INSERT INTO `topup_account` (`userID`, `clientID`, `tran_time`, `tran_date`, `ref`, `detail`, `amount`, `acct_type`) VALUES (?,?,?,?,?,?,?,?)";
                        $result = $conn->prepare($sql);
                        $result->bind_param("ssssssss",$userID,$transferID,$now,$date,$refer,$description,$amount,$acct_type);

                        $result->execute();

                        //credit mach bank account
                        $pay= "2";
                        $description="pay account {$_SESSION['account']}/{$_SESSION['name']}|ref#{$refer}[{$amount}]|Description:{$description}";
                        $sql ="INSERT INTO `transaction` (`userID`,`tran_time`, `tran_date`, `detail`, `ref`, `payID`, `bank_cr`) VALUES (?,?,?,?,?,?,?)";
                        $result = $conn->prepare($sql);
                        $result->bind_param("sssssss",$userID,$now,$date,$description,$refer,$pay,$amount);

                        if($result->execute() == TRUE) {
                            //debit client bank
                            $acct_type = "2";
                            $sql = "INSERT INTO `transaction` (`userID`, `tran_time`, `tran_date`, `detail`, `ref`, `payID`, `bank_dr`) VALUES (?,?,?,?,?,?,?)";
                            $result = $conn->prepare($sql);
                            $result->bind_param("sssssss", $userID, $now, $date, $description, $refer,$acct_type, $amount);
                            if ($result->execute() == TRUE) {
                                header("location: index.php?u=admin&ui=top.up-client&e=1");
                            } else {
                                header("location: index.php?u=admin&ui=top.up-client&e=0");
                            }
                        }else{
                            header("location: index.php?u=admin&ui=top.up-client&e=0");
                        }
                    }else{
                        header("location: index.php?u=admin&ui=top.up-client&e=104");
                    }
                }else{
                    header("location: index.php?u=admin&ui=top.up-client&e=104");
                }
            }else{
                header("location: index.php?u=admin&ui=top.up-client&e=0");
            }
        }
    }
}