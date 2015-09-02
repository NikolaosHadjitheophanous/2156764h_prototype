<?php
	session_start();
        $type=$_SESSION['type'];
	$correct_ans=$_SESSION['correct_answer']; 
	$username=$_SESSION['username'];
	

	$start=$_SESSION['start'];
	$endtime = date("Y-m-d H:i:s");

	$answer=$_POST['sans1'];
	require_once("database.php"); // Connects to the db.
	require_once("session.php"); // connects to session page
	
	
	
               //The user gave correct memorable word characters
		$counts=$_SESSION['count'];    
               
		$session=$_SESSION['Sessionid'];
		//Checks if challenge question answer and image are similar to those in the database. 
	
                $output_echo="1"; //usern answer correct

                $mem_char1="none";
                $mem_char2="none";
                $mem_char3="none";
                $pic="none"; 	
 


                $ques="true";
		if (! ( $answer==$correct_ans) ){
			$ques="false";  
			$output_echo="-1";
                				
		}
		

                // Inserts login details
		$query = mysql_query("INSERT INTO `Llog` (`session id`, `start`, `end`, `trialno`, `picture` ,`question`, `username`, `mem_char1`, `mem_char2`, `mem_char3`, `type`) VALUES ('$session', '$start', '$endtime', '$counts', '$pic', '$ques', '$username', '$mem_char1', '$mem_char2', '$mem_char3', '$type')");

	echo $output_echo;

	
?>