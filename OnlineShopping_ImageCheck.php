<?php
	// Checks if challenge question answer and image are similar to those in the database. 
	session_start();
        $start=$_SESSION['start'];
	$endtime = date("Y-m-d H:i:s");
		
	$picno=$_SESSION['picno']; // picno from db
	$user_answer=$_SESSION['user_answer'];
	$selectedImage=$_POST['id']; // id of picture clicked
	
	$username=$_SESSION['username'];
	$type=$_SESSION['type'];
	
	
	
	require_once("database.php"); // Connects to the db.
	require_once("session.php"); // connects to session page
	
        $trialID=$_SESSION['count'];   
	$sessionid=$_SESSION['Sessionid'];


              
 
$mem_char1 = "none";
$mem_char2 = "none";
$mem_char3 = "none"; 
             

                $correct_ans=$_SESSION['correct_answer']; 
                // Check the answer of the Question 
                $output="1";
                $ques= $pic = "true";                
		if ( $user_answer!=$correct_ans  ){
			$ques="false";  
                         $output="-1";				
		}
                if ( $selectedImage!=$picno ) {
                    $pic="false";
                     $output="-1";
                }
        

                
                // Inserts login details
		$query = mysql_query("INSERT INTO `Llog` (`session id`, `start`, `end`, `trialno`, `picture` ,`question`, `username`, `mem_char1`, `mem_char2`, `mem_char3` , `type`) VALUES ('$sessionid', '$start', '$endtime', '$trialID', '$pic', '$ques', '$username', '$mem_char1', '$mem_char2', '$mem_char3', '$type' )");
	
       echo $output;
	
?>