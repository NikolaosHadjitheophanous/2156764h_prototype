<?php 
session_start();
$account_photo=$_SESSION['eshime'];
    //define page title
    $title = 'Research Project';
    //include header template
    require('static/layout/header.php'); 
$username=$_SESSION['username'];
?> 
<link  href="static/css/buttons_index.css" rel="stylesheet" type="text/css" >

<div class="container">

<center>
<img class="img-responsive" src="<?php echo $account_photo?>"> <br>
<div class="success" >Well done! You have successfully logged into you account! If you would like you can go to home page and log in again</div>
<br>
<a href="index.php">
     <img class="img-responsive" src="static/images/thanks.jpeg" alt="Go to Home Page">
</a>

</center>

</div>


<!--
  <br>
<div class="container">
<div id="chunky-buttons">
	<div class="chunky">
          <div class="row">
		<div class="chunky1">
                     <a href="BankAccount.php?account=bank-account.png">BANK ACCOUNT </a>
               </div>
		<div class="chunky2"><a href="SocialMedia.php?account=social_media.png">SOCIAL MEDIA</a>
                </div>
		<div class="chunky3"><a href="OnlineShopping.php?account=online_shopping.png">ONLINE SHOPPING</a>
                </div>
           </div>
               <div class="row">
		<div class="chunky4"><a href="account_blog.php?account=blog.PNG">BLOG ACCOUNT</a>
                </div>

		<div class="chunky5"><a href="PersonalEmail.php?account=personal_email.png">BLOG ACCOUNT</a>
               </div>


              <div class="chunky6"><a href="OfficeEmail.php?account=office_email.png">OFFICE EMAIL   </a></div>
             </div>

</div>
</div> 
</div>                                                           
<br>

-->




<style type="text/css">
body{
font-family:Arial, Helvetica, sans-serif; 
font-size:13px;
}
.success,.error {
border: 2px solid;
margin: 20px 0px;
padding:30px 20px 30px 20px;
background-repeat: no-repeat;
background-position: 10px center;
}

.success {
color: #4F8A10;
background-color: #DFF2BF;
background-image:url();
font-size: 20px; 
}

</style>


<?php 
session_destroy();

//include header template
require('static/layout/footer.php'); 
?> 	