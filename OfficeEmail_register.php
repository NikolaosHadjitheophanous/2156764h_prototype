<?php
	
	//check we have username post var
	if(isset($_POST["username"]))
	{
		

		//check if its ajax request, exit script if its not
		if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
			die();
		}

                session_start();
		$endtime= date("Y-m-d H:i:s");
                $start=$_SESSION['start'];

		require_once("database.php");  
		$username =  trim($_POST["username"]); 
		$memorable= trim($_POST["memorable"]);

		$answer1 =  trim($_POST["answer1"]); 
		$answer2 =  trim($_POST["answer2"]); 
                $inputQuest1 =  trim($_POST["question1"]); 
		$inputQuest2 =  trim($_POST["question2"]); 


		
		$email=trim($_POST["email"]);
		$pic=0;
		
		//Retrieve SESSION Vars in order to perform queries to database
		$type=$_SESSION['type'];
		$_SESSION['username']=$username;
		
		//sanitize username
		$username = filter_var($username, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);		
		$memorable= filter_var($memorable, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH); 	 
		$answer1= filter_var($answer1, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);	 
		$answer2= filter_var($answer2, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
                $inputQuest1 =  filter_var($inputQuest1, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
		$inputQuest2 =  filter_var($inputQuest2, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
		$email= filter_var($email, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
		
		//-------------------------------------------------------------------------------
		
		
		$query = mysql_query("SELECT `email` FROM `login` WHERE `username` = '$username' AND `type` = '$type' ");
		
		if(mysql_num_rows($query) == 1) { 
			echo "-1"; //User already exist!
			}else {

                $questionNo1=$_POST['ncq1'];		
                $questionNo2=$_POST['ncq2'];
	        if ($inputQuest1){
                     // Insertion of new question. 
		     $query = mysql_query("INSERT INTO `questions` ( `question` ) VALUES ('$inputQuest1')");       
		     $questionNo1=mysql_insert_id();
                }
                if ($inputQuest2){
                   
		     $query = mysql_query("INSERT INTO `questions` (`question`) VALUES ('$inputQuest2')");             
		     $questionNo2=mysql_insert_id();
                }

              
			$query = mysql_query("INSERT INTO `login` (`username` ,`email`, `type` ) VALUES ( '$username', '$email', '$type' )");		
			$memorable_length= strlen($memorable);	

                   // Inserts time taken to register.
                   $query = mysql_query("INSERT INTO `Rlog` (`username`,`type`, `start`, `end`) VALUES ('$username', '$type', '$start', '$endtime')"); 

                
	
			//Insertion of challenge questions with username.
			$query = mysql_query("INSERT INTO `credentials` (`q1`,`a1`, `q2`,`a2`,`word`,`word_size`, `username`, `type`, `picno` ) VALUES ('$questionNo1', '$answer1', '$questionNo2', '$answer2', '$memorable', '$memorable_length' ,'$username', '$type' , '$pic' )"); 
			
			echo "1";		
		}
		
	}
	
?>