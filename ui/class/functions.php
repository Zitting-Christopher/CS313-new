<?php

//Send a verification email at registration
function sendVerification($fname,$address,$string)
{
    //Email the file to Josh
    $email = new PHPMailer();
    $email->isHTML(true);
    $email->From      = 'noreply@underdogidols.com';
    $email->FromName  = 'Underdog Idols User Registration';
    $email->Subject   = 'Please verify your email to activate your account';
    $email->Body      = $fname.',<br>Thank you for registering with Underdog Idols. Please verify your email address by clicking <a href="https://dev.underdogidols.com/index.php?verify='.$string.'">here</a>. Alternatively, you can copy and paste the following link into your browser to verify your email address: https://dev.underdogidols.com/index.php?verify='.$string.' <br>Regards,<br>Underdog Idols Team';
    
    $email->AddAddress($address);
    $email->AddAddress('chris@hostyour.space');
    return $email->Send();
}

//Generate string to associate with email links for validation
function generateRandomString($length = 10)
{
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

//Check for an existence of at least one character from an array in a string
function strpos_arr($haystack, $needle)
{
    if(!is_array($needle)) $needle = array($needle);
    foreach($needle as $what) {
        if(($pos = strpos($haystack, $what))!==false) return $pos;
    }
    return false;
}

function ytVid($url)
{
    $output = '<iframe width="560" height="315" src="'.$url.'" frameborder="0" allowfullscreen></iframe>';
    return $output;
}
?>