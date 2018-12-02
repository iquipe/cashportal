<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 28/11/2018
 * Time: 9:28 AM
 */

?>

<ul class="nav nav-tabs">
    <li class="nav-tabs">
        <a class="nav-link" data-toggle="tab" href="#home">Cryptocurrency Wallet</a>
    </li>
    <li class="nav-tabs">
        <a class="nav-link" data-toggle="tab" href="#menu1">Bank Account</a>
    </li>
    <li class="nav-tabs">
        <a class="nav-link" data-toggle="tab" href="#menu2">Mobile Mobile</a>
    </li>
</ul>

<div class="tab-content">
    <div id="home" class="tab-pane fade in active">
        <div class="row">
            <div class='col-md-4'>
                <div class='card'>
                    <div class='card-header'>
                        <h5 class='title'>Cryptocurrency Address</h5>
                    </div>
                    <form method='POST' action='block.php' enctype='multipart/form-data' role='form' >
                        <div class='card-body'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <div class='form-group'>
                                        <div class="form-check form-check-radio">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="crypto-type" id="exampleRadios2" value="1" checked>
                                                BTC Bitcoin
                                                <span class="form-check-sign"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-md-12'>
                                    <div class='form-group'>
                                        <div class="form-check form-check-radio">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="crypto-type" id="exampleRadios2" value="2" checked>
                                                ETH Ethereum
                                                <span class="form-check-sign"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-md-12'>
                                    <div class='form-group'>
                                        <div class="form-check form-check-radio">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="crypto-type" id="exampleRadios2" value="3" checked>
                                                XRP Ripple
                                                <span class="form-check-sign"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-md-12'>
                                    <div class='form-group'>
                                        <div class="form-check form-check-radio">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="crypto-type" id="exampleRadios2" value="4" checked>
                                                LTC Litecoin
                                                <span class="form-check-sign"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-md-12'>
                                    <div class='form-group'>
                                        <div class="form-check form-check-radio">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="crypto-type" id="exampleRadios2" value="5" checked>
                                                XMR Monero
                                                <span class="form-check-sign"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <div class='form-group'>
                                        <label>Address</label>
                                        <input type='text' name='crypto-wallet' class='form-control' placeholder='Wallet Address'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='card-footer'>
                            <button type='submit' name='submit' value='add-wallet' class='btn btn-fill btn-primary'>Add Wallet</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class='col-md-8'>
                <div class='card  card-user'>
                    <div class='card-body '>
                        <p class='card-text'>
                        <div class='author'>
                            <div class='block block-one'></div>
                            <div class='block block-two'></div>
                            <div class='block block-three'></div>
                            <div class='block block-four'></div>
                        </div>
                        </p>
                        </di>
                        <p class='card-description'>
                        <div class='table-responsive'>
                            <table class='table tablesorter ' id=''>
                                <thead class=' text-primary\'>
                                <th>Wallet</th>
                                <th>Address</th>
                                </thead>
                                <tbody>
                                <?php user_crypto_wallet($conn,$userID);?>
                                </tbody>
                            </table>
                        </div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="menu1" class="tab-pane fade">
        <div class="row">
            <div class='col-md-4'>
                <div class='card'>
                    <div class='card-header'>
                        <h5 class='title'>Bank Details</h5>
                    </div>
                    <form method='post' action='block.php' enctype='multipart/form-data' role='form' >
                        <div class='card-body'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <div class='form-group'>
                                        <label>Country</label>
                                        <input type='text' name='country' class='form-control' placeholder='Country'>
                                    </div>
                                </div>
                                <div class='col-md-12'>
                                    <div class='form-group'>
                                        <label>Bank Name</label>
                                        <input type='text' name='bank-name' class='form-control' placeholder='Bank Name'>
                                    </div>
                                </div>
                                <div class='col-md-12'>
                                    <div class='form-group'>
                                        <label>Account Number</label>
                                        <input type='text' name='account-name' class='form-control' placeholder='Account number'>
                                    </div>
                                </div>
                                <div class='col-md-12'>
                                    <div class='form-group'>
                                        <label>Account Name</label>
                                        <input type='text' name='account-number' class='form-control' placeholder='Account Name'>
                                    </div>
                                </div>
                                <div class='col-md-12'>
                                    <div class='form-group'>
                                        <label>SWIFT</label>
                                        <input type='text' name='swift' class='form-control' placeholder='swift code'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='card-footer'>
                            <button type='submit' name='submit' value='add-bank' class='btn btn-fill btn-primary'>Add Bank</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class='col-md-8'>
                <div class='card  card-user'>
                    <div class='card-body '>
                        <p class='card-text'>
                        <div class='author'>
                            <div class='block block-one'></div>
                            <div class='block block-two'></div>
                            <div class='block block-three'></div>
                            <div class='block block-four'></div>
                        </div>
                        </p>
                        </di>
                        <p class='card-description'>
                        <div class='table-responsive'>
                            <table class='table tablesorter ' id=''>
                                <thead class=' text-primary\'>
                                <th>Country</th>
                                <th>Bank</th>
                                <th>Account Name</th>
                                <th>Account Number</th>
                                <th>Swift</th>
                                </thead>
                                <tbody>
                                <?php user_bank_details($conn,$userID);?>
                                </tbody>
                            </table>
                        </div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="menu2" class="tab-pane fade">
        <div class="row">
            <div class='col-md-4'>
                <div class='card'>
                    <div class='card-header'>
                        <h5 class='title'>Edit Profile</h5>
                    </div>
                    <form method='post' action='block.php' enctype='multipart/form-data' role='form' >
                        <div class='card-body'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <div class='form-group'>
                                        <div class="form-check form-check-radio">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="crypto-type" id="exampleRadios2" value="1" checked>
                                                MTN ~ Ghana
                                                <span class="form-check-sign"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-md-12'>
                                    <div class='form-group'>
                                        <div class="form-check form-check-radio">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="crypto-type" id="exampleRadios2" value="2" checked>
                                                Airtel ~ Ghana
                                                <span class="form-check-sign"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <div class='form-group'>
                                        <label>Wallet Name</label>
                                        <input type='text' name='mobile-name' class='form-control' placeholder='Name'>
                                    </div>
                                </div>
                                <div class='col-md-12'>
                                    <div class='form-group'>
                                        <label>Mobile Number</label>
                                        <input type='text' name='mobile-number' class='form-control' placeholder='Mobile Number'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='card-footer'>
                            <button type='submit' name='submit' value='add-mobile' class='btn btn-fill btn-primary'>Add Mobile</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class='col-md-8'>
                <div class='card  card-user'>
                    <div class='card-body '>
                        <p class='card-text'>
                        <div class='author'>
                            <div class='block block-one'></div>
                            <div class='block block-two'></div>
                            <div class='block block-three'></div>
                            <div class='block block-four'></div>
                        </div>
                        </p>
                        </di>
                        <p class='card-description'>
                        <div class='table-responsive'>
                            <table class='table tablesorter ' id=''>
                                <thead class=' text-primary\'>
                                    <th>Name</th>
                                    <th>Mobile Number</th>
                                    <th>Network</th>
                                </thead>
                                <tbody>
                                    <?php user_mobile($conn,$userID);?>
                                </tbody>
                            </table>
                        </div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>