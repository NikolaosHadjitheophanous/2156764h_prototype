<?php
	session_start();
	$correct_ans=$_SESSION['correct_answer']; 
	$username=$_SESSION['username'];
	
	$answer=$_POST['sans1'];
        $_SESSION['user_answer'] = $answer;
	require_once("database.php"); // Connects to the db.
	
        //------ Check if the decoy for the specific user was created ------------
        $decoy=0;
        $type=$_SESSION['type'];

	$query = mysql_query("SELECT * FROM `decoy` where `username`='$username' AND `type` = '$type' ");
	$count = mysql_num_rows($query);
	if($count>=16){$decoy=1;}
	else { $decoy=0;}
	
	$_SESSION['decoy']=$decoy; //Sets decoy image value.	
        //-----------------------------------------------------------------------	
	
        $char1=$_POST['char1'];   $_SESSION['inputA']=$char1;
        $char2=$_POST['char2'];   $_SESSION['inputB']=$char2;
        $char3=$_POST['char3'];   $_SESSION['inputC']=$char3;



	echo "1";
 
 
	
?>