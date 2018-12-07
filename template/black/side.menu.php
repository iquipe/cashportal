<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 24/11/2018
 * Time: 8:39 AM
 */
//include_once "dialog.php";

function side_menu(){
    if (!isset($_SESSION['user-status'])){
        header("location: index.php?e=no-user-status");
    }else{
        if ($_SESSION['user-status'] == 3){//virtual bank as the super admi
            echo"
                <li>
                    <a href='?u=super&ui=dashboard&e=1'>
                        <i class='tim-icons icon-chart-pie-36'></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href='?u=super&ui=top.up-client&e=1'>
                        <i class='tim-icons icon-coins'></i>
                        <p>Top-up Client Account</p>
                    </a>
                </li>
                <li>
                    <a href='?u=super&ui=account&e=1'>
                        <i class='tim-icons icon-paper'></i>
                        <p>Global Account</p>
                    </a>
                </li>
                <li>
                    <a href='?u=super&ui=transaction&e=1'>
                        <i class='tim-icons icon-paper'></i>
                        <p>Transaction</p>
                    </a>
                </li>
                <li>
                    <a href='?u=super&ui=wallet&e=1'>
                        <i class='tim-icons icon-wallet-43'></i>
                        <p>Wallet</p>
                    </a>
                </li>
                <li>
                    <a href='?u=super&ui=bank&e=1'>
                        <i class='tim-icons icon-bank'></i>
                        <p>Bank</p>
                    </a>
                </li>
                <li>
                    <a href='?u=super&ui=m.checkout&e=1'>
                        <i class='tim-icons icon-wifi'></i>
                        <p>M~Checkout</p>
                    </a>
                </li>
                <li>
                    <a href='./tables.html'>
                        <i class='tim-icons icon-puzzle-10'></i>
                        <p>Table List</p>
                    </a>
                </li>
                
                <li>
                    <a href='./rtl.html'>
                        <i class='tim-icons icon-world'></i>
                        <p>RTL Support</p>
                    </a>
                </li>
            ";
        }elseif($_SESSION['user-status'] == 2){
            echo"
                <li>
                    <a href='?u=admin&ui=dashboard&e=1'>
                        <i class='tim-icons icon-chart-pie-36'></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href='?u=admin&ui=top.up-client&e=1'>
                        <i class='tim-icons icon-coins'></i>
                        <p>Top-up Client Account</p>
                    </a>
                </li>
                <li>
                    <a href='?u=user&ui=transaction&e=1'>
                        <i class='tim-icons icon-paper'></i>
                        <p>Transaction</p>
                    </a>
                </li>
                <li>
                    <a href='?u=user&ui=wallet&e=1'>
                        <i class='tim-icons icon-wallet-43'></i>
                        <p>Wallet</p>
                    </a>
                </li>
                <li>
                    <a href='?u=user&ui=bank&e=1'>
                        <i class='tim-icons icon-bank'></i>
                        <p>Bank</p>
                    </a>
                </li>
                <li>
                    <a href='?u=user&ui=m.checkout&e=1'>
                        <i class='tim-icons icon-wifi'></i>
                        <p>M~Checkout</p>
                    </a>
                </li>
                <li>
                    <a href='./tables.html'>
                        <i class='tim-icons icon-puzzle-10'></i>
                        <p>Table List</p>
                    </a>
                </li>
                
                <li>
                    <a href='./rtl.html'>
                        <i class='tim-icons icon-world'></i>
                        <p>RTL Support</p>
                    </a>
                </li>
             ";
        }elseif ($_SESSION['user-status'] == 1){
            echo"
                <li>
                    <a href='?u=user&ui=dashboard&e=1'>
                        <i class='tim-icons icon-chart-pie-36'></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href='?u=user&ui=transaction&e=1'>
                        <i class='tim-icons icon-paper'></i>
                        <p>Transaction</p>
                    </a>
                </li>
                <li>
                    <a href='?u=user&ui=wallet&e=1'>
                        <i class='tim-icons icon-wallet-43'></i>
                        <p>Wallet</p>
                    </a>
                </li>
                <li>
                    <a href='?u=user&ui=bank&e=1'>
                        <i class='tim-icons icon-bank'></i>
                        <p>Bank</p>
                    </a>
                </li>
                <li>
                    <a href='?u=user&ui=m.checkout&e=1'>
                        <i class='tim-icons icon-wifi'></i>
                        <p>M~Checkout</p>
                    </a>
                </li>
                <li>
                    <a href='./tables.html'>
                        <i class='tim-icons icon-puzzle-10'></i>
                        <p>Table List</p>
                    </a>
                </li>
                <li>
                    <a href='./typography.html'>
                        <i class='tim-icons icon-align-center'></i>
                        <p>Typography</p>
                    </a>
                </li>
                <li>
                    <a href='./rtl.html'>
                        <i class='tim-icons icon-world'></i>
                        <p>RTL Support</p>
                    </a>
                </li>
            ";
        }
    }
}




