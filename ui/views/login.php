<?php

    if (isset($_SESSION['auth_loggedin']))
    {
        echo '<script>window.location.assign("https://dev.underdogidols.com/index.php?action=myaccount)</script>';
    }
?>
<div id="loginform">
    <h2>Please Login</h2>
<form action="index.php?loggedin=1" method="post">
    <table>
    <tr>
    <?php
    if (isset($username))
        {
    ?>
        <td class="llview">Username: </td>
        <td class="lview"><input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>" /></td>
   <?php 
        }
    else 
        {
        ?>
        <td class="llview">Username:</td>
        <td class="lview"><input type="text" name="username" placeholder="Username" /></td>
    <?php
        }
        ?>
    </tr>
    <tr>
        <td class="llview">Password:</td>
        <td class="lview"><input type="password" name="password" placeholder="Password" /></td>
    </tr>
    <tr>
        <td class="llview"></td>
        <td class="lview"><input type="submit" value="Login"></td>
    </tr>
    </table>
</form>
<br>
</div>