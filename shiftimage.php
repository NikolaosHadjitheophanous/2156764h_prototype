<?php	
	// Used to dispaly a new set of images.
	$categoryno=$_SESSION['categoryno'];
	// Changing of array elements so that new images are dispalyed.
	for($x=1; $x<=$categoryno; $x++)
	{
	
	     $count=  $_SESSION['size' . $x];
	     
	     $val1=$_SESSION['pic' . $x][0][0];
	     $val2=$_SESSION['pic' . $x][1][0];
	     $j=0;
	     for($y=0; $y<$count-1; $y++)
	     { $j=$y+1;
	       $_SESSION['pic' . $x][0][$y]=$_SESSION['pic' . $x][0][$j];
	       $_SESSION['pic' . $x][1][$y]=$_SESSION['pic' . $x][1][$j];
	      
	       $_SESSION['pic' . $x][1][$y];
	     }  
	   
	        $_SESSION['pic' . $x][0][$count-1]=$val1; 
		$_SESSION['pic' . $x][1][$count-1]=$val2;
		
	}	
	
?>
		   