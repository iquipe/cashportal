<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 24/11/2018
 * Time: 1:38 PM
 */

if (isset($_POST['ref'])){
    $refer = $_POST['ref'];
}else{
    $refer = rand(100,999).''.date('Hymids');
}

if(isset($_POST['mobile'])){
    $mobile = $_POST['mobile'];
}else{
    $mobile = '';
}

if (isset($_POST['date'])){
    $date = $_POST['date'];
}else{
    $date = date('d-m-Y');
}

if(isset($_POST['amount'])){
    $amount = $_POST['amount'];
}else{
    $amount = '';
}

if(isset($_POST['description'])){
    $description= $_POST['description'];
}else{
    $description ='';
}

echo"
        <div class='row'>
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
                                        <label>Bank Name</label>
                                        <input type='text' readonly name='date' class='form-control' placeholder='Home Address' value='{$date}'>  
                                    </div>
                                </div>
                                <div class='col-md-12'>
                                    <div class='form-group'>
                                        <label>Account Number</label>
                                        <input type='text' readonly name='transfer' class='form-control' placeholder='Wallet Address' value='MY WALLET'>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <label>Account Name</label>
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
                        <div class='card-footer'>
                            <button type='submit' name='submit' value='send-cash-wallet' class='btn btn-fill btn-primary'>Send Cash</button>
                        </div>
                    </form>    
                </div>
            </div>
            ";
?>
<div class='col-md-8'>
    <div class='card  card-user'>
        <div class='card-body '>
            <p class='card-text'>
            <div class='author'>
                <div class='block block-one'></div>
                <div class='block block-two'></div>
                <div class='block block-three'></div>
                <div class='block block-four'></div>
                <h5 class='title'>Mike Andrew</h5>
            </div>
            </p>
            </di>
            <p class='card-description'>
            <div class='table-responsive'>
                <table class='table tablesorter ' id=''>
                    <thead class=' text-primary\'>
                    <th>Date</th>
                    <th>Ref. No#</th>
                    <th>Details</th>
                    <th class='text-center'>Debit</th>
                    <th class='text-center'>Credit</th>
                    </thead>
                    <tbody>
                    <?php user_bank_transaction($conn,$userID);?>
                    </tbody>
                </table>
            </div>
            </p>
        </div>
    </div>
</div>
