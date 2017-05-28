<?php

//Grab some dependencies
require_once('class/functions.php');
require_once('class/class.phpmailer.php');
require_once('model/customer_db.php');

$username = $_SESSION['auth_username'];
$info = getInfoForResend($username);
    foreach($info as $user)
    {
        $string = $user['string'];
        $name = $user['fname'];
        $email = $user['email'];
        
        //Send verification email
        sendVerification($fname,$email,$string);
    }

    //Notify the user what happened
    echo '<br><div class="msg">User registration pending. Please check your email to verify your account.</div><br>';  