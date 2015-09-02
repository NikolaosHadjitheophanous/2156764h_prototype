<?php
	// The purpose of this file is to Check if decoy images were created properly (when user login for the very first time).       
	session_start();
        $type=$_SESSION['type'];

	$ans1 = $_POST['sans1'];
        $ans2 = $_POST['sans2'];
	
        $answer1=$_SESSION['corr_answer1'];
	$answer2=$_SESSION['corr_answer2'];

        $_SESSION['questions']= "true";
	if($answer1!=$ans1 || $answer2!=$ans2){
		$_SESSION['questions'] ="false";	
	}

        $username=$_POST['username'];
        $char1=$_POST['char1'];   
	   $pos1=$_SESSION['pos1']; 
	$char2=$_POST['char2'];   
	   $pos2=$_SESSION['pos2']; 
	$char3=$_POST['char3'];
          $pos3=$_SESSION['pos3'];  

        require_once("database.php"); // require the db connection
        $memorable =mysql_result( mysql_query("SELECT `word` FROM `credentials` WHERE `username` = '$username' AND `type` = '$type' "),0);

        $mem_char1 = "true";
	$mem_char2 = "true";
	$mem_char3 = "true";
	if ( !(strcmp($memorable[$pos1],$char1)  == 0)) {$mem_char1 = "false";  }
	
	if ( !(strcmp($memorable[$pos2],$char2)  == 0)) {$mem_char2 = "false"; }
	
	if ( !(strcmp($memorable[$pos3],$char3)  == 0)) {$mem_char3 = "false"; }

        $_SESSION['boolean_mem1']=$mem_char1;
        $_SESSION['boolean_mem2']=$mem_char2;
        $_SESSION['boolean_mem3']=$mem_char3;



	$decoy=0;
	
	$query2 = mysql_query("SELECT * FROM `decoy` where `username`='$username' AND `type` = '$type'");
	$count = mysql_num_rows($query2);
	if($count>=16){$decoy=1;}
	else { $decoy=0;}
	
	$_SESSION['decoy']=$decoy; //Sets decoy image value.	
	echo "1";
?>