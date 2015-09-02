<?php
	// This page is responsible for getting all the categories of images from the DB.
	session_start();
	$category1 = array(); 
	$path = array();
	require_once("database.php"); // Calls the connection to the db
	
	// gets details from category
  	$sql = "SELECT * FROM category";
	$result = mysql_query($sql);		
	while ($row = mysql_fetch_array($result)) { 
		$category1[]= $row['categoryno'];
		$path[]= $row['path'];
	}
		
	// starts a session to pass number of categories and category details.		
	$_SESSION['categoryno']= count($category1);
	$_SESSION['category']= array($category1, $path);

?>  