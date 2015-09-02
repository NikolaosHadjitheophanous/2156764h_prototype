<?php
    // Updates users credetials with image password.
    session_start();
    $endtime= date("Y-m-d H:i:s");

    $id=$_POST['id'];
    $type=$_SESSION['type'];
    $username=$_SESSION['username'];
     
     $start=$_SESSION['start'];     
     $_SESSION['$id']=$id;
    require_once("database.php");
     
    $result =mysql_query("UPDATE credentials SET picno = '$id' WHERE username = '$username' AND type = '$type' "); 
    // Inserts time taken to register.
    $query = mysql_query("INSERT INTO `Rlog` (`username`,`type`, `start`, `end`) VALUES ('$username', '$type', '$start', '$endtime')"); 
 
        echo "1";
?>