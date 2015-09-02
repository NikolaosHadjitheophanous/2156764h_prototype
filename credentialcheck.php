<?php
	// Checks if the user has registered and displays the challenge question for the user.
	session_start();				
	
	$username = $_POST['username'];	
	$_SESSION['username']= $username;
	$_SESSION ['count']="true";
	
	require_once("database.php"); // require the db connection
	
	$type=$_SESSION['type'];
	// gets all the questions associated with the username.
	$query = mysql_query("SELECT * FROM `credentials` WHERE `username` = '$username' AND `type`='$type'");

	if(mysql_num_rows($query) == 1) {
		$question1='aaa'; 
		$question2='bbb';  
		
		$tmp = UniqueRandomNumbersWithinRange(1,2,2);
		while ($row = mysql_fetch_array($query)){
			
			//generates a random number, for question generation
			//$randq=rand(1,2); //<-----------
			$val="q".$tmp[0];
			$q1=$row[$val];
			
                        $picno=$row['picno'];
			$val2="a".$tmp[0];
			$a1=$row[$val2];
			$_SESSION['corr_answer1']=$a1;
			
                        $_SESSION['picno']=$picno;
			
			// gets question based on qno
			$query1 = mysql_query("SELECT * FROM `questions` WHERE `qno` = '$q1'");
	 		while ($row = mysql_fetch_array($query1)){
				$question1=$row['question'];
			}// end while
		}// end while
		
			$query__ = mysql_query("SELECT * FROM `credentials` WHERE `username` = '$username' AND `type`='$type'");
			
			while ($row = mysql_fetch_array($query__)){	 
				//generates a random number, for question generation
				
				$val_="q".$tmp[1];
				$q2=$row[$val_];
				
				$val_2="a".$tmp[1];
				$a2=$row[$val_2];
				$_SESSION['corr_answer2']=$a2;
				
				
				// gets question based on qno
				$query2 = mysql_query("SELECT * FROM `questions` WHERE `qno` = '$q2'");
				while ($row = mysql_fetch_array($query2)){
					$question2=$row['question'];
					
				}// end while
				
			}// end while
		
		echo json_encode(array($question1, $question2));      
		
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