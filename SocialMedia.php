<?php
	session_start();
	$title = 'Research Project'; //define page title
	require('static/layout/header.html'); //include header template
	
	$string1="http://oblogin.com/static/images/";
	$account = $_GET['account'];
	$image=$string1.$account;
        $_SESSION['eshime']=$image;

        $_SESSION['type']= 2;
     
        $today = date("Y-m-d H:i:s");
	$_SESSION['start']= $today;
        

?>
 
<link rel="stylesheet" href="static/css/username_style.css">
<script type="text/javascript" src="static/script/register_social.js"></script>
<script type="text/javascript" src="static/script/login_social.js"></script>



<div class="container">
        <!-- Put Account Image on the center -->
	<center><div class="img1"> <img class="img-responsive" id="image_account" src="<?php echo $image?>"></div></center> 
	
	
	
	<div class="container">			
		<div class="container">
			<form class="form" method="post" id="mainform" name="mainform">	
				<ul class="tab-group">
					<li class="tab active">
						<a href="#login">Log In</a>
					</li>
					<li class="tab">
						<a href="#signup">Register</a>
					</li>
					
				</ul>
				
				
				
				<div class="tab-content">
					
					<!-- ***************Present the login tab******************* -->
					<div id="login" style="display: block;">
						<div class="wrapper">
							
							

<div id="username-not-loged" style="display: block;">


<form id="form-usernmae_signin" autocomplete="off">  
	<center> <h2 class="form-signin-heading">Log In Phase</h2></center> <hr> <br>

	<h2 class="form-signin-heading">Give your username in order to login</h2>
	<br>

        <div class="inner-addon left-addon">
          <i class="glyphicon glyphicon-user"></i>      
          <input type="text" class="form-control" name="username1" id="username1" placeholder="Username" autofocus />
       </div>
	
	<div id="user-name-error-msg" class="validation" style="display: none;"></div>
        <div id="user-name-notexist-msg" class="error" style="display: none;"></div>
	<br>
         <center><div id="login_next_loding" style="display: none;"></div> </center>
	<button id="login_btn" type="submit" class="btn btn-lg btn-primary btn-block">Login</button>
</form>	

</div> 


						
<div id="username-loged" style="display: none;">

	<center>
		<h2 class="form-signin-heading">Log In-Step 2</h2>
	</center> <hr> <br>
	
	

<h2 class="form-signin-heading">Please give the following characters of the memorable word</h2>
	
	
	
<?php
require_once("database.php"); // require the db connection
              
               $username=$_SESSION['username'];
               $type=$_SESSION['type'];
               $result= mysql_query("SELECT `word_size` FROM `credentials` WHERE `username` = '$username' AND `type` = '$type'");
               if (mysql_num_rows($result)) {
                        
                    $max= mysql_result($result,0) or die(mysql_error());
                    if (isset($max)) { 
                        $max=$max-1;
                        $tmp = UniqueRandomNumbersWithinRange(0,$max,3);
                    }else{  $tmp = UniqueRandomNumbersWithinRange(0,9,3); }
         
               }else{ $tmp = UniqueRandomNumbersWithinRange(0,9,3);  }
         
		$_SESSION['pos1']=$tmp[0];
		$_SESSION['pos2']=$tmp[1];
		$_SESSION['pos3']=$tmp[2];
               
                //function that finds 3 random number between a specific range
		function UniqueRandomNumbersWithinRange($min, $max, $quantity) {
			$numbers = range($min, $max);
			shuffle($numbers);
			return array_slice($numbers, 0, $quantity);
		}
		

?>
	
	
		<div class="panel panel-default">
		<div class="panel-heading">Please give the following characters of the memorable word </div>
		<div class="panel-body">
			<div class="flex">                            
				<p style="width: 1000px;">Please give the  <?$temp=$tmp[0]+1 ; if($temp>3){echo "$temp <sup>th</sup>";}else if ($temp==3){ echo "$temp <sup>rd</sup>";}else if ($temp==2){ echo "$temp <sup>nd</sup>";}else if($temp==1){echo "$temp <sup>st</sup>";} else{echo $temp;}?> character: </p>
				<input autofocus  type="password" class="form-control" name="memorable_word1" id="memorable_word1" size="1" maxlength="1" style="width: 80px;"  autocomplete="off"/>
			</div>  
			
		</div>      
		<div class="panel-body">
			<div class="flex">
				<p style="width: 1000px;">Please give the   <? $temp=$tmp[1]+1 ; if($temp>3){echo "$temp <sup>th</sup>";}else if ($temp==3){ echo "$temp <sup>rd</sup>";}else if ($temp==2){ echo "$temp <sup>nd</sup>";}else if($temp==1){echo "$temp <sup>st</sup>";} else{echo $temp;}?> character: </p>
				<input type="password" class="form-control" name="memorable_word2" id="memorable_word2" size="1" maxlength="1" style="width: 80px;" autocomplete="off"/>
			</div>  
			
		</div>    
		<div class="panel-body">
			<div class="flex">
				<p style="width: 1000px;">Please give the  <? $temp=$tmp[2]+1 ; if($temp>3){echo "$temp <sup>th</sup>";}else if ($temp==3){ echo "$temp <sup>rd</sup>";}else if ($temp==2){ echo "$temp <sup>nd</sup>";}else if($temp==1){echo "$temp <sup>st</sup>";} else{echo $temp;}?> character: </p>
				<input type="password" class="form-control" name="memorable_word3" id="memorable_word3" size="1" maxlength="1" style="width: 80px;" autocomplete="off"/>
			</div>  
			
		</div>                   
	</div>

      
        <div id="phase2-error-msg" class="validation" style="display: none;"></div>
	<center><div id="login_finish" style="display: none;"></div> </center>
        
	<button id="goToImage" class="btn btn-lg btn-primary btn-block" type="submit" >Next Phase</button> 
	
</div>
								
							
						</div>			
					</div>	
					<!-- ******************************************************** -->
					
<!-- ***************Present the Register tab******************* -->
<div id="signup" style="display: none;">
<div class="wrapper">
<form method="post" autocomplete="off" > 

	<center>  
		<h2 class="form-signup-heading">Registration phase</h2>
	</center> 
	<hr> <br>
	
	<h3 class="form-signup-heading">Username</h3>	
        <div class="inner-addon left-addon">
          <i class="glyphicon glyphicon-user"></i>      
          <input name="username2" type="text" class="form-control" id="username2" placeholder="Username" autofocus />
        </div>
	<span id="user-result2"></span>	
        <div id="error_msg_username" class="validation" style="display: none;"></div>

	<h3 class="form-signup-heading">Email</h3>
        <div class="inner-addon left-addon">
          <i class="glyphicon glyphicon-envelope"></i>      
          <input name="email" type="email" class="form-control" id="email" placeholder="email@example.com">	
        </div>			
	
	<div id="error_msg_email" class="validation" style="display: none;"></div>
	
	<br>
	<hr class="style-five">	
	<br>



        <h3 class="form-signup-heading">Memorable word</h3>
         <div class="inner-addon left-addon">
          <i class="glyphicon glyphicon-lock"></i>      
          <input name="memorable" type="text" class="form-control" id="memorable" placeholder="More than 10 characters" pattern=".{10,36}"  maxlength="36"/>
        </div>
	
	<div id="error_msg_mem" class="validation" style="display: none;"></div>
	<hr class="style-five">	
	<br>
	
	

        
        <div id="error_msg_ans" class="validation" style="display: none;"></div>
        <center> <div id="loading_msg" style="display: none;"></div></center>
	<button id="register" class="btn btn-lg btn-primary btn-block" type="submit" >Next step</button>        
</form>
	

						
</div>		
</div>	
<!-- ******************************************************** -->	
					
					
				</div> </div>
		</div>	 <!-- close the <div class="tab-content"> -->
	</form> 
	
</div>
</div>

	
		

<style type="text/css">
	.flex {
	display: -webkit-box;
	display: -moz-box;
	display: -ms-flexbox;
	display: -webkit-flex;
	display: flex;
	}
	
	.flex-child {
	-webkit-box-flex: 1 1 auto;
	-moz-box-flex:  1 1 auto;
	-webkit-flex:  1 1 auto;
	-ms-flex:  1 1 auto;
	flex:  1 1 auto;
	}

	hr.style-five {
	border: 0 none;
	box-shadow: 0 0 10px 1px black;
	height: 0;
	}

body{
font-family:Arial, Helvetica, sans-serif; 
font-size:13px;
}
.info, .success, .warning, .error, .validation {
border: 1px solid;
margin: 8px 0px;
padding:11px 10px 11px 50px;
background-repeat: no-repeat;
background-position: 10px center;
}
.error {
color: #D8000C;
background-color: #FFBABA;
background-image: url('static/images/error.gif');
}
.validation {
color: #D63301;
background-color: #FFCCBA;
background-image: url('static/images/validation.png');
}
</style>



		
		
		<script src="http://codepen.io/assets/libs/fullpage/jquery.js"></script>
		<script src="/static/script/account.js"></script>
		
		
		
<?php 
	//include header template
	require('static/layout/footer.php'); 
?>  				