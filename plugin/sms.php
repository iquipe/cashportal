<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 25/11/2018
 * Time: 6:01 AM
 */


$respone = new stdClass();
$bulksms = new stdClass();
$request = new stdClass();

$bulksms->username = 'bsgh-iquipe';
$bulksms->password = 'passwd82';
$request->to = $_POST['mobile'];
$request->from = $_POST['from'];
$request->message = "Your cash portal is debited with {$amount} from {$sender_name}|{$sender_mobile} for {$description}";


$url = 'http://sms.bernsergsolutions.com:8080/bulksms/bulksms?';

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
    return $respone->code = "1701";
    //$respone->to = $request->to;
    //$respone->from = $request->from;
    //header("?u=user&ui=wallet&e=2&sms=1701");
}else{

    //$respone->Status = "Failed";
    return $respone->code = "1702";
    //$respone->to = $request->to;
    //$respone->from = $request->from;
    //header("?u=user&ui=wallet&e=2&sms=1702");
}