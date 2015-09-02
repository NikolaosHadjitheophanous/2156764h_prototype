<?php
	// Checks if challenge question answer and image are similar to those in the database. 
	session_start();
	$start=$_SESSION['start'];
	$endtime = date("Y-m-d H:i:s");
	
	
       

	$picno=$_SESSION['picno']; 
	$selectedImage=$_POST['id'];
       
	
	$username=$_SESSION['username'];
	$type=$_SESSION['type'];
	
	
	
	require_once("database.php"); // Connects to the db.
	require_once("session.php"); // connects to session page
	$sessionid=$_SESSION['Sessionid'];
	$counts=$_SESSION['count'];


        $output="1";
 
        $ques=$_SESSION['questions'];

        //------  They calculated at BankAccount_loginDecoy.php ------
	$mem_char1 =  $_SESSION['boolean_mem1'];
	$mem_char2 =  $_SESSION['boolean_mem2'];
	$mem_char3 =  $_SESSION['boolean_mem3'];
	if ( ($mem_char1=="false") || ($mem_char2=="false") || ($mem_char3=="false") || ($ques=="false")){
             $output="-1";
        }
         
	$pic="true";	
	if($selectedImage!=$picno ){
		$pic="false";
		$output="-1";
	}
	
	
	
	$query = mysql_query("INSERT INTO `Llog` (`session id`, `start`, `end`, `trialno`, `picture` ,`question`, `username`, `mem_char1`, `mem_char2`, `mem_char3`, `type` ) VALUES ('$sessionid', '$start', '$endtime', '$counts', '$pic', '$ques', '$username', '$mem_char1', '$mem_char2', '$mem_char3', $type)");
	
	
	echo $output;
	
	
	
	
	
?>