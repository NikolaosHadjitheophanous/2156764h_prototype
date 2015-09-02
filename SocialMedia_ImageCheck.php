<?php
	session_start();
        $start=$_SESSION['start'];
	$endtime = date("Y-m-d H:i:s");
        
        $selectedImage=$_POST['id'];
        $answer="none";
        $ques="none";
	$username=$_SESSION['username'];
        $picno=$_SESSION['picno'];   // Got from SocialSave.php
        $type=$_SESSION['type'];
           
       


	require_once("database.php"); // Connects to the db.
	require_once("session.php"); // connects to session page
	 $session=$_SESSION['Sessionid'];
          $trialID=$_SESSION['count'];
        $char1=$_SESSION['inputA'];   $pos1=$_SESSION['pos1']; 
	$char2=$_SESSION['inputB'];   $pos2=$_SESSION['pos2']; 
	$char3=$_SESSION['inputC'];   $pos3=$_SESSION['pos3']; 

        $memorable =mysql_result( mysql_query("SELECT `word` FROM `credentials` WHERE `username` = '$username' AND `type` = '$type' LIMIT 1"),0);

$memorable_word=true;
$mem_char1 = $mem_char2 = $mem_char3 = "true";
if ( !(strcmp($memorable[$pos1],$char1)  == 0)) {$mem_char1 = "false"; $memorable_word=false; }

if ( !(strcmp($memorable[$pos2],$char2)  == 0)) {$mem_char2 = "false"; $memorable_word=false;}

if ( !(strcmp($memorable[$pos3],$char3)  == 0)) {$mem_char3 = "false"; $memorable_word=false; }

$output="1";       
$pic="true";      
if ($selectedImage!=$picno ){
   $pic="false";
   $output="-1";
}
if ($memorable_word==false ){ $output="-1";}

                        
                // Inserts login details
		$query = mysql_query("INSERT INTO `Llog` (`session id`, `start`, `end`, `trialno`, `picture` ,`question`, `username`, `mem_char1`, `mem_char2`, `mem_char3` , `type`) VALUES ('$session', '$start', '$endtime', '$trialID', '$pic', '$ques', '$username', '$mem_char1', '$mem_char2', '$mem_char3', '$type' )");


	  echo $output;

	
?>