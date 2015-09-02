<?php	
	//define page title
	$title = 'Research Project';
	//include header template
	require('static/layout/header.html');
?>

<div>
   <center>
   <img class="img-responsive" src="http://oblogin.com/static/images/user_authentication.png">
   </center>
</div>
	


<div class="container">
<div class="jumbotron">
<h2>Select one of the following account types in order to register or login</h2> <br></br>
<div class="row">
       <div class="col-md-4 btn-vert-block">
           <a href="BankAccount.php?account=bank-account.png"><input type="image" src="/static/images/bank-account.png" > </a>
	</div>
        <div class="col-md-4 btn-vert-block">
             <a href="SocialMedia.php?account=social_media.png"><input type="image" src="/static/images/social_media.png" ></a>
            	 
	</div> 
        <div class="col-md-4 btn-vert-block">
             <a href="OnlineShopping.php?account=online_shopping.png"><input type="image" src="/static/images/online_shopping.png" ></a>
             
	</div>

</div>
<br></br>
<div class="row">
        <div class="col-md-4 btn-vert-block">
             <a href="account_blog.php?account=blog.PNG"><input type="image" src="/static/images/blog.PNG" ></a>	
	</div>
        <div class="col-md-4 btn-vert-block">
              <a href="PersonalEmail.php?account=personal_email.png"><input type="image" src="/static/images/personal_email.png" ></a>
	</div>
        <div class="col-md-4 btn-vert-block">
               <a href="OfficeEmail.php?account=office_email.png"><input type="image" src="/static/images/office_email.png" ></a>
	</div> 

</div>
	
	
</div>
</div>


<div class="container">
<div class="container-fluid">
		
		
<div class="jumbotron">

        <h1>Novelty and ceiling effects in the evaluation of authentication systems</h1><br> <br>
	<h2>A little bit about my dissertation:</h2> <br>
        <p> My name is Nikolaos Hadjitheophanous and I am studying MSc in Information Security in University of Glasgow. My dissertation title is: "Novelty and ceiling effects in the evaluation of authentication systems" and I am supervised by Dr.Lewis Mackenzie. I have developed a  prototype application which lets users register and login into different accounts (Type of account: Bank account, Email account, Social Media, ...) using different authentication codes and metaphors like questions, images, memorable words etc.This user study aims to investigate novelty and ceiling effects in authentication systems.
</p>

<h3>Novelty and Ceiling effects:</h3>  <br>
        <p> The main purpose of my thesis is to find out the exact time that a user should be trained in order to get familiar with a new system. All the experiments which involve people learning a new system/technology have to take into consideration the time which the users need  in order to get familiar with the use of the new  system (interface, capabilities, ..). In general, novelty effect concern all the issues/difficulties  that every new user will face when he/she will use a new system for the very first time, and how those issues/difficulties could bias the findings.
</p> <br>

        <p> Ceiling effect  could also bias experimental findings but in contrast with novelty effect which is related to the system, ceiling effect is related to the experimental design. One example would be to design the experiment(s) in such way that high success rates would be guaranteed (Ask from participants to login immediate after they have registered) and thus your finding will not impact the truth conditions. In order to remove the ceiling effect usually you have to take into consideration the worst case scenario (i.e. test memorability of your system by measuring participant login success rates after a long period).
</p>

<h2>General Information about the study:</h2>  <br>

         <ul >
		<li style="font-size:22px";>The study will be voluntary.</li>
		<li style="font-size:22px";>There are no physical risks involved in it.</li>
		<li style="font-size:22px";> We are not using any special devices or hardware.</li>
		<li style="font-size:22px";>The experiment will not take place in the open air or outside any building, eliminating all health and  safety  issues.</li>
		<li style="font-size:22px";>The experiment will be in a controlled lab environment.</li> 
                <li style="font-size:22px";>The study does not collect any personally identifiable information. </li>
                <li style="font-size:22px";>The study consists of 3 Sessions. </li> 
	</ul> 
	
	
	
	<h3>SESSION 1</h3>
	<ul> 
                <li style="font-size:22px";> Each participant has to answer the following Questioner/Survey before test the system   <a href="http://goo.gl/forms/aVHwENxWSW" >BY CLICKING HERE !!! </a> </li> 
        </ul>
       <h3>SESSION 2</h3>
         <ul> 
		<li style="font-size:22px";> After participants finishes with the survey they will have to CHOOSE and REGISTER to any 4 account types that might prefer. </li>
		<li style="font-size:22px";> Users can have the same Username for all of their accounts. </li>
		<li style="font-size:22px";> Registration phase requires providing email address, providing a memorable/secure word, selecting 1 password images, selecting and answering 2 questions.</li> 
		<li style="font-size:22px";> By the time that the participant finishes with the registration phase, he/she will have to practice with the Login phase. The user will have to successfully login on each of the four types of the accounts that he/she has created five times! </li>
		<li style="font-size:22px";> After completing the registration and authentication stages kindly complete a short survey regarding this study:</li> 
		<li style="font-size:22px";> To start the registration process please click on one of the links at the top of this page.</li>
	</ul> 	
	
	
	<h3>SESSION 3</h3>
	
	<ul> 
		<li style="font-size:22px";> Users will be asked to log in to each of their four accounts in any order desired by the user.</li>
		<li style="font-size:22px";> After completing the authentication stages kindly complete a short survey regarding this study:</li>
	</ul> 	
	
	
</div>
		

		
</div>
</div>






<?php 
//include header template
require('static/layout/footer.php'); 
?> 	