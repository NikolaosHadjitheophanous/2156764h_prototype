<?php
  // Creates a session for teh a user
  session_start();
  $username=$_SESSION['username'];
  require_once("database.php"); // Connects to the db.
  
  if($username== " " || $username ==null) {  $username=$_SESSION['username']; }
  
  if (($_SESSION['Sessionid']==" ")||$_SESSION['Sessionid']== null){
	     $query = mysql_query("INSERT INTO `session` (`username`) VALUES ('$username')");
	     $count=1;
	     $_SESSION['count']=$count;
	     // Gets the most recent sessionid for the user.
	     $query1 = mysql_query("SELECT * FROM `session` WHERE `username` = '$username' ORDER BY `sessionid` DESC LIMIT 0,1");								
	         while ($row = mysql_fetch_array($query1)){
		     $_SESSION['Sessionid']=$row['sessionid'];		   
	            }
  }

  else { 
  
  $sid=$_SESSION['Sessionid'];
    // Gets the most recent sessionid and trial attempt for the user.
   $query1 = mysql_query("SELECT * FROM `Llog` WHERE `session id` = '$sid' ORDER BY `trialno` DESC LIMIT 0,1");								
	         while ($row = mysql_fetch_array($query1)){
		    $count=$row['trialno'];		   
	            }
       $count++;
      $_SESSION['count']=$count;
    
      
  }
  
?>