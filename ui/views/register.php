<?php

//Grab some dependencies
require_once('class/functions.php');
require_once('class/class.phpmailer.php');
require_once('model/customer_db.php');

//Set POST variables
$type = 2; //User type 1 = admin, User type 2 is contestant
$username = filter_input(INPUT_POST,'user_uname',FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST,'user_pass');
$vpass = filter_input(INPUT_POST,'user_vpass');
$email = filter_input(INPUT_POST,'user_email',FILTER_SANITIZE_EMAIL);
$fname = filter_input(INPUT_POST,'user_fname',FILTER_SANITIZE_STRING);
$lname = filter_input(INPUT_POST,'user_lname',FILTER_SANITIZE_STRING);
$age = filter_input(INPUT_POST,'user_age',FILTER_SANITIZE_NUMBER_INT);
$gender = filter_input(INPUT_POST,'user_gender');
$saddress = filter_input(INPUT_POST,'user_saddress');
$city = filter_input(INPUT_POST,'user_city');
$state = filter_input(INPUT_POST,'user_state');
$zip = filter_input(INPUT_POST,'user_zip',FILTER_SANITIZE_NUMBER_INT);
$phone = filter_input(INPUT_POST,'user_phone',FILTER_SANITIZE_NUMBER_INT);
$genre = filter_input(INPUT_POST,'user_genre');
$aidol = filter_input(INPUT_POST,'user_aidol');
$hollywood = filter_input(INPUT_POST,'user_hollywood');
$bio = filter_input(INPUT_POST,'user_about');
$audition = filter_input(INPUT_POST,'user_audvid',FILTER_SANITIZE_URL);

////Process Registration
    if (isset($_POST['user_pass']))
    {
        if($password == $vpass)
        {
            $specchars = array('!','@','#','$','%','^','&','*','-','+','-','=','~','`','<','>',',','.','?','/',';',':');
                
            if(strlen($vpass) < 8 || strtoupper($vpass) == $vpass || strtolower($vpass) == $vpass || strpos_arr($vpass,$specchars) == false)
            {
                //Notify the user what happened
                echo '<br><div class="msg">The password you provided does not meet the requirements. Please try again.</div><br>';
            }
            
            else
            {
               

                //Hash the password
                $pass_hashed = password_hash($password,PASSWORD_DEFAULT);

                //Generate random string
                $string = generateRandomString();
    //            $string = 'kQhZFL49NI';

                //Register the user
                registerUser($type,$username,$pass_hashed,$email,$fname,$lname,$age,$gender,$saddress,$city,$state,$zip,$phone,$genre,$aidol,$hollywood,$bio,$audition,$string);

                //Debugging tools

    //                print_r($_POST);

    //                echo $type.', '.$username.', '.$pass_hashed.', '.$email.', '.$fname.', '.$lname.', '.$age.', '.$gender.', '.$saddress.', '.$city.', '.$state.', '.$zip.', '.$phone.', '.$genre.', '.$aidol.', '.$hollywood.', '.$bio.', '.$audition.', '.$string;


                //Send verification email
                    sendVerification($fname,$email,$string);

                //Notify the user what happened
                echo '<br><div class="msg">User registration pending. Please check your email to verify your account.</div><br>';
            }
        }
        else
        {
            //Notify the user what happened
            echo '<br><div class="msg">Passwords do not match. Please try again.</div><br>';
        }
        
    }  
else
{
?>
<br>
<h2>Contestant Registration</h2>
<span style="margin-left:40px;">All fields are required. Password must contain at least 8 characters, 1 uppercase, 1 lowercase, and 1 special character.</span><br><br>
<form action="index.php?action=register" method="post">
    <table>
        <tr>
            <td class="llview">First Name: </td>
            <td class="lview"><input type="text" name="user_fname" placeholder="Enter First Name" required></td>
        </tr>
        <tr>
            <td class="llview">Last Name: </td>
            <td class="lview"><input type="text" name="user_lname" placeholder="Enter Last Name" required></td>
        </tr>
        <tr>
            <td class="llview">Age: </td>
            <td class="lview"><input type="text" name="user_age" placeholder="Enter Age" required></td>
        </tr>
        <tr>
            <td class="llview">Gender: </td>
            <td class="lview"><select name="user_gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select></td>
        </tr>
        <tr>
            <td class="llview">Street Address: </td>
            <td class="lview"><input type="text" name="user_saddress" placeholder="Enter Street Address" required></td>
        </tr>
        <tr>
            <td class="llview">City: </td>
            <td class="lview"><input type="text" name="user_city" placeholder="Enter City" required></td>
        </tr>
        <tr>
            <td class="llview">State: </td>
            <td class="lview"><select name="user_state" required>
                <option value="AL">Alabama</option>
                <option value="AK">Alaska</option>
                <option value="AZ">Arizona</option>
                <option value="AR">Arkansas</option>
                <option value="CA">California</option>
                <option value="CO">Colorado</option>
                <option value="CT">Connecticut</option>
                <option value="DE">Delaware</option>
                <option value="DC">District Of Columbia</option>
                <option value="FL">Florida</option>
                <option value="GA">Georgia</option>
                <option value="HI">Hawaii</option>
                <option value="ID">Idaho</option>
                <option value="IL">Illinois</option>
                <option value="IN">Indiana</option>
                <option value="IA">Iowa</option>
                <option value="KS">Kansas</option>
                <option value="KY">Kentucky</option>
                <option value="LA">Louisiana</option>
                <option value="ME">Maine</option>
                <option value="MD">Maryland</option>
                <option value="MA">Massachusetts</option>
                <option value="MI">Michigan</option>
                <option value="MN">Minnesota</option>
                <option value="MS">Mississippi</option>
                <option value="MO">Missouri</option>
                <option value="MT">Montana</option>
                <option value="NE">Nebraska</option>
                <option value="NV">Nevada</option>
                <option value="NH">New Hampshire</option>
                <option value="NJ">New Jersey</option>
                <option value="NM">New Mexico</option>
                <option value="NY">New York</option>
                <option value="NC">North Carolina</option>
                <option value="ND">North Dakota</option>
                <option value="OH">Ohio</option>
                <option value="OK">Oklahoma</option>
                <option value="OR">Oregon</option>
                <option value="PA">Pennsylvania</option>
                <option value="RI">Rhode Island</option>
                <option value="SC">South Carolina</option>
                <option value="SD">South Dakota</option>
                <option value="TN">Tennessee</option>
                <option value="TX">Texas</option>
                <option value="UT">Utah</option>
                <option value="VT">Vermont</option>
                <option value="VA">Virginia</option>
                <option value="WA">Washington</option>
                <option value="WV">West Virginia</option>
                <option value="WI">Wisconsin</option>
                <option value="WY">Wyoming</option>
                <option value="AS">American Samoa</option>
                <option value="GU">Guam</option>
                <option value="PR">Puerto Rico</option>
                <option value="VI">Virgin Islands</option>
            </select></td>
        </tr>
        <tr>
            <td class="llview">Zip Code: </td>
            <td class="lview"><input type="text" name="user_zip" placeholder="Enter State" required></td>
        </tr>
        <tr>
            <td class="llview">Phone Number: </td>
            <td class="lview"><input type="text" name="user_phone" placeholder="Enter Phone Number" required></td>
        </tr>
        <tr>
            <td class="llview">Preferred Music Genre: </td>
            <td class="lview"><input type="text" name="user_genre" placeholder="Enter Music Genre" required></td>
        </tr>
        <tr>
            <td class="llview">Have you performed on American Idol: </td>
            <td class="lview"><select name="user_aidol" required>
                <option value="no">No</option>
                <option value="yes">Yes</option>
            </select></td>
        </tr>
        <tr>
            <td class="llview">If yes to the previous question, have you gone to Hollywood Week: </td>
            <td class="lview"><select name="user_hollywood" required>
                <option value="na">N/A</option>
                <option value="no">No</option>
                <option value="yes">Yes</option>
            </select></td>
        </tr>
        <tr>
            <td class="llview">Tell us about yourself: </td>
            <td class="lview"><textarea name="user_about" placeholder="Enter Bio Here" required></textarea></td>
        </tr>
        <tr>
            <td class="llview">Underdog Idols Audition link: </td>
            <td class="lview"><input type="text" name="user_audvid" placeholder="Text after 'v=' in youtube url" required></td>
        </tr>
        <tr>
            <td class="llview">Username: </td>
            <td class="lview"><input type="text" name="user_uname" placeholder="Enter Username" required></td>
        </tr>
        <tr>
            <td class="llview">Email Address: </td>
            <td class="lview"><input type="text" name="user_email" placeholder="Enter Email" required></td>
        </tr>
        <tr>
            <td class="llview">Password: </td>
            <td class="lview"><input type="password" name="user_pass" placeholder="1 upper, 1 lower, 1 spec char, 8 chars" required></td>
        </tr>
        <tr>
            <td class="llview">Verify Password: </td>
            <td class="lview"><input type="password" name="user_vpass" placeholder="Verify Password" required></td>
        </tr>
        <tr>
            <td class="llview"> </td>
            <td class="lview"><input type="submit" value="Register"></td>
        </tr>
    </table>
</form>
<br>

<?php
}
?>