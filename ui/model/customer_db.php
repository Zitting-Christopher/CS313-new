<?php
require('database.php');

function addLogs($loggedin,$username,$ip,$uri,$agent,$dt){
    global $db;
    $query = 'INSERT INTO logs(loggedin,username,ip,uri,agent,timestamp)
                VALUES (:loggedin,:username,:ip,:uri,:agent,:dt)';
    $statement = $db->prepare($query);
    $statement->bindValue(":loggedin", $loggedin);
    $statement->bindValue(":username", $username);
    $statement->bindValue(":ip", $ip);
    $statement->bindValue(":uri", $uri);
    $statement->bindValue(":agent", $agent);
    $statement->bindValue(":dt", $dt);
    $statement->execute();
    $statement->closeCursor();
}

function registerUser($type,$username,$password,$email,$fname,$lname,$age,$gender,$saddress,$city,$state,$zip,$phone,$genre,$aidol,$hollywood,$bio,$audition,$string){
    global $db;
    $query = 'INSERT INTO users(type,username,password,email,fname,lname,age,gender,saddress,city,state,zip,phone,genre,aidol,hollywood,bio,audition,string)
            VALUES (:type,:username,:password,:email,:fname,:lname,:age,:gender,:saddress,:city,:state,:zip,:phone,:genre,:aidol,:hollywood,:bio,:audition,:string)';
    $statement = $db->prepare($query);
    $statement->bindValue(":type", $type);
    $statement->bindValue(":username", $username);
    $statement->bindValue(":password", $password);
    $statement->bindValue(":email", $email);
    $statement->bindValue(":fname", $fname);
    $statement->bindValue(":lname", $lname);
    $statement->bindValue(":age", $age);
    $statement->bindValue(":gender", $gender);
    $statement->bindValue(":saddress", $saddress);
    $statement->bindValue(":city", $city);
    $statement->bindValue(":state", $state);
    $statement->bindValue(":zip", $zip);
    $statement->bindValue(":phone", $phone);
    $statement->bindValue(":genre", $genre);
    $statement->bindValue(":aidol", $aidol);
    $statement->bindValue(":hollywood", $hollywood);
    $statement->bindValue(":bio", $bio);
    $statement->bindValue(":audition", $audition);
    $statement->bindValue(":string", $string);
    $statement->execute();
    $statement->closeCursor();
}

function updateUser($username,$phone,$genre,$bio,$audition){
    global $db;
    $query = 'UPDATE users
    SET phone = :phone, genre = :genre, bio = :bio, audition = :audition
    WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(":username", $username);
    $statement->bindValue(":phone", $phone);
    $statement->bindValue(":genre", $genre);
    $statement->bindValue(":bio", $bio);
    $statement->bindValue(":audition", $audition);
    $statement->execute();
    $statement->closeCursor();
}

function verifyLogin($username){
    global $db;
    $query = 'SELECT * FROM users
            WHERE username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(":username", $username);
    $statement->execute();
    $user = $statement->fetchAll();
    $statement->closeCursor();
    return $user;
}

function getInfoForResend($username){
    global $db;
    $query = 'SELECT email,fname,string FROM users
            WHERE username = :user
            AND verified = 0';
    $statement = $db->prepare($query);
    $statement->bindValue(":user", $username);
    $statement->execute();
    $user = $statement->fetchAll();
    $statement->closeCursor();
    return $user;
}

function getUserByString($string){
    global $db;
    $query = 'SELECT COUNT(*) FROM users
            WHERE string = :string
            AND verified = 0';
    $statement = $db->prepare($query);
    $statement->bindValue(":string", $string);
    $statement->execute();
    $user = $statement->fetchColumn();
    $statement->closeCursor();
    return $user;
}

function getRecVid(){
    global $db;
    $query = 'SELECT audition FROM users
            WHERE user = MAX(user)
            AND verified = 1';
    $statement = $db->prepare($query);
    $statement->execute();
    $user = $statement->fetchAll();
    $statement->closeCursor();
    return $user;
}

function verifyEmail($string){
    global $db;
    $query = 'UPDATE users
                SET verified = 1
            WHERE string = :string';
    $statement = $db->prepare($query);
    $statement->bindValue(":string", $string);
    $statement->execute();
    $statement->closeCursor();
}
    
//function getCustForRMAView($ticket) {
//    global $db;
//    $query = 'SELECT c.name AS cname, d.name AS dname
//                FROM rma r
//                INNER JOIN customers c ON cid
//                INNER JOIN distributors d ON r.did
//                WHERE cid = c.id
//                AND r.did = d.id
//                AND ticket = :ticket';
//    $statement = $db->prepare($query);
//    $statement->bindValue(":ticket", $ticket);
//    $statement->execute();
//    $execute = $statement->fetchAll();
//    $statement->closeCursor();
//    return $execute;
//}
//
//function getCustForPSRView($ticket) {
//    global $db;
//    $query = 'SELECT c.name AS cname, d.name AS dname
//                FROM psr p
//                INNER JOIN customers c ON cid
//                INNER JOIN distributors d ON p.did
//                WHERE cid = c.id
//                AND p.did = d.id
//                AND ticket = :ticket';
//    $statement = $db->prepare($query);
//    $statement->bindValue(":ticket", $ticket);
//    $statement->execute();
//    $execute = $statement->fetchAll();
//    $statement->closeCursor();
//    return $execute;
//}
//
//function getCustForROLAView($ticket) {
//    global $db;
//    $query = 'SELECT c.name AS cname, d.name AS dname
//                FROM rola r
//                INNER JOIN customers c ON cid
//                INNER JOIN distributors d ON r.did
//                WHERE cid = c.id
//                AND r.did = d.id
//                AND ticket = :ticket';
//    $statement = $db->prepare($query);
//    $statement->bindValue(":ticket", $ticket);
//    $statement->execute();
//    $execute = $statement->fetchAll();
//    $statement->closeCursor();
//    return $execute;
//}
//
//function getLabels() {
//    global $db;
//    $query = 'SELECT id,name FROM companies
//                ORDER BY name ASC';
//    $statement = $db->prepare($query);
//    $statement->execute();
//    $execute = $statement->fetchAll();
//    $statement->closeCursor();
//    return $execute;
//}
//
//function getLabel($cid) {
//    global $db;
//    $query = 'SELECT * FROM companies
//                WHERE id = :cid';
//    $statement = $db->prepare($query);
//    $statement->bindValue(":cid", $cid);
//    $statement->execute();
//    $execute = $statement->fetchAll();
//    $statement->closeCursor();
//    return $execute;
//}
//
//function getRMA($ticket) {
//    global $db;
//    $query = 'SELECT * FROM rma 
//                WHERE ticket = :ticket';
//    $statement = $db->prepare($query);
//    $statement->bindValue(":ticket", $ticket);
//    $statement->execute();
//    $execute = $statement->fetchAll();
//    $statement->closeCursor();
//    return $execute;
//}
//
//function getPSR($ticket) {
//    global $db;
//    $query = 'SELECT * FROM psr
//                WHERE ticket = :ticket';
//    $statement = $db->prepare($query);
//    $statement->bindValue(":ticket", $ticket);
//    $statement->execute();
//    $execute = $statement->fetchAll();
//    $statement->closeCursor();
//    return $execute;
//}
//
//function getROLA($ticket) {
//    global $db;
//    $query = 'SELECT *
//                FROM rola
//                WHERE ticket = :ticket';
//    $statement = $db->prepare($query);
//    $statement->bindValue(":ticket", $ticket);
//    $statement->execute();
//    $execute = $statement->fetchAll();
//    $statement->closeCursor();
//    return $execute;
//}
//
//function getRMAbyId($id) {
//    global $db;
//    $query = 'SELECT * FROM rma
//                WHERE id = :id';
//    $statement = $db->prepare($query);
//    $statement->bindValue(":id", $id);
//    $statement->execute();
//    $execute = $statement->fetchAll();
//    $statement->closeCursor();
//    return $execute;
//}
//
//function getPSRbyId($id) {
//    global $db;
//    $query = 'SELECT * FROM psr
//                WHERE id = :id';
//    $statement = $db->prepare($query);
//    $statement->bindValue(":id", $id);
//    $statement->execute();
//    $execute = $statement->fetchAll();
//    $statement->closeCursor();
//    return $execute;
//}
//
//function getROLAbyId($id) {
//    global $db;
//    $query = 'SELECT * FROM rola
//                WHERE id = :id';
//    $statement = $db->prepare($query);
//    $statement->bindValue(":id", $id);
//    $statement->execute();
//    $execute = $statement->fetchAll();
//    $statement->closeCursor();
//    return $execute;
//}
//
//function getRMAs() {
//    global $db;
//    $query = 'SELECT ticket, issuedby, idate, c.name
//                FROM rma r
//                INNER JOIN customers c ON cid
//                WHERE cid = c.id
//                ORDER BY idate DESC ';
//    $statement = $db->prepare($query);
//    $statement->execute();
//    $execute = $statement->fetchAll();
//    $statement->closeCursor();
//    return $execute;
//}
//
//function getPSRs() {
//    global $db;
//    $query = 'SELECT ticket, issuedby, idate, c.name
//                FROM psr p
//                INNER JOIN customers c ON cid
//                WHERE cid = c.id
//                ORDER BY idate DESC ';
//    $statement = $db->prepare($query);
//    $statement->execute();
//    $execute = $statement->fetchAll();
//    $statement->closeCursor();
//    return $execute;
//}
//
//function getROLAs() {
//    global $db;
//    $query = 'SELECT ticket, issuedby, idate, c.name
//                FROM rola r
//                INNER JOIN customers c ON cid
//                WHERE cid = c.id
//                ORDER BY idate DESC ';
//    $statement = $db->prepare($query);
//    $statement->execute();
//    $execute = $statement->fetchAll();
//    $statement->closeCursor();
//    return $execute;
//}
//
//function getRMAbyUser($user) {
//    global $db;
//    $query = 'SELECT r.ticket, r.issuedby, r.idate, c.name
//                FROM rma r
//                INNER JOIN customers c
//                ON r.cid
//                WHERE r.cid = c.id AND r.did = c.did
//                AND r.issuedby = :issuedby
//                ORDER BY r.idate DESC';
//    $statement = $db->prepare($query);
//    $statement->bindValue(":issuedby", $user);
//    $statement->execute();
//    $execute = $statement->fetchAll();
//    $statement->closeCursor();
//    return $execute;
//}
//
//function getPSRbyUser($user) {
//    global $db;
//    $query = 'SELECT p.ticket, p.issuedby, p.idate, c.name
//                FROM psr p
//                INNER JOIN customers c
//                ON p.cid
//                WHERE p.cid = c.id AND p.did = c.did
//                AND p.issuedby = :issuedby
//                ORDER BY p.idate DESC';
//    $statement = $db->prepare($query);
//    $statement->bindValue(":issuedby", $user);
//    $statement->execute();
//    $execute = $statement->fetchAll();
//    $statement->closeCursor();
//    return $execute;
//}
//
//function getROLAbyUser($user) {
//    global $db;
//    $query = 'SELECT r.ticket, r.issuedby, r.idate, c.name
//                FROM rola r
//                INNER JOIN customers c
//                ON r.cid
//                WHERE r.cid = c.id AND r.did = c.did
//                AND r.issuedby = :issuedby
//                ORDER BY r.idate DESC';
//    $statement = $db->prepare($query);
//    $statement->bindValue(":issuedby", $user);
//    $statement->execute();
//    $execute = $statement->fetchAll();
//    $statement->closeCursor();
//    return $execute;
//}
//
//function getAllCusts() {
//    global $db;
//    $query = 'SELECT c.id AS cid,did,c.name AS cname,d.name AS dname
//                FROM customers c
//                INNER JOIN distributors d
//                ON did
//                WHERE did = d.id
//                ORDER BY d.name ASC, c.name ASC';
//    $statement = $db->prepare($query);
//    $statement->execute();
//    $execute = $statement->fetchAll();
//    $statement->closeCursor();
//    return $execute;
//}
//
//function getAllCustsByDid($did) {
//    global $db;
//    $query = 'SELECT c.id AS cid,did,c.name AS cname,d.name AS dname
//                FROM customers c
//                INNER JOIN distributors d
//                ON did
//                WHERE did = d.id
//                AND did = :did
//                ORDER BY c.name ASC';
//    $statement = $db->prepare($query);
//    $statement->bindValue(":did", $did);
//    $statement->execute();
//    $execute = $statement->fetchAll();
//    $statement->closeCursor();
//    return $execute;
//}
//
//function getCusts($did) {
//    global $db;
//    $query = 'SELECT * FROM customers
//                WHERE did = :did
//                ORDER BY name ASC';
//    $statement = $db->prepare($query);
//    $statement->bindValue(":did", $did);
//    $statement->execute();
//    $execute = $statement->fetchAll();
//    $statement->closeCursor();
//    return $execute;
//}
//
//function getCustInfo($id) {
//    global $db;
//    $query = 'SELECT * FROM customers
//                WHERE id = :id
//                ORDER BY name ASC';
//    $statement = $db->prepare($query);
//    $statement->bindValue(":id", $id);
//    $statement->execute();
//    $execute = $statement->fetchAll();
//    $statement->closeCursor();
//    return $execute;
//}
//
//function checkUpdateEmail($email,$user_id) {
//    global $db;
//    $query = 'SELECT email FROM users
//              WHERE email = :email AND user_id != :user_id';
//    $statement = $db->prepare($query);
//    $statement->bindValue(":email", $email);
//    $statement->bindValue(":user_id", $user_id);
//    $statement->execute();
//    $count = $statement->rowCount();
//    $statement->closeCursor();
//    return $count;
//}
//
//function getEmail($email) {
//    global $db;
//    $query = 'SELECT email FROM users
//              WHERE email = :email';
//    $statement = $db->prepare($query);
//    $statement->bindValue(":email", $email);
//    $statement->execute();
//    $count = $statement->rowCount();
//    $statement->closeCursor();
//    return $count;
//}
//
//function getEmailAdd($user_id) {
//    global $db;
//    $query = 'SELECT email FROM users
//              WHERE userId = :user_id';
//    $statement = $db->prepare($query);
//    $statement->bindValue(":user_id", $user_id);
//    $statement->execute();
//    $add = $statement->fetch();
//    $statement->closeCursor();
//    return $add;
//}
//
//function registerDist($name) {
//    global $db;
//    $query = 'INSERT INTO distributors(name)'
//            . 'VALUES(:name)';
//    $statement = $db->prepare($query);
//    $statement->bindValue(":name",$name);
//    $statement->execute();
//    $statement->closeCursor();
//               
//}
//
//function registerCust($name,$did,$address,$city,$state,$zip,$phone,$email,$contact) {
//    global $db;
//    $query = 'INSERT INTO customers(name,did,address,city,state,zip,phone,email,contact)'
//            . 'VALUES(:name,:did,:address,:city,:state,:zip,:phone,:email,:contact)';
//    $statement = $db->prepare($query);
//    $statement->bindValue(":name",$name);
//    $statement->bindValue(":did",$did);
//    $statement->bindValue(":address",$address);
//    $statement->bindValue(":city",$city);
//    $statement->bindValue(":state",$state);
//    $statement->bindValue(":zip",$zip);
//    $statement->bindValue(":phone",$phone);
//    $statement->bindValue(":email",$email);
//    $statement->bindValue(":contact",$contact);
//    $statement->execute();
//    $statement->closeCursor();
//}
//
//function submitRMA($ticket,$issuedby,$winfo,$idate,$cid,$did,$phone,$email,$address,$city,$state,$zip,$cuattroreturn,$custreturn,$cuattroreturnbill,$custreturnbill,$reason,$pnumber1,$pnumber2,$pnumber3,$pnumber4,$pnumber5,$snumber1,$snumber2,$snumber3,$snumber4,$snumber5,$pdescr1,$pdescr2,$pdescr3,$pdescr4,$pdescr5,$action1,$action2,$action3,$action4,$action5,$billable1,$billable2,$billable3,$billable4,$billable5) {
// 
//    global $db;
//    $query = "INSERT INTO rma (ticket, issuedby, winfo, idate, did, cid, phone, email, address, city, state, zip, cuattroreturn, custreturn, cuattroreturnbill, custreturnbill, reason, pnumber1, pnumber2, pnumber3, pnumber4, pnumber5, snumber1, snumber2, snumber3, snumber4, snumber5, pdescr1, pdescr2, pdescr3, pdescr4, pdescr5, action1, action2, action3, action4, action5, billable1, billable2, billable3, billable4, billable5) VALUES (:ticket,:issuedby,:winfo,:idate,:did,:cid,:phone,:email,:address,:city,:state,:zip,:cuattroreturn,:custreturn,:cuattroreturnbill,:custreturnbill,:reason,:pnumber1,:pnumber2,:pnumber3,:pnumber4,:pnumber5,:snumber1,:snumber2,:snumber3,:snumber4,:snumber5,:pdescr1,:pdescr2,:pdescr3,:pdescr4,:pdescr5,:action1,:action2,:action3,:action4,:action5,:billable1,:billable2,:billable3,:billable4,:billable5);";
//    $statement = $db->prepare($query);
//    $statement->bindValue(":ticket",$ticket);
//    $statement->bindValue(":issuedby",$issuedby);
//    $statement->bindValue(":winfo",$winfo);
//    $statement->bindValue(":idate",$idate);
//    $statement->bindValue(":did",$did);
//    $statement->bindValue(":cid",$cid);
//    $statement->bindValue(":phone",$phone);
//    $statement->bindValue(":email",$email);
//    $statement->bindValue(":address",$address);
//    $statement->bindValue(":city",$city);
//    $statement->bindValue(":state",$state);
//    $statement->bindValue(":zip",$zip);
//    $statement->bindValue(":cuattroreturn",$cuattroreturn);
//    $statement->bindValue(":custreturn",$custreturn);
//    $statement->bindValue(":cuattroreturnbill",$cuattroreturnbill);
//    $statement->bindValue(":custreturnbill",$custreturnbill);
//    $statement->bindValue(":reason",$reason);
//    $statement->bindValue(":pnumber1",$pnumber1);
//    $statement->bindValue(":pnumber2",$pnumber2);
//    $statement->bindValue(":pnumber3",$pnumber3);
//    $statement->bindValue(":pnumber4",$pnumber4);
//    $statement->bindValue(":pnumber5",$pnumber5);
//    $statement->bindValue(":snumber1",$snumber1);
//    $statement->bindValue(":snumber2",$snumber2);
//    $statement->bindValue(":snumber3",$snumber3);
//    $statement->bindValue(":snumber4",$snumber4);
//    $statement->bindValue(":snumber5",$snumber5);
//    $statement->bindValue(":pdescr1",$pdescr1);
//    $statement->bindValue(":pdescr2",$pdescr2);
//    $statement->bindValue(":pdescr3",$pdescr3);
//    $statement->bindValue(":pdescr4",$pdescr4);
//    $statement->bindValue(":pdescr5",$pdescr5);
//    $statement->bindValue(":action1",$action1);
//    $statement->bindValue(":action2",$action2);
//    $statement->bindValue(":action3",$action3);
//    $statement->bindValue(":action4",$action4);
//    $statement->bindValue(":action5",$action5);
//    $statement->bindValue(":billable1",$billable1);
//    $statement->bindValue(":billable2",$billable2);
//    $statement->bindValue(":billable3",$billable3);
//    $statement->bindValue(":billable4",$billable4);
//    $statement->bindValue(":billable5",$billable5);
//    $statement->execute();
//    $statement->closeCursor();
//}
//
//function submitPSR($ticket,$issuedby,$winfo,$idate,$cid,$did,$phone,$email,$address,$city,$state,$zip,$cuattroreturn,$custreturn,$cuattroreturnbill,$custreturnbill,$reason,$pnumber1,$pnumber2,$pnumber3,$pnumber4,$pnumber5,$pdescr1,$pdescr2,$pdescr3,$pdescr4,$pdescr5,$action1,$action2,$action3,$action4,$action5,$billable1,$billable2,$billable3,$billable4,$billable5) {
// 
//    global $db;
//    $query = "INSERT INTO psr (ticket, issuedby, winfo, idate, did, cid, phone, email, address, city, state, zip, cuattroreturn, custreturn, cuattroreturnbill, custreturnbill, reason, pnumber1, pnumber2, pnumber3, pnumber4, pnumber5, pdescr1, pdescr2, pdescr3, pdescr4, pdescr5, action1, action2, action3, action4, action5, billable1, billable2, billable3, billable4, billable5) VALUES (:ticket,:issuedby,:winfo,:idate,:did,:cid,:phone,:email,:address,:city,:state,:zip,:cuattroreturn,:custreturn,:cuattroreturnbill,:custreturnbill,:reason,:pnumber1,:pnumber2,:pnumber3,:pnumber4,:pnumber5,:pdescr1,:pdescr2,:pdescr3,:pdescr4,:pdescr5,:action1,:action2,:action3,:action4,:action5,:billable1,:billable2,:billable3,:billable4,:billable5);";
//    $statement = $db->prepare($query);
//    $statement->bindValue(":ticket",$ticket);
//    $statement->bindValue(":issuedby",$issuedby);
//    $statement->bindValue(":winfo",$winfo);
//    $statement->bindValue(":idate",$idate);
//    $statement->bindValue(":did",$did);
//    $statement->bindValue(":cid",$cid);
//    $statement->bindValue(":phone",$phone);
//    $statement->bindValue(":email",$email);
//    $statement->bindValue(":address",$address);
//    $statement->bindValue(":city",$city);
//    $statement->bindValue(":state",$state);
//    $statement->bindValue(":zip",$zip);
//    $statement->bindValue(":cuattroreturn",$cuattroreturn);
//    $statement->bindValue(":custreturn",$custreturn);
//    $statement->bindValue(":cuattroreturnbill",$cuattroreturnbill);
//    $statement->bindValue(":custreturnbill",$custreturnbill);
//    $statement->bindValue(":reason",$reason);
//    $statement->bindValue(":pnumber1",$pnumber1);
//    $statement->bindValue(":pnumber2",$pnumber2);
//    $statement->bindValue(":pnumber3",$pnumber3);
//    $statement->bindValue(":pnumber4",$pnumber4);
//    $statement->bindValue(":pnumber5",$pnumber5);
//    $statement->bindValue(":pdescr1",$pdescr1);
//    $statement->bindValue(":pdescr2",$pdescr2);
//    $statement->bindValue(":pdescr3",$pdescr3);
//    $statement->bindValue(":pdescr4",$pdescr4);
//    $statement->bindValue(":pdescr5",$pdescr5);
//    $statement->bindValue(":action1",$action1);
//    $statement->bindValue(":action2",$action2);
//    $statement->bindValue(":action3",$action3);
//    $statement->bindValue(":action4",$action4);
//    $statement->bindValue(":action5",$action5);
//    $statement->bindValue(":billable1",$billable1);
//    $statement->bindValue(":billable2",$billable2);
//    $statement->bindValue(":billable3",$billable3);
//    $statement->bindValue(":billable4",$billable4);
//    $statement->bindValue(":billable5",$billable5);
//    $statement->execute();
//    $statement->closeCursor();
//}
//
//function submitROLA($ticket,$issuedby,$winfo,$idate,$cid,$did,$phone,$email,$address,$city,$state,$zip,$cuattroreturn,$custreturn,$cuattroreturnbill,$custreturnbill,$reason,$pnumber1,$pnumber2,$pnumber3,$pnumber4,$pnumber5,$pdescr1,$pdescr2,$pdescr3,$pdescr4,$pdescr5,$action1,$action2,$action3,$action4,$action5,$billable1,$billable2,$billable3,$billable4,$billable5) {
// 
//    global $db;
//    $query = "INSERT INTO rola (ticket, issuedby, winfo, idate, did, cid, phone, email, address, city, state, zip, cuattroreturn, custreturn, cuattroreturnbill, custreturnbill, reason, pnumber1, pnumber2, pnumber3, pnumber4, pnumber5, pdescr1, pdescr2, pdescr3, pdescr4, pdescr5, action1, action2, action3, action4, action5, billable1, billable2, billable3, billable4, billable5) VALUES (:ticket,:issuedby,:winfo,:idate,:did,:cid,:phone,:email,:address,:city,:state,:zip,:cuattroreturn,:custreturn,:cuattroreturnbill,:custreturnbill,:reason,:pnumber1,:pnumber2,:pnumber3,:pnumber4,:pnumber5,:pdescr1,:pdescr2,:pdescr3,:pdescr4,:pdescr5,:action1,:action2,:action3,:action4,:action5,:billable1,:billable2,:billable3,:billable4,:billable5);";
//    $statement = $db->prepare($query);
//    $statement->bindValue(":ticket",$ticket);
//    $statement->bindValue(":issuedby",$issuedby);
//    $statement->bindValue(":winfo",$winfo);
//    $statement->bindValue(":idate",$idate);
//    $statement->bindValue(":did",$did);
//    $statement->bindValue(":cid",$cid);
//    $statement->bindValue(":phone",$phone);
//    $statement->bindValue(":email",$email);
//    $statement->bindValue(":address",$address);
//    $statement->bindValue(":city",$city);
//    $statement->bindValue(":state",$state);
//    $statement->bindValue(":zip",$zip);
//    $statement->bindValue(":cuattroreturn",$cuattroreturn);
//    $statement->bindValue(":custreturn",$custreturn);
//    $statement->bindValue(":cuattroreturnbill",$cuattroreturnbill);
//    $statement->bindValue(":custreturnbill",$custreturnbill);
//    $statement->bindValue(":reason",$reason);
//    $statement->bindValue(":pnumber1",$pnumber1);
//    $statement->bindValue(":pnumber2",$pnumber2);
//    $statement->bindValue(":pnumber3",$pnumber3);
//    $statement->bindValue(":pnumber4",$pnumber4);
//    $statement->bindValue(":pnumber5",$pnumber5);
//    $statement->bindValue(":pdescr1",$pdescr1);
//    $statement->bindValue(":pdescr2",$pdescr2);
//    $statement->bindValue(":pdescr3",$pdescr3);
//    $statement->bindValue(":pdescr4",$pdescr4);
//    $statement->bindValue(":pdescr5",$pdescr5);
//    $statement->bindValue(":action1",$action1);
//    $statement->bindValue(":action2",$action2);
//    $statement->bindValue(":action3",$action3);
//    $statement->bindValue(":action4",$action4);
//    $statement->bindValue(":action5",$action5);
//    $statement->bindValue(":billable1",$billable1);
//    $statement->bindValue(":billable2",$billable2);
//    $statement->bindValue(":billable3",$billable3);
//    $statement->bindValue(":billable4",$billable4);
//    $statement->bindValue(":billable5",$billable5);
//    $statement->execute();
//    $statement->closeCursor();
//}

?>