<?php

//Establish post variables
$user       = filter_input(INPUT_POST,'name',FILTER_SANITIZE_STRING);
$email      = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
$major      = filter_input(INPUT_POST,'major',FILTER_SANITIZE_STRING);
$comments   = filter_input(INPUT_POST,'comments',FILTER_SANITIZE_STRING);
$continents = $_POST['continents'];
//    filter_input(INPUT_POST,'continents',FILTER_DEFAULT);

if($major == 'cs')
{
    $major = "Computer Science";
}

elseif($major == 'wdd')
{
    $major = "Web Design and Development";
}

elseif($major == 'cit')
{
    $major = "Computer Information Technology";
}

elseif($major == 'ce')
{
    $major = "Computer Engineering";
}

?>
<html>
    <head>
        <title>CS313 - Submitted Data</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
        <h1>Student Registration</h1>
        Name: <?php echo $user; ?><br>
        Email: <a href='mailto:<?php echo $email; ?>'><?php echo $email; ?></a><br>
        Major: <?php echo $major; ?><br>
        Comments: 
        <?php echo $comments; ?>
        <br>
        <?php 
//        var_dump $_POST['continents']; 
        ?>
        Continents Visited: <br><?php        
                             //loop
                            foreach ($continents as $continent) 
                            { 	
                                $cont = htmlspecialchars($continent);
                                
                                if($cont == 'europe')
                                {
                                    $cont = "Europe";
                                }
                                elseif($cont == 'na')
                                {
                                    $cont = "North America";
                                }
                                elseif($cont == 'sa')
                                {
                                    $cont = "South America";
                                }
                                elseif($cont == 'ant')
                                {
                                    $cont = "Antarctica";
                                }
                                elseif($cont == 'aus')
                                {
                                    $cont = "Australia";
                                }
                                elseif($cont == 'africa')
                                {
                                    $cont = "Africa";
                                }
                                elseif($cont == 'asia')
                                {
                                    $cont = "Asia";
                                }
                                
                                
                                echo "$cont<br>"; 
                            }
                            ?>
        
    </body>
</html>        