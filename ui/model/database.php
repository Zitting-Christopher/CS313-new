<?php
    $dsn = 'mysql:host=jlg7sfncbhyvga14.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=kk5rxz1wd91mvapq';
$db_user = 'afjpbh9kpgioesei';
$db_pass = 'n8y3javl6lq58ewt';

    try {
        $db = new PDO($dsn, $db_user, $db_pass);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
//        include('../errors/database_error.php');
        exit();
    }
?>