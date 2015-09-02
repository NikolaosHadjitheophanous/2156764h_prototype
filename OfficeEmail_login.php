<?php
	session_start();
	$correct_ans=$_SESSION['correct_answer']; 
	$username=$_SESSION['username'];
	

	$start=$_SESSION['start'];
	$endtime = date("Y-m-d H:i:s");

	$answer=$_POST['sans1'];
	require_once("database.php"); // Connects to the db.
	require_once("session.php"); // connects to session page
	
	
	
               //The user gave correct memorable word characters
              //  $counts=0;
		$counts=$_SESSION['count'];    
               


                // $session=0;
		$session=$_SESSION['Sessionid'];
		//Checks if challenge question answer and image are similar to those in the database. 
	
              
                $pic="none";

  $type=$_SESSION['type'];

        $char1=$_POST['char1'];   $pos1=$_SESSION['pos1']; 
	$char2=$_POST['char2'];   $pos2=$_SESSION['pos2']; 
	$char3=$_POST['char3'];   $pos3=$_SESSION['pos3']; 
               
        $memorable =mysql_result( mysql_query("SELECT `word` FROM `credentials` WHERE `username` = '$username' AND `type` = '$type' "),0);
 $output_echo="1"; 
$memorable_word="true";
$mem_char1 = $mem_char2 = $mem_char3 = "true";
if ( !(strcmp($memorable[$pos1],$char1)  == 0)) {$mem_char1 = "false"; $output_echo="-1"; }

if ( !(strcmp($memorable[$pos2],$char2)  == 0)) {$mem_char2 = "false"; $output_echo="-1";}

if ( !(strcmp($memorable[$pos3],$char3)  == 0)) {$mem_char3 = "false"; $output_echo="-1"; }
             


                // Check the answer of the Question 
                $ques="true";
		if (  $answer!=$correct_ans ){
			$ques="false";    $output_echo="-1";				
		}


               
                // Inserts login details
		$query = mysql_query("INSERT INTO `Llog` (`session id`, `start`, `end`, `trialno`, `picture` ,`question`, `username`, `mem_char1`, `mem_char2`, `mem_char3` , `type`) VALUES ('$session', '$start', '$endtime', '$counts', '$pic', '$ques', '$username', '$mem_char1', '$mem_char2', '$mem_char3', '$type' )");

	echo $output_echo;

	
?>