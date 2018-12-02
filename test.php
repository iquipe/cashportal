<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 25/11/2018
 * Time: 7:04 AM
 */

$access = date("d-m-Y H:i:s:a") ."|". $userID."".rand(1000,9999);
$access = rand(10000,99999) ."". md5(md5(md5($access,true)));
$date =date("Y-m-d");
$time = date("H:i:s");
$sql ="INSERT INTO `checkout` (`userID`, `tranDate`, `tranTime`, `token`) VALUES (?,?,?,?)";
$checkout = $conn->prepare($sql);
$checkout->bind_param("ssss",$userID,$date,$time,$access);

if ( $checkout->execute() == TRUE){

    include_once "plugin/qrcode/qrlib.php";

    // Path where the images will be saved
    $filePath = 'qr/myimage.png';
    // Image (logo) to be drawn
    $logoPath = 'http://ourcodeworld.com/resources/img/ocw-empty.png';
    // qr code content
    $codeContents = 'http://iqminer.northeurope.cloudapp.azure.com/cashportal/index.php?u=user&ui=bank&e=1';
    // Create the file in the providen path
    // Customize how you want
    QRcode::png($codeContents,$filePath , QR_ECLEVEL_H, 20);

    // Start DRAWING LOGO IN QRCODE

    $QR = imagecreatefrompng($filePath);

    // START TO DRAW THE IMAGE ON THE QR CODE
    $logo = imagecreatefromstring(file_get_contents($logoPath));

    /**
     *  Fix for the transparent background
     ***/
    imagecolortransparent($logo , imagecolorallocatealpha($logo , 0, 0, 0, 127));
    imagealphablending($logo , false);
    imagesavealpha($logo , true);

    $QR_width = imagesx($QR);
    $QR_height = imagesy($QR);

    $logo_width = imagesx($logo);
    $logo_height = imagesy($logo);

    // Scale logo to fit in the QR Code
    $logo_qr_width = $QR_width/3;
    $scale = $logo_width/$logo_qr_width;
    $logo_qr_height = $logo_height/$scale;

    imagecopyresampled($QR, $logo, $QR_width/3, $QR_height/3, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);

    // Save QR code again, but with logo on it
    imagepng($QR,$filePath);

    // End DRAWING LOGO IN QR CODE

    // Ouput image in the browser
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
                                        <label>Transaction Date</label>
                                        <img src=\"'.$filePath.'\" />
                                    </div>
                                </div>
                                <div class='col-md-12'>
                                    <div class='form-group'>
                                        <label>Pay To Mobile Number</label>
                                        <input type='text' name='mobile' class='form-control' placeholder='Home Address' value='{$access}'>
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
}else{
    $qr="no";
}
