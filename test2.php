<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 08/12/2018
 * Time: 12:46 AM
 */

$ip = $_SERVER['REMOTE_ADDR'];
$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
if ($query && $query['status'] == 'success'){

    $GLOBALS['ísp'] = $query['isp'];
    $GLOBALS['country'] = $query['country'];
    $GLOBALS['country-code'] = $query['countryCode'];
    $GLOBALS['region-name'] = $query['regionName'];
    $GLOBALS['city'] = $query['city'];
    $GLOBALS['zip'] = $query['zip'];
    $GLOBALS['LATITUDE'] = $query['lat'];
    $GLOBALS['longitude'] = $query['lon'];
    $GLOBALS['timezone'] = $query['timezone'];
    $GLOBALS['org'] = $query['org'];
    $GLOBALS['as'] = $query['as'];

    $country_code = $query['countryCode'];
    $json = file_get_contents('https://restcountries.eu/rest/v1/alpha/'.$country_code);
    $obj = json_decode($json);
    $cash = $obj->currencies[0];
    //$obj->languages[0];

// set API Endpoint and access key (and any options of your choice)
    $endpoint = 'live';
    $access_key = 'e1c296c3e47ab8f3059f18e6d45e967d';

// Initialize CURL:
    $ch = curl_init('http://apilayer.net/api/'.$endpoint.'?access_key='.$access_key.'');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Store the data:
    $json = curl_exec($ch);
    curl_close($ch);

// Decode JSON response:
    $exchangeRates = json_decode($json, true);

    $cash = "NGN";
// Access the exchange rate values, e.g. GBP:
    switch ($cash){

        case 'GHS';
            $rate = $exchangeRates['quotes']['USDGHS'];
        break;

        case'NGN';
            $rate = $exchangeRates['quotes']['USDNGN'];
        break;

    }

    echo $rate ."</br>";
    $r = $rate * 0.05;
    echo $rate = $rate + $r;



}else{
    echo"something is wrong";
}


