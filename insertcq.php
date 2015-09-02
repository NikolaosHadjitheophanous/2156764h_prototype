<?php
	session_start();
        $type=$_SESSION['type'];
		/*This page is responsible for adding questions written by users into the database and linking their prefered challenge questions to their account*/
	$username=$_SESSION['username'];
	// require the db connection
	require_once("database.php");  
	// Variable declaration.
	$cq1 = $_POST['cq1']; 
	$ca1 = $_POST['ca1']; 
	$tcq1 = $_POST['tcq1'];
	$ncq1 = $_POST['ncq1'];
	
	$cq2 = $_POST['cq2']; 
	$ca2 = $_POST['ca2']; 
	$tcq2 = $_POST['tcq2']; 
	$ncq2 = $_POST['ncq2'];

        $memorable = $_POST['memorable'];
	
	
	// Checks for value of drop down box to be "Enter own question" and if the text box isnt blank or null.
	if(($cq1 == "Enter own question") && (($tcq1 != " ") || $tcq1 != null)) {
		// Insertion of new question. 
		$query = mysql_query("INSERT INTO `questions` (`question`) VALUES ('$tcq1')");
		$result = mysql_query($sql);
		$ncq1=mysql_insert_id();
	}
	// Checks for value of drop down box to be "Enter own question" and if the text box isnt blank or null.
	if(($cq2 == "Enter own question") && (($tcq2 != " ") || $tcq2 != null)) {
		// Insertion of new question.  
		$query = mysql_query("INSERT INTO `questions` (`question`) VALUES ('$tcq2')");
		$result = mysql_query($sql);
		$ncq2=mysql_insert_id();
	}
	
        //Insertion of challenge questions with username.
	$query = mysql_query("INSERT INTO `credentials` (`q1`,`a1`, `q2`,`a2`,`word`, `username`) VALUES ('$ncq1', '$ca1', '$ncq2', '$ca2', '$memorable', '$username')"); 
	
        // calls category page to generated categories. 	
	require_once("category.php");
	// calls images to generate images.
	require_once("image.php");
	//Checks to see if user details has been added to credential table
	$query1 = mysql_query("SELECT * FROM `credentials` WHERE `username` = '$username' AND `type` = '$type' ");								
	         while ($row = mysql_fetch_array($query1)){
		     echo '1';		   
	            }
	           
?>