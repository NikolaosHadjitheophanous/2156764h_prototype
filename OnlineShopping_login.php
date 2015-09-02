<?php
	session_start();

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
	
              
        
	echo "1";

	
?>