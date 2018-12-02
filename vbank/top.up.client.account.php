<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 25/11/2018
 * Time: 5:33 PM
 */

function top_up_user_account(){
    if (isset($_POST['date'])){
        $date = $_POST['date'];
    }else{
        $date = date('d-m-Y');
    }

    if(isset($_SESSION['account'])){
        $account = $_SESSION['account'];
    }else{
        $account = '';
    }

    if (isset($_POST['ref'])){
        $refer = $_POST['ref'];
    }else{
        $refer = rand(100,999).''.date('Hymids');
    }

    if (isset($_POST['amount'])){
        $amount = $_POST['amount'];
    }else{
        $amount ="";
    }

    if(isset($_POST['description'])){
        $description = $_POST['description'];
    }else{
        $description = "";
    }
    echo"
                <div class='card-body'>
                    <div class='row'>
                        <div class='col-md-12'>
                            <div class='form-group'>
                                <label>Transaction Date</label>
                                <input type='text' readonly name='date' class='form-control' placeholder='Home Address' value='{$date}'>
                            </div>
                        </div>
                        <div class='col-md-12'>
                            <div class='form-group'>
                                <label>Transfer To</label>
                                <input type='text' readonly name='transfer' class='form-control' placeholder='Wallet Address' value='{$account}'>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-6'>
                            <div class='form-group'>
                                <label>Ref. No#</label>
                                <input type='text' name='ref' class='form-control' placeholder='City' value='{$refer}'>
                            </div>
                        </div>
                        <div class='col-md-6'>
                            <div class='form-group'>
                                <label>Amount</label>
                                <input type='text' name='amount' class='form-control' placeholder='0.00' value='{$amount}'>
                            </div>
                        </div>

                    </div>
                    <div class='row'>
                        <div class='col-md-12'>
                            <div class='form-group'>
                                <label>Description</label>
                                <textarea name='description' rows='4' cols='80' class='form-control' placeholder='Here can be your description'>{$description}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
     ";
}
function account_summary(){
    if (isset($_SESSION['account'])){
        $account = $_SESSION['account'];
    }else{
        $account = "";
    }
    if (isset($_SESSION['mobile'])){
        $mobile = $_SESSION['mobile'];
    }else{
        $mobile = "";
    }
    if (isset($_SESSION['name'])){
        $name = $_SESSION['name'];
    }else{
        $name = "";
    }
    if (isset($_SESSION['debit'])){
        $debit = $_SESSION['debit'];
    }else{
        $debit = "";
    }
    if (isset($_SESSION['credit'])){
        $credit = $_SESSION['credit'];
    }else{
        $credit = "";
    }
    if (isset($_SESSION['balance'])){
        $balance = $_SESSION['balance'];
    }else{
        $balance = "";
    }

    echo"
        <div class='row'>
            <div class='col-md-3'>
                <div class='form-group'>
                    <label>Account No#</label>
                        <input type='text' name='date' class='form-control' placeholder='Home Address' value='{$account}'>
                </div>
            </div>
            <div class='col-md-3'>
                <div class='form-group'>
                    <label>Mobile No#</label>
                        <input type='text'  name='date' class='form-control' placeholder='Home Address' value='{$mobile}'>
                            </div>
                        </div>
                        <div class='col-md-6'>
                            <div class='form-group'>
                                <label>Amount Holder</label>
                                <input type='text'  name='date' class='form-control' placeholder='Home Address' value='{$name}'>
                            </div>
                        </div>
                    </div> 
                    
                    <div class='row'>
                        <div class='col-md-4'>
                            <div class='form-group'>
                                <label>Debit</label>
                                <input type='text' name='date' class='form-control' placeholder='Home Address' value='{$debit}'>
                            </div>
                        </div>
                        <div class='col-md-4'>
                            <div class='form-group'>
                                <label>Debit</label>
                                <input type='text' name='date' class='form-control' placeholder='Home Address' value='{$credit}'>
                            </div>
                        </div>
                        <div class='col-md-4'>
                            <div class='form-group'>
                                <label>Credit</label>
                                <input type='text' name='date' class='form-control' placeholder='Home Address' value='{$balance}'>
                            </div>
                        </div>
                    </div>            
    
    ";
}
?>
<div class='row'>
    <div class='col-md-4'>
        <div class='card'>
            <div class='card-header'>
                <h5 class='title'>Search User Account</h5>
            </div>
            <form method='post' action='block.php' enctype='multipart/form-data' role='form' >
                <div class='card-body'>
                    <div class='input-group'>
                        <div class='input-group-prepend'>
                            <div class='input-group-text'>
                                <i class='fab fa-dribbble'></i>
                            </div>
                        </div>
                        <input type='text' name="q" class='form-control' placeholder='With Font Awesome Icons'>
                    </div>
                    <div class='form-check form-check-radio'>
                        <label class='form-check-label'>
                            <input class='form-check-input' type='radio' name='check' id='exampleRadios1' value='1' checked>
                            Search by mobile number
                            <span class='form-check-sign'></span>
                        </label>
                    </div>
                    <div class='form-check form-check-radio'>
                        <label class='form-check-label'>
                            <input class='form-check-input' type='radio' name='check' id='exampleRadios2' value='2' >
                            Search by account number
                            <span class='form-check-sign'></span>
                        </label>
                    </div>
                </div>
                <div class='card-footer pull-right'>
                    <button type='submit' name='submit' value='search-account' class='btn btn-fill btn-primary '> Search</button>
                </div>
            </form>
        </div>
    </div>
    <div class='col-md-8'>
        <div class='card'>
            <div class='card-header'>
                <h5 class='title'>Account Details</h5>
            </div>
            <form method='post' action='block.php' enctype='multipart/form-data' role='form' >
                <div class='card-body'>
                    <?php account_summary();?>
                </div>
            </form>
        </div>
    </div>
</div>
<div class='row'>
    <div class='col-md-4'>
        <div class='card'>
            <div class='card-header'>
                <h5 class='title'>Top Up Client Account</h5>
            </div>
            <form method='post' action='block.php' enctype='multipart/form-data' role='form' >
                    <?php top_up_user_account();?>
                <div class='card-footer'>
                    <button type='submit' name='submit' value='top-up-account' class='btn btn-fill btn-primary'>Top Up Account</button>
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
                    <h5 class='title'>Ledger</h5>
                </div>
                </p>
                </di>
                <p class='card-description'>
                <div class='table-responsive'>
                    <table class='table tablesorter ' id=''>
                        <thead class=' text-primary\'>
                        <th>Date</th>
                        <th>Ref. No#</th>
                        <th>Account</th>
                        <th>Mobile</th>
                        <th class='text-center'>Amount</th>
                        </thead>
                        <tbody>
                        <?php top_up_account($conn,$userID);?>
                        </tbody>
                    </table>
                </div>
                </p>
            </div>
        </div>
    </div>
</div>
