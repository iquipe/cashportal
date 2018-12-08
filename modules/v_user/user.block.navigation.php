<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 25/11/2018
 * Time: 7:06 PM
 */

include_once "setup.php";
include_once "control/db.php";
include_once "modules/users.profile.php";
include_once "modules/user.wallet.php";
include_once "modules/top.user.account.php";

switch ($action){

    case"logout";
        logout();
        break;

    case "profile";
        UserProfile::update_profile($conn);
        break;

    case "add-mobile";
        Mobile::add_mobile($conn);
    break;

    case"send-cash-wallet";
        UserWallet::send_cash($conn);
        break;

    case"add-bank";
         UserBank::add_bank_detail($conn);
    break;

    case "cash-bank";
        UserBank::transfer_to_wallet_cash($conn);
        break;

    case"add-wallet";
        CryptoCurrency::add_address($conn);
        break;

    case"remove-wallet";
        CryptoCurrency::remove_address($conn);
        break;


    default:
        echo "page not found";
}