<?php
	// Checks if the user has registered and displays the challenge question for the user.
	session_start();
        	
	$username = $_POST['username'];	 
        $_SESSION['username']= $username;
	$_SESSION ['count']="true";


        require_once("database.php"); // Connects to the db.

        $type=$_SESSION['type'];
	// gets all the questions associated with the username.
	$query = mysql_query("SELECT * FROM `credentials` WHERE `username` = '$username' AND `type` = '$type' ");

	if(mysql_num_rows($query) == 1) {
		while ($row = mysql_fetch_array($query)){	
			//generates a random number, for question generation
			$picno=$row['picno'];
			$_SESSION['picno']=$picno;	
                    }// end while

              echo "1";

       }else{
         // The username does not exist on database!
         echo "-1";

        }

		
		
?>