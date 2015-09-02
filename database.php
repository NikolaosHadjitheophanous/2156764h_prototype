<?php
// list pages is used to make connections to the DB.
	// your host, user, password
	$db = mysql_connect("oblogin.com", "neel099_root", "rootdb");
	
	if(!$db) { 
		echo mysql_error(); 
	} 
	
	// database name
	$select_db = mysql_select_db("neel099_twofactorauth");
	 
	if(!$select_db) { 
		echo mysql_error(); 
	}
?>