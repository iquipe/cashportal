<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 08/12/2018
 * Time: 2:59 AM
 */

$json = file_get_contents('https://restcountries.eu/rest/v1/alpha/gh');
    $obj = json_decode($json);
    $cash = $obj->currencies[0];
    $obj->languages[0];
/**
// single http://free.currencyconverterapi.com/api/v5/convert?q=USD_GHS&compact=ultra
//https://free.currencyconverterapi.com/api/v6/convert?q=usd_ghs&compact=ultra&date=2018-12-08
    $data = file_get_contents('https://free.currencyconverterapi.com/api/v6/convert?q=USD_GHS&compact=y');
 $js = json_decode($data);
echo $js[0]->val;
**/
/**
$json2 = file_get_contents('http://apilayer.net/api/live?access_key=e1c296c3e47ab8f3059f18e6d45e967d&currencies={$cash}&source=USD&format=1');
$obj2 = json_decode($json2);
echo $cash2 = $obj2->quotes[0]->USDGHS;
//echo $obj->languages[0];
**/

// set API Endpoint and access key (and any options of your choice)
$endpoint = 'live';
$access_key = 'e1c296c3e47ab8f3059f18e6d45e967d';

// Initialize CURL:
$ch = curl_init('http://free.currencyconverterapi.com/api/v5/convert?q=USD_GHS&compact=ultra');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Store the data:
$json = curl_exec($ch);
curl_close($ch);

// Decode JSON response:
$exchangeRates = json_decode($json, true);

// Access the exchange rate values, e.g. GBP:
echo $exchangeRates['USD_GHS'];
