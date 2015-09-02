<?php
	// Checks if the user has registered and displays the challenge question for the user.
	session_start();
        	
	$username = $_POST['username'];	 
        $_SESSION['username']= $username;
	$_SESSION ['count']="true";


        require_once("database.php"); // Connects to the db.


               

        $type=$_SESSION['type'];
	// gets all the questions associated with the username.
	$query = mysql_query("SELECT * FROM `credentials` WHERE `username` = '$username' AND `type`='$type' LIMIT 1");


    
    $question1='aaa';      
	if(mysql_num_rows($query) == 1) {
		
             
	 
                $tmp = UniqueRandomNumbersWithinRange(1,2,1);
		while ($row = mysql_fetch_array($query)){
			
			//generates a random number, for question generation
			
			$val="q".$tmp[0];
			$q1=$row[$val];    //number of the question
			//$picno=$row['picno'];
			$val2="a".$tmp[0];
			$a1=$row[$val2];  
			$_SESSION['correct_answer']=$a1;      //the answer of the user
			$picno="none";
			
			// gets question based on qno
			$query1 = mysql_query("SELECT * FROM `questions` WHERE `qno` = '$q1'");
	 		while ($row = mysql_fetch_array($query1)){
				$question1=$row['question'];
			}// end while
                    }// end while

               echo $question1; 

       }else{
         // The username does not exist on database!
         echo "-1";

        }



                //function that finds 3 random number between a specific range
		function UniqueRandomNumbersWithinRange($min, $max, $quantity) {
			$numbers = range($min, $max);
			shuffle($numbers);
			return array_slice($numbers, 0, $quantity);
		}

               
		
		
?>