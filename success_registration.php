<?php 
session_start();
$account_photo=$_SESSION['eshime'];
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
     //define page title
     $title = 'Research Project';
     //include header template
     require('static/layout/header.php'); 
?> 

<link  href="http://fonts.googleapis.com/css?family=Cabin:400,500,600,bold" rel="stylesheet" type="text/css" >

<link  href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:regular,bold" rel="stylesheet" type="text/css" >
<link  href="static/css/button.css" rel="stylesheet" type="text/css" >


<div class="container">
<center><img class="img-responsive" src="<?php echo $account_photo;?>"></center><br>
<div class="jumbotron">
<center>

<h3>Well done! You have successfully register! Now you could try to login.</h3>

</center>
</div>

<center> 
    <a class="button" href="<?php echo $login;?>" >
      <span>Log into <?php echo $account_type?> </span>
    </a>
</center>
<br>

</div>


<?php 
session_destroy();
//include header template
require('static/layout/footer.php'); 
?> 	