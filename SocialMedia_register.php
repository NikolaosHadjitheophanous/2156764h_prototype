<?php
	
	//check we have username post var
	if(isset($_POST["username"]))
	{
		session_start();
		
		//check if its ajax request, exit script if its not
		if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
			die();
		}
		require_once("database.php");  
		
		//Read the inputs from the user
		$username =  trim($_POST["username"]);
		$memorable= trim($_POST["memorable"]);   $memorable_length= strlen($memorable);
		$email=trim($_POST["email"]);
		$ncq1=0;            $ncq2=0;
		$answer1="none";	$answer2="none";
		
		 
		 $type=$_SESSION['type'];
		 $_SESSION['username']=$username;
		 
		//sanitize user inputs
		$username = filter_var($username, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);	
		$memorable= filter_var($memorable, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH); 	
		$email= filter_var($email, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
			
		
		//-------------------------------------------------------------------------------
		
		
		$query = mysql_query("SELECT `picno` FROM `credentials` WHERE `username` = '$username' AND `type` = '$type' ");	
		
		//$query = mysql_query("SELECT `email` FROM `login` WHERE `username` = '$username'");
		if (!$query ) {   die('Invalid query: ' . mysql_error());   }
		
		
		if(mysql_num_rows($query) == 1) { 
			echo $username; //User already exist!
			}else {
			
			
			$query = mysql_query("INSERT INTO `login` (`username` ,`email`, `type` ) VALUES ( '$username', '$email', '$type' )");
				
			//Insertion of challenge questions with username.
			$query = mysql_query("INSERT INTO `credentials` (`q1`,`a1`, `q2`,`a2`,`word`,`word_size`, `username`, `type`) VALUES ('$ncq1', '$answer1', '$nsq2', '$answer2', '$memorable', '$memorable_length' ,'$username', '$type' )"); 
					
			// calls category page to generated categories. 	
			require_once("category.php");
			// calls images to generate images.
			require_once("image.php");
			echo "1";
		
		}
		
	}
	
?>
