<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 24/11/2018
 * Time: 8:41 AM
 */

    if (isset($_POST['ref'])){
        $refer = $_POST['ref'];
    }else{
        $refer = rand(100,999)."".date("Hymids");
    }

    if (isset($_POST['date'])){
        $date = $_POST['date'];
    }else{
        $date = date("d-m-Y");
    }

    if(isset($_POST['amount'])){
        $amount = $_POST['amount'];
    }else{
        $amount = "";
    }

    if(isset($_POST["description"])){
        $description= $_POST['description'];
    }else{
        $description ="";
    }

    echo "
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
                                        <label>Transfer To</label>
                                        <select name='address' class='form-control' placeholder='Home Address'>
                                            <option value=''></option>
                                            <option value='wallet'>To Wallet</option>
                                            <option value='other-wallet'>To other Wallet</option>                
                                        </select>   
                                    </div>
                                </div>
                                <div class='col-md-12'>
                                    <div class='form-group'>
                                        <label>Reference Number</label>
                                        <input type='text' name='refer' class='form-control' placeholder='Home Address' value='{$refer}'>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <label>Date</label>
                                        <input type='text' name='date' class='form-control' placeholder='City' value='{$date}'>
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
                                <div class='col-md-8'>
                                    <div class='form-group'>
                                        <label>Description</label>
                                        <textarea name='Description' rows='4' cols='80' class='form-control' placeholder='Here can be your description'>{$description}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='card-footer'>
                            <button type='submit' name='submit' value='profile' class='btn btn-fill btn-primary'>Save</button>
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
                                <a href='#'>
                                    <img class='avatar' src='../assets/img/anime6.png' alt='...'>
                                    <h5 class='title'>Mike Andrew</h5>
                                </a>
                        <p class='description'>
                            Ceo/Co-Founder
                        </p>
                    </div>
                    </p>
                    <p class='card-description'>
                        Do not be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                    </p>
                </div>
               
                <div class='card-footer '>
                    <div class='button-container'>
                        <button href='#' class='btn btn-icon btn-round btn-facebook'>
                            <i class='fab fa-facebook'></i>
                        </button>
                        <button href='#' class='btn btn-icon btn-round btn-twitter'>
                            <i class='fab fa-twitter'></i>
                        </button>
                        <button href='#' class='btn btn-icon btn-round btn-google'>
                            <i class='fab fa-google-plus'></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
                  
        ";
