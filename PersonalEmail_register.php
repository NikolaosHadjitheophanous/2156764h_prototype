<?php
	
	//check we have username post var
	if(isset($_POST["username"]))
	{
		
		
		//check if its ajax request, exit script if its not
		if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
			die();
		}
                session_start();
		require_once("database.php");  
		
		$username =  trim($_POST["username"]); 
		$memorable= "none";

		$answer1 =  trim($_POST["answer1"]); 
		$answer2 =  trim($_POST["answer2"]); 
                $inputQuest1 =  trim($_POST["question1"]); 
		$inputQuest2 =  trim($_POST["question2"]); 

		$email=trim($_POST["email"]);

                //Retrieve SESSION Vars in order to perform queries to database
                $_SESSION['username']=$username;
		$type=$_SESSION['type'];
		
		//sanitize username
		$username = filter_var($username, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
		$answer1= filter_var($answer1, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);	
		$answer2= filter_var($answer2, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
                $inputQuest1 =  filter_var($inputQuest1, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
		$inputQuest2 =  filter_var($inputQuest2, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
		$email= filter_var($email, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
		
		//-------------------------------------------------------------------------------
				
		
		$query = mysql_query("SELECT `email` FROM `login` WHERE `username` = '$username' AND `type` = '$type' ");
		
		if(mysql_num_rows($query) == 1) { 
			echo $username; //User already exist!
			}else {
			

 
                $questionNo1=$_POST['ncq1'];		
                $questionNo2=$_POST['ncq2'];
                  
                if ($inputQuest1){
                     // Insertion of new question. 
		     $query = mysql_query("INSERT INTO `questions` ( `question` ) VALUES ('$inputQuest1')");
		   
		     $questionNo1=mysql_insert_id();
                }
                if ($inputQuest2){
                     // Insertion of new question. 
		     $query = mysql_query("INSERT INTO `questions` (`question`) VALUES ('$inputQuest2')");	   
		     $questionNo2=mysql_insert_id();
                }
			$query = mysql_query("INSERT INTO `login` (`username` ,`email`, `type` )
			VALUES ( '$username', '$email', '$type' )");
			
			$memorable_length= 0;		
			//Insertion of challenge questions with username.
			$query = mysql_query("INSERT INTO `credentials` (`q1`,`a1`, `q2`,`a2`,`word`,`word_size`, `username`, `type`) VALUES ('$questionNo1', '$answer1', '$questionNo2', '$answer2', '$memorable', '$memorable_length' ,'$username', '$type' )"); 
				
			// calls category page to generated categories. 	
			require_once("category.php");
			// calls images to generate images.
			require_once("image.php");
			
			echo "1";
						
		}
		
	}
	
?>
