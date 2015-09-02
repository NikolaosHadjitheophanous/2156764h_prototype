<?php 
session_start();
$account_photo=$_SESSION['eshime'];
//define page title
$title = 'Research Project';
//include header template
require('static/layout/header.php'); 

if ($_SESSION['type']== "1"){
    $login="BankAccount.php?account=bank-account.png";
    $account_type="BANK ACCOUNT";
}else if ($_SESSION['type']== "2"){
    $login="SocialMedia.php?account=social_media.png";
    $account_type="SOCIAL MEDIA";
}else if($_SESSION['type']== "3"){
    $login="OnlineShopping.php?account=online_shopping.png";
    $account_type="ONLINE SHOPPING";
}else if ($_SESSION['type']== "4"){
    $login="account_blog.php?account=blog.PNG";
    $account_type="BLOG ACCOUNT";
}else if ($_SESSION['type']== "5"){
    $login="PersonalEmail.php?account=personal_email.png";
    $account_type="PERSONAL EMAIL";
}else if ($_SESSION['type']== "6"){
    $login="OfficeEmail.php?account=office_email.png";
    $account_type="OFFICE EMAIL";
} 

?> 

<link  href="http://fonts.googleapis.com/css?family=Cabin:400,500,600,bold" rel="stylesheet" type="text/css" >

<link  href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:regular,bold" rel="stylesheet" type="text/css" >
<link  href="static/css/button.css" rel="stylesheet" type="text/css" >



<div class="container">


<center> 

<img class="img-responsive" src="<?php echo $account_photo?>"> <br>
<div class="error" >We are sorry but your credentials are wrong! Please try again to login</div>
<div class="container">
<div class="row">
     
   <div class="col-md-4 btn-vert-block">
   </div>
   <div class="col-md-4 btn-vert-block">
       <a class="button" href="<?php echo $login;?>" >
        <span>Try to log into <?php echo $account_type?> again</span>
      </a>
   </div>


</div>
<br>

</center>

</div>

<style type="text/css">
body{
font-family:Arial, Helvetica, sans-serif; 
font-size:13px;
}
.error {
border: 2px solid;
margin: 20px 0px;
padding:30px 20px 30px 20px;
background-repeat: no-repeat;
background-position: 10px center;
}

.error {
color: #D8000C;
background-color: #FFBABA;
font-size: 20px; 
}

</style>


<?php 
//include header template
require('static/layout/footer.php'); 
?> 	