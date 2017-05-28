<?php

//Grab some dependencies
require_once('model/customer_db.php');
require_once('class/class.phpmailer.php');
require_once('model/customer_db.php');

//Set POST variables
$username = $_SESSION['auth_username'];
@$phone = filter_input(INPUT_POST,'user_phone',FILTER_SANITIZE_NUMBER_INT);
@$genre = filter_input(INPUT_POST,'user_genre');
@$bio = filter_input(INPUT_POST,'user_about');
@$audition = filter_input(INPUT_POST,'user_audvid',FILTER_SANITIZE_URL);

////Process Registration
    if (isset($_POST['update']))
    { 
        //Update the user
        updateUser($username,$phone,$genre,$bio,$audition);

        //Debugging tools
//        print_r($_POST);
//        echo $username.', '.$phone.', '.$genre.', '.$bio.', '.$audition;

        //Notify the user what happened
        echo '<br><div class="msg">Your account information was updated successfully.</div><br>';
    }
    else
    {
        //Get User info from db
        $users = verifyLogin($username);
        foreach($users as $user)
        {
        
        ?>
        <br>
        <h2>Update User Account Info</h2>
        <br>
        <form action="index.php?action=update" method="post">
        <table>
            <tr>
                <td class="llview">Phone Number: </td>
                <td class="lview"><input type="text" name="user_phone" value="<?php echo $user['phone']; ?>" required></td>
            </tr>
            <tr>
                <td class="llview">Preferred Music Genre: </td>
                <td class="lview"><input type="text" name="user_genre" value="<?php echo $user['genre']; ?>" required></td>
            </tr>
            <tr>
                <td class="llview">Tell us about yourself: </td>
                <td class="lview"><textarea name="user_about" value="<?php echo $user['bio']; ?>" required></textarea></td>
            </tr>
            <tr>
                <td class="llview">Underdog Idols Audition link: </td>
                <td class="lview"><input type="text" name="user_audvid" value="<?php echo $user['audition']; ?>" required></td>
            </tr>
            <tr>
                <td class="llview"> </td>
                <td class="lview"><input type="submit" value="Update Account Info"></td>
                <input type="hidden" name="update" value="update">
            </tr>
        </table>
        </form>
        <br>

        <?php
        }
    }
?>