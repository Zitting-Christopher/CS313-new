<?php
//Start Session
session_start();

//Grab some dependencies
require_once('model/customer_db.php');


    //Check for login
    if ((isset($_GET['loggedin']) && $_GET['loggedin'] == 1))
    {
        
        if(isset($_POST['username']) && $_POST['password'])
        {
            $username = filter_input(INPUT_POST,'username');
            $password = filter_input(INPUT_POST,'password');
            $user = verifyLogin($username);
            foreach ($user as $userInfo)
            {
                $db_pass = $userInfo['password'];
                if(password_verify($password,$db_pass))
                {
                    $_SESSION["auth_loggedin"] = 1;
                    $_SESSION["auth_username"] = $username;
                    header("Location:index.php?action=myaccount");
                }
                else
                {
                    header("Location:index.php?action=loginfailed");
                }
            }
        }
        
//        if(isset($_POST['update']))
//        {
//            $username = $_SESSION['auth_username'];
//            
//            
//            header("Location:index.php?action=myaccount");
//        }
    }

    //Set GET variable
    $action = filter_input(INPUT_GET,'action', FILTER_DEFAULT);

    //Check if someone is trying to resend link but is not logged in
    if(isset($_GET['action']) && $action == 'resend' && $_SESSION['auth_loggedin'] == 0)
    {
        header("Location:index.php");
    }

?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <?php
            if (isset($_GET['action']))
            {
                if ($action == 'login')
                {
                ?>
                    <title>Underdog Idols - Login</title>
                <?php
                }
                
                if ($action == 'loginfailed')
                {
                ?>
                    <title>Underdog Idols - Login Failed</title>
                <?php
                }
                
                if ($action == 'register')
                {
                ?>
                    <title>Underdog Idols - Register</title>
                <?php
                }
                
                if ($action == 'resend')
                {
                ?>
                    <title>Underdog Idols - Resend Verification</title>
                <?php
                }
                
                if ($action == 'videos')
                {
                ?>
                    <title>Underdog Idols - Videos</title>
                <?php
                }
                
                if ($action == 'agents')
                {
                ?>
                    <title>Underdog Idols - Recording Agents</title>
                <?php
                }
                
                if ($action == 'label')
                {
                ?>
                    <title>Underdog Idols - Label</title>
                <?php
                }
                
                if ($action == 'update')
                {
                ?>
                    <title>Underdog Idols - Update User Account Info</title>
                <?php
                }
                
                if ($action == 'logout')
                {
                    //Get rid of session info
                    $_SESSION = array();
                    
                ?>
                    <title>Underdog Idols - Logout</title>
                    <meta http-equiv="refresh" content="3;URL='index.php'">
                <?php
                }
            }
            
            elseif (isset($_GET['verify']))
                {
                ?>
                    <title>Redirecting...</title>
                    <meta http-equiv="refresh" content="5;URL='index.php?action=login'">
                <?php
                }
        
            else
                {
                ?>  
                    <title>Underdog Idols - Home</title>
                <?php
                }
        ?>
		<meta http-equiv="pragma" content="no-cache" />
        <link rel="stylesheet" type="text/css" href="css/stylesheet.css?version={NewVersionOnRequired}"><link rel="stylesheet" type="text/css" href="css/w3.css?version={NewVersionOnRequired}">
		<script>window.twttr = (function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0],
			t = window.twttr || {};
			if (d.getElementById(id)) return t;
			js = d.createElement(s);
			js.id = id;
			js.src = "https://platform.twitter.com/widgets.js";
			fjs.parentNode.insertBefore(js, fjs);

			t._e = [];
			t.ready = function(f) {
			t._e.push(f);
			};

			return t;	
			}(document, "script", "twitter-wjs"));</script>
		<script>
		twttr.widgets.createTimeline(
		{
			sourceType: "profile",
			screenName: "UnderdogIdols"
		},
			document.getElementById("twitter")
		);
		</script>
    </head>
    <?php
       require_once('views/header.php');
    ?>
        <section>
            <div id="section">
                <?php
                //If uri includes index.php?action
                if (isset($_GET['action']))
                {
                    //If we are trying to register
                    if ($action == 'register')
                    {
                         //Grab a few files
                        require_once('views/register.php');
                        require_once('views/footer.php');
                    }
                    
                    //If we are trying to resend verification link
                    if ($action == 'resend')
                    {
                         //Grab a few files
                        require_once('views/resend.php');
                        require_once('views/footer.php');
                    }
                    
                    elseif ($action == 'login')
                    {
                         //Grab a few files
                        require_once('views/login.php');
                        require_once('views/footer.php');
                    }
                    
                    elseif ($action == 'loginfailed')
                    {
                         //Grab a few files
                        echo '<br><div class="msg">The username or password you entered is incorrect.</div><br>';
                        require_once('views/login.php');
                        require_once('views/footer.php');
                    }
                    
                    elseif ($action == 'logout')
                    {
                        
//                        //Erase data from cookie
//                        $_COOKIE['auth_username'] = '';
                        
                        //Output some info to the user
                        echo '<br><div class="msg">You have been logged out.</div><br>';
                        require_once('views/footer.php');
                    }
                    
                    elseif ($action == 'update')
                    {
                         //Grab a few files
                        require_once('views/update_user.php');
                        require_once('views/footer.php');
                    }
                    
                    elseif ($action == 'videos')
                    {
                         //Grab a few files
                        require_once('views/videos.php');
                        require_once('views/footer.php');
                    }
                    
                    elseif ($action == 'agents')
                    {
                         //Grab a few files
                        require_once('views/companies.php');
                        require_once('views/footer.php');
                    }
                    
                    elseif ($action == 'label')
                    {
                         //Grab a few files
                        require_once('views/label.php');
                        require_once('views/footer.php');
                    }
                    
                    elseif ($action == 'myaccount')
                    {
                        if(isset($_SESSION['auth_username']))
                        {
                            //Grab a few files
                            echo '<br><div class="msg">Howdy there, '.$_SESSION['auth_username'].'! Welcome to your Underdog Idols Account Management.</div><br>';
                            require_once('views/footer.php');
                            
                        }
                    }

                    //If the action specified does not exist
                    else
                    {
                        echo '<br>No such action<br><br>';
                        require_once('views/footer.php');
                    }
                }
                
                elseif (isset($_GET['verify']))
                {
                    require_once('model/customer_db.php');
                    
                    //Grab the string from GET array
                    $string = filter_input(INPUT_GET,'verify');
                    
                    //Verify the user if the string exists, then redirect to login page (redirect code is in <head></head>)
                    $getString = getUserByString($string);
                    if($getString == 1)
                    {
                        verifyEmail($string);
                        echo '<br><div class="msg">Your email has now been verified. Redirecting to Login page...</div><br>';
                        require_once('views/footer.php');
                    }
                    
                    //The string does not match anyone in the db who has not been verified, (redirect to login page redirect code is in <head></head>)
                    else
                    {
                        echo '<br><div class="msg">The link you clicked is invalid. Redirecting to Login page...</div><br>';
                        require_once('views/footer.php');
                    }      
                }
                
                else
                {
                    ?>
                    <div id="featuredVid">
                        <h3>Featured Video</h3>
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/aGbGmZ09CG8?list=PLC076C679B8346DE7" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <div id="featuredPro">
                        <h3>Featured Profile</h3>
                        <img src="images/girl-holding-karaoke-mic-41542.jpeg" align="left" width="200" height="150">
                        <strong>Ariana Pequenita</strong>&nbsp;&nbsp;&nbsp;&nbsp;
                        <strong>Age:</strong> 18
                        <br><br>
                        <strong>About Me:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        <br>
                        <br>
                        <br>
                        <br>
                        &nbsp;<img src="images/social-button-facebook.png" width=20 height=20>
                        &nbsp;<img src="images/social-button-twitter.png" width=20 height=20>
                        &nbsp;<img src="images/social-button-google-plus.png" width=20 height=20>
                        &nbsp;<img src="images/social-button-pinterest.png" width=20 height=20>
                        &nbsp;<img src="images/social-button-tumblr.png" width=20 height=20>
                        &nbsp;<img src="images/social-button-reddit.png" width=20 height=20>
                    </div>
                    <div id="recVid">
                        <h3>Recent Videos</h3>
                    </div>
                    <div id="topCont">
                        <h3>Top Contestants</h3>
                    </div>
                    <div id="blogs">
                        <h3>Recent Blog Posts</h3>
                        <iframe height="500" src="http://blog.underdogidols.com/grab.php?default" frameborder="0"></iframe>
                    </div>
                    <div id="adsMid">
                        &nbsp;
                    </div>
                    <div id="twitter">
                        <h3>Latest Tweets</h3>
                        <a class="twitter-timeline" data-tweet-limit="5" target="_blank" href="https://twitter.com/UnderdogIdols">
                        Tweets by @UnderdogIdols</a>
                    </div>
                    <div id="blank">
                        &nbsp;
                    </div>
                    <div id="advertisers">
                        <h3>Advertisers go Here</h3>
                    </div>
                    <?php
                    require_once('views/footer.php');
                }
            ?>