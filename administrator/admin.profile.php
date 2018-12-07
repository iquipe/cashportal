<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 25/11/2018
 * Time: 4:25 PM
 */

$sql = 'SELECT * FROM get_user WHERE `token` = ?';
$check = $conn->prepare($sql);
$check->bind_param('s',$token);

//sign up session
$token = $_COOKIE['user-token'];
$check->execute();

$result =$check->get_result();
$user = mysqli_fetch_assoc($result);
if(!isset($user['token'])){
    header('location: index.php?validate=1');
}else {
    $_SESSION['user-id'] = $user['userID'];
    $f_name = $user['fname'];
    $l_name = $user['lname'];

    $username = $user['username'];
    $password = $user['password'];

    $account = $user['account'];
    $email = $user['email'];
    $mobile = $user['mobile'];

    $address = $user['address'];
    $city = $user['city'];
    $country = $user['country'];
    $postal = $user['postal'];
    $about = $user['about'];

    echo "
        <div class='row'>
            <div class='col-md-8'>
                <div class='card'>
                    <div class='card-header'>
                        <h5 class='title'>Edit Profile</h5>
                    </div>
                    <form method='post' action='block.php' enctype='multipart/form-data' role='form' >
                        <div class='card-body'>
                     
                            <div class='row'>
                                <div class='col-md-5 pr-md-1'>
                                    <div class='form-group'>
                                        <label>Company (disabled)</label>
                                        <input type='text'  class='form-control' disabled='' placeholder='Company' value='{$ip}'>
                                    </div>
                                </div>
                                <div class='col-md-3 px-md-1'>
                                    <div class='form-group'>
                                        <label>Username</label>
                                        <input type='text' name='username' class='form-control' placeholder='Username' value='{$username}'>
                                    </div>
                                </div>
                                <div class='col-md-4 pl-md-1'>
                                    <div class='form-group'>
                                        <label for='exampleInputEmail1'>Password</label>
                                        <input type='password' name='password' class='form-control' placeholder='**' value='{$email}'>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-6 pr-md-1'>
                                    <div class='form-group'>
                                        <label>First Name</label>
                                        <input type='text' name='f-name' class='form-control' placeholder='Company' value='{$f_name}'>
                                    </div>
                                </div>
                                <div class='col-md-6 pl-md-1'>
                                    <div class='form-group'>
                                        <label>Last Name</label>
                                        <input type='text' name='l-name' class='form-control' placeholder='Last Name' value='{$l_name}'>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-6 pr-md-1'>
                                    <div class='form-group'>
                                        <label>Email</label>
                                        <input type='email' name='email' class='form-control' placeholder='email' value='{$email}'>
                                    </div>
                                </div>
                                <div class='col-md-6 pl-md-1'>
                                    <div class='form-group'>
                                        <label>Mobile</label>
                                        <input type='text' name='mobile' class='form-control' placeholder='mobile eg 233500000001' value='{$mobile}'>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <div class='form-group'>
                                        <label>Address</label>
                                        <input type='text' name='address' class='form-control' placeholder='Home Address' value='{$address}'>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-4 pr-md-1'>
                                    <div class='form-group'>
                                        <label>City</label>
                                        <input type='text' name='city' class='form-control' placeholder='City' value='{$city}'>
                                    </div>
                                </div>
                                <div class='col-md-4 px-md-1'>
                                    <div class='form-group'>
                                        <label>Country</label>
                                        <input type='text' name='country' class='form-control' placeholder='Country' value='{$country}'>
                                    </div>
                                </div>
                                <div class='col-md-4 pl-md-1'>
                                    <div class='form-group'>
                                        <label>Postal Code</label>
                                        <input type='number' name='postal' class='form-control' placeholder='ZIP Code' value='{$postal}'>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-8'>
                                    <div class='form-group'>
                                        <label>About Me</label>
                                        <textarea name='about' rows='4' cols='80' class='form-control' placeholder='Here can be your description'>{$about}</textarea>
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
            <div class='col-md-4'>
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
}