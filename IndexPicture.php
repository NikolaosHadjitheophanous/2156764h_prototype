<?php
	// The purpose of this file is to Check if decoy images were created properly (when user login for the very first time).
        
	session_start();
	$ans = $_POST['sans1'];
	$_SESSION['ans']=$ans; // answer type
	$username=$_POST['username'];
        $char1=$_POST['char1'];   $_SESSION['char1']=$char1;          
        $char2=$_POST['char2'];   $_SESSION['char2']=$char2;             
        $char3=$_POST['char3'];   $_SESSION['char3']=$char3;
             
	$type=$_SESSION['type'];
	$decoy=0;
	require_once("database.php"); // require the db connection
	$query2 = mysql_query("SELECT * FROM `decoy` where `username`='$username' AND `type` = '$type' ");
	$count = mysql_num_rows($query2);
	if($count>=16){$decoy=1;}
	else { $decoy=0;}
	
	$_SESSION['decoy']=$decoy; //Sets decoy image value.	
	echo "1";
?>