<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 25/11/2018
 * Time: 7:06 PM
 */

switch ($action){

    case"logout";
        logout();
        break;

    case "profile";
        UserProfile::update_profile($conn);
        break;

    case"send-cash-wallet";
        UserWallet::send_cash($conn);
        break;

    case "cash-bank";
        UserBank::transfer_to_wallet_cash($conn);
        break;

    case"search-account";

    default;
        echo "page not found";
}