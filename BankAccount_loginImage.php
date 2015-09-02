<?php	
        session_start();
        $account_photo=$_SESSION['eshime'];
	//define page title
	$title = 'Research Project';
	//include header template
	require('static/layout/header.php');



?>
    <script type="text/javascript" src="jquery/picturezoom.js"> </script>
    <script type="text/javascript" src="jquery/IndexPicture2.js"> </script>

<div class="container">
<center><img class="img-responsive" src="<?php echo $account_photo?>"></center> <br>
<div class="jumbotron">
<center>
    	<h2>Please select your image password.</h2>   
    	<div name="details" id="details" border="0">
		<?php
			// This page is responsible for displaying the image set for the user.			
			$username=$_SESSION['username'];
                        $type=$_SESSION['type']; 

			//$ans=$_SESSION['ans'];
			//$a1=$_SESSION['answer'];
			$picno=$_SESSION['picno'];			
			$i=1;
			$picnoarray=array();	
			$catnoArray=array();	
			$pathArray=array();		
			$catno1=search($picno);
			$decoy=$_SESSION['decoy'];
			require_once("database.php"); // require the db connection
			
			// Condition when decoy images have already been created for the user.	
			if($decoy>=1){
				// Retrives decoy image data for the user.
				$query3 = mysql_query("SELECT * FROM `decoy` WHERE `username` = '$username' AND `type` = '$type' ");        
					while ($row = mysql_fetch_array($query3)){   
						$picnoarray[]=$row['picno'];
					}	
			}else{
                               // Condition when decoy images haven't been created for the user.     
                               $picnoarray[0]=$picno;
                               // Gets number of images from the DB. 
				$query2 = mysql_query("SELECT * FROM `pictures`");
				$numberOfResults=mysql_num_rows($query2); 
                                // Generates decoy images based on random number.
				while ($i<=15){
					
					$random = rand(1, $numberOfResults);// Random generation of numbers for decoys
					$searchele = array_search($random,$picnoarray); // searches if the number is already used.
					
					if($searchele == "" || $searchele>16) {
						//Calls search function.	
						$catno=search($random);  
                        
						if ($catno!=$catno1) {
                                        
							$picnoarray[$i]=$random;		
							$i++;	
						}// end if
                  	                } // end if 
              	                 } // end while
                   	}// else
                   	
		        shuffle($picnoarray); //Shuffles the images around, so that they are in different positions for every login.
		        for($x=0; $x<16; $x++){
		                //Retrives picture details                  
		        		$query3 = mysql_query("SELECT * FROM `pictures` WHERE `picno` = '$picnoarray[$x]'");
		                                        
				while ($row = mysql_fetch_array($query3)){   
					$name[$x]=$row['name'];
					$catArray[$x]=$row['category'];		
					  //Retrives category details 
				 	$query4 = mysql_query("SELECT * FROM `category` WHERE `categoryno` = '$catArray[$x]'");
                                            
                        			while ($row1 = mysql_fetch_array($query4)){
                        				$path[$x]=$row1['path'];	
                      			}// while
                  		}// while	
		                                        
		         }// for	
                        // Calls printpic function   
	                printpic($name, $path, $catArray, $picnoarray);
	                
	                if($decoy==0){
	                		// Calls insertdb function
	                		insertdb($name,$path,$picnoarray);            
            		}
			// Inserts decoy images.	
			function insertdb($name,$path,$picnoarray)
			{  
				$username=$_SESSION['username'];
                                $type=$_SESSION['type'];
				for($r=0; $r<16; $r++)
				{
				  	$path1=$path[$r]."/".$name[$r];
				  	$picno=$picnoarray[$r];
				  	$query = mysql_query("INSERT INTO `decoy` (`username`, `picno`, `type`) VALUES ('$username', '$picno', $type)");
				  }
			}
			
			// Searches the picture category of the image.
			function search($picno)
			{	
                                						
				require_once("database.php"); // require the db connection
				$query1 = mysql_query("SELECT * FROM `pictures` WHERE `picno` = '$picno'");
				while ($row = mysql_fetch_array($query1)){
					$cat=$row['category'];				
				} // end while
											
				return $cat;
			} // end function
			
			//Displays the images 											
			function printpic($name, $picpath, $category, $pic)
			{  
				
				$style = " margin=0px; background-color=transparent; border=none;";
				$styleimage = "120";
				$eventimage1= "zoomin(this)";
				$eventimage2= "zoomout(this)";
				$btnclass="btnclass";	
				$j=0;
				$spa=0;
				$i=0;
				
				for($k=0; $k<4; $k++){  
					
					echo "<div class=hadjis .$styleimage.>";
					
					for($j=0; $j<4; $j++){
					   
						
						$btn= "btn".$category[$i];
						echo "<span id='" . $spa. "'>";
						echo "<button name='" . $btn. "'
						margin ='".$style."' 
						class='".$btnclass."'
						id ='".$pic[$i]."'
						.$styleimage.
						>";
						
						echo "<img src='". $picpath[$i]."/".$name[$i]."' 
						id ='".$pic[$i]."'
						alt ='".$name[$i]."'
						height='".$styleimage."'
						width='".$styleimage."'
						onMouseMove='".$eventimage1."'
						onMouseOut='".$eventimage2."'
						
						>";
						
						echo "</button >";
						$spa++;
						echo"</span>";
						$i++;
						
					}
					echo "</div>";
				}		
			}// end function
		?>
	</div>
 </center>

</div>
</div>


<?php 
//include header template
require('static/layout/footer.php'); 
?> 	