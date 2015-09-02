<?php
	
	session_start();
	require_once("database.php");  // Calla page to connet to DB  
	require_once("category.php"); // calls categories
	$categoryno=$_SESSION['categoryno'];
	
	for($i=1; $i<=$categoryno; $i++)
	{
	 	$cat=$i; $j=0;
	 	// Gets images based on category.
	 	$query1 = mysql_query("SELECT * FROM `pictures` WHERE `category` = '$cat'");
		
		$picno="picno".$i;
		$name="name".$i;
			
		while ($row2 = mysql_fetch_array($query1)) {
								
			${$picno}[$j]=$row2['picno'];
			${$name}[$j]=$row2['name'];
			$j++;
		}
		
		$_SESSION['pic' . $i]= array(${'picno' . $i}, ${'name' . $i});
		$_SESSION['size' . $i]=$j;

		
	}
		
?>