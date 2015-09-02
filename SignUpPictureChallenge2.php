<?php
        session_start();
	//define page title
	$title = 'Research Project';
	//include header template
	require('static/layout/header.php'); 

?>


<script type="text/javascript" src="jquery/picturezoom.js"> </script>
<script type="text/javascript" src="jquery/signuppicture2.js"> </script>


<div class="container">
<div class="jumbotron">


        <h4><b>Stage 2/2</b></h4>
    	<center>
    	
    	<p><b>Please select an image in order to complete the registration phase</b></p>
    	<br> <br>
    	 

        <button class="refreshclass" name="refresh" id="refresh">Change set</button>
        <br></br>
    	<div name="details" id="details" border="0">
		<?php
                    
                   
	             $category=$_SESSION['category'];
                     $categoryno=$_SESSION['categoryno'];
                     printpic($category);// calls printpic function 
		     //-------------------------------------------------------
                    
			
	
			require_once("shiftimage.php");	 // Used to change image set
				
			// Creates and Dispalys image buttons.
			function printpic ($category){  
					
				$style = " margin=0px; background-color=transparent; border=none;";
				
				$styleimage = "120";
				$eventimage1= "zoomin(this)";
				$eventimage2= "zoomout(this)";
				$btnclass="btnclass";	
				$i=0;
				$spa=0;
				$m=1;
										
				for($k=0; $k<4; $k++){  
					
					$val1=$category[0][0];
					$val2=$category[1][0];
					$val3=$category[0][1];
					$val4=$category[1][1];
					$val5=$category[0][2];
					$val6=$category[1][2];
					$val7=$category[0][3];
					$val8=$category[1][3];
					
					echo "<div .$styleimage. class=row >";
					
					for($j=0; $j<4; $j++){
					   
						
							$btn= "btn".$category[0][$j];
							$picpath = $category[1][$i]. "/";
							
							$pic=$_SESSION['pic' . $m];
							
							$pic11=$_SESSION['pic' . $m][0][0]; 
							$pic12=$_SESSION['pic' . $m][1][0];
							$picpath=$picpath.$pic12;
							$i++; $m++;
							
							echo "<span id='" . $spa. "'>";
							echo "<button name='" . $btn. "'
							margin ='".$style."' 
							class='".$btnclass."'
							id ='".$pic12."'
							.$styleimage.
							>";
						
								echo "<img src='".$picpath."' 
								id ='".$pic11."'
								alt ='".$pic12."'
								height='".$styleimage."'
								width='".$styleimage."'
								onMouseMove='".$eventimage1."'
								onMouseOut='".$eventimage2."'
								>";
						
							echo "</button >";
							$spa++;
							echo"</span>";			
					}
					echo "</div>";
				}
				
				for($i=0; $i<12; $i++){
			
				$I=$i+4;
				$category[0][$i]=$category[0][$I];
				$category[1][$i]=$category[1][$I];	
			}
	
			 $category[0][12]=$val1;
			 $category[1][12]=$val2;
			 $category[0][13]=$val3;
			 $category[1][13]=$val4;
			 $category[0][14]=$val5;
			 $category[1][14]=$val6;
			 $category[0][15]=$val7;
			 $category[1][15]=$val8;
			 
			 
			}// end function
		?>
         
</div>
</center>

</div>
</div>
<!-- Close the margin and the container-fluid  -->


<?php 
	//include header template
	require('static/layout/footer.php'); 
?> 