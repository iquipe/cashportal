<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 24/11/2018
 * Time: 4:01 PM
 */

class UserWallet {

    public function user_id(){
        $userID = $_COOKIE['user-track-id'];
        $userID =((($userID*1024)+16043572)/2);

        return $userID;

    }

    public function send_cash($conn){

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

        //get receiver profile
        $pay_to_mobile = $_POST['mobile'];
        $sql ="SELECT * FROM get_user WHERE mobile ='$pay_to_mobile'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0){
            $receiver = $result->fetch_assoc();
            $receiverID = $receiver['userID'];
            $receiver_name = $receiver['fname']." ". $receiver['lname'];
            $receiver_mobile = $receiver['mobile'];
        }else{
            header("location: ?e=102");
            exit(0);
        }

        //check sender wallet account
        $sql ="SELECT * FROM user_wallet_total WHERE userID ='$userID'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0){
            $sender = $result->fetch_assoc();
            $sender_wallet_balance = $sender['balance'];
        }else{
            header("location: ?e=103");
            exit(0);
        }

        if ($sender_mobile == $pay_to_mobile){
            header("location: ?e=105");
            exit(0);
        }else{
            if($sender_wallet_balance > 10){

                $now = date("Y-m-d H:i:s");
                $refer = $_POST['ref'];
                $date = $_POST['date'];
                $amount = $_POST['amount'];
                $description= $_POST['description'];
                $pay = "1";

                 $charges = (($amount * TRANSFER_CHARGES) + SMS_CHARGES);
                $total_transfer = $charges + $amount;

                //start transaction
                if ($sender_wallet_balance > $total_transfer){

                    //debit receiver account
                    $sql ="INSERT INTO `transaction` (`userID`,`tran_time`, `tran_date`, `detail`, `ref`, `payID`, `cash_dr`) VALUES (?,?,?,?,?,?,?)";
                    $result = $conn->prepare($sql);
                    $result->bind_param("sssssss",$receiverID,$now,$date,$description,$refer,$pay,$amount);

                    if($result->execute() == TRUE){
                        $request->to = $receiver_mobile;
                        $request->message = $request->message = "Date:{$now}.\nRef:{$refer}.\nTransfer from\n Mobile:{$sender_mobile}.\n Name:{$sender_name}.\nAmount:{$amount}.\nPropose:{$description}";

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
                             $respone->code = "1701";
                            //$respone->to = $request->to;
                            //$respone->from = $request->from;

                        }else{

                            //$respone->Status = "Failed";
                             $respone->code = "1702";
                            //$respone->to = $request->to;
                            //$respone->from = $request->from;
                        }
                    }

                    //credit sender account
                    $sql ="INSERT INTO `transaction` (`userID`,`tran_time`, `tran_date`, `detail`, `ref`, `payID`, `cash_cr`) VALUES (?,?,?,?,?,?,?)";
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
                            $respone->code = "1701";
                            //$respone->to = $request->to;
                            //$respone->from = $request->from;

                            //bill the sender with charger
                        }else{

                            //$respone->Status = "Failed";
                                $respone->code = "1702";
                            //$respone->to = $request->to;
                            //$respone->from = $request->from;
                        }

                    }

                    //bill the sender will all chargers
                    $sql ="INSERT INTO `transaction` (`userID`,`tran_time`, `tran_date`, `detail`, `ref`, `payID`, `cash_cr`) VALUES (?,?,?,?,?,?,?)";
                    $result = $conn->prepare($sql);
                    $result->bind_param("sssssss",$userID,$now,$date,$description,$refer,$pay,$charges);

                    $result->execute();

                    header("location: index.php?u={$_SESSION['portal']}&ui=wallet&e=2&sms={$respone->code}");
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

}
