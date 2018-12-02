<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 24/11/2018
 * Time: 4:01 PM
 */

class UserBank {

    public function user_id(){
        $userID = $_COOKIE['user-track-id'];
        $userID =((($userID*1024)+16043572)/2);

        return $userID;

    }

    function add_bank_detail($conn){

        $userID = $GLOBALS['userID'];
        $country = $_POST['country'];
        $bank = $_POST['bank-name'];
        $acctNo = $_POST['account-number'];
        $acctName = $_POST['account-name'];
        $swift = $_POST['swift'];

        $sql = "INSERT INTO `bank` (`userID`, `county`, `bank`, `acctNumber`, `acctName`, `swift`) VALUES (?,?,?,?,?,?)";
        $result = $conn->prepare($sql);
        $result->bind_param("ssssss",$userID,$country,$bank,$acctNo,$acctName,$swift);

        if ($result->execute() == TRUE){
            header("location: index.php?u={$_SESSION['portal']}&ui=settings&e=2");
        }else{
            header("location: index.php?u={$_SESSION['portal']}&ui=settings&e=109");
        }

    }

    public function transfer_to_wallet_cash($conn){

        $respone = new stdClass();
        $bulksms = new stdClass();
        $request = new stdClass();
        $request->from =SMS_NAME;

        $bulksms->username = 'bsgh-iquipe';
        $bulksms->password = 'passwd82';
        $url = 'http://sms.bernsergsolutions.com:8080/bulksms/bulksms?';

        //Get sender profile
        $userID = self::user_id();
        $sql ="SELECT * FROM get_user WHERE get_user.userID ='$userID'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0){
            $sender = $result->fetch_assoc();
            $sender_name = $sender['fname']." ". $sender['lname'];
            $sender_mobile = $sender['mobile'];
        }else{
            header("location: ?e=101");
            exit(0);
        }


        //check sender wallet account
        $sql ="SELECT * FROM user_bank_total WHERE userID ='$userID'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0){
            $sender = $result->fetch_assoc();
            $sender_bank_balance = $sender['balance'];
        }else{
            header("location: ?e=103");
            exit(0);
        }

        if($sender_bank_balance > 10){

            $now = date("Y-m-d H:i:s");
            $refer = $_POST['ref'];
            $date = $_POST['date'];
            $amount = $_POST['amount'];
            $description= $_POST['description'];
            $pay = "1";

            $charges = (($amount * TRANSFER_CHARGES) + SMS_CHARGES);
            $total_transfer = $charges + $amount;

            //start transaction
            if ($sender_bank_balance > $total_transfer){

                //credit bank account
                $pay ="1";
                $sql ="INSERT INTO `transaction` (`userID`,`tran_time`, `tran_date`, `detail`, `ref`, `payID`, `bank_cr`) VALUES (?,?,?,?,?,?,?)";
                $result = $conn->prepare($sql);
                $result->bind_param("sssssss",$userID,$now,$date,$description,$refer,$pay,$amount);

                $result->execute();


                //debit wallet account
                $pay = "2";
                $sql ="INSERT INTO `transaction` (`userID`,`tran_time`, `tran_date`, `detail`, `ref`, `payID`, `cash_dr`) VALUES (?,?,?,?,?,?,?)";
                $result = $conn->prepare($sql);
                $result->bind_param("sssssss",$userID,$now,$date,$description,$refer,$pay,$amount);

                if($result->execute() == TRUE){
                    $request->to = $sender_mobile;
                    $request->message = "Date:{$now}.\nRef:{$refer}.\nTransfer To:{$receiver_mobile}.\n Name:{$receiver_name}.\n Amount:{$amount}\n Charges:{$charges}";

                    $c = curl_init();
                    curl_setopt($c,CURLOPT_URL,$url);
                    curl_setopt($c,CURLOPT_POST,true);
                    curl_setopt($c,CURLOPT_POSTFIELDS, 'username='.$bulksms->username.'&password='.$bulksms->password.
                        '&type=0&dlr=1&destination='.$request->to.'&source='.$request->from.'&message='.$request->message);
                    curl_setopt($c,CURLOPT_RETURNTRANSFER,true);
                    $content = curl_exec($c);
                    curl_close($c);

                    $str_total = strlen($content);
                    $text = 4 - $str_total;

                    $msg = substr($content,0,$text);

                    if ($msg == 1701){

                        //$respone->Status = "successful";
                        echo $respone->code = "1701";
                        //$respone->to = $request->to;
                        //$respone->from = $request->from;
                        header("?u={$_SESSION['portal']}&ui=wallet&e=2&sms=1701");
                        //bill the sender with charger
                    }else{

                        //$respone->Status = "Failed";
                        echo $respone->code = "1702";
                        //$respone->to = $request->to;
                        //$respone->from = $request->from;
                        header("?u={$_SESSION['portal']}&ui=wallet&e=2&sms=1702");
                    }

                }

            }else{
                header("location: ?e=104");
                exit(0);
            }

        }else{
            header("location: ?e=104");
            exit(0);
        }

    }

}
