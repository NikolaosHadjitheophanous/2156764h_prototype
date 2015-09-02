<?php 
session_start();
session_destroy();
     //define page title
     $title = 'Research Project';
     //include header template
     require('static/layout/header.php'); 
?> 


<div class="container">
<div class="jumbotron">
<center>
<h3>Something went wrong. Please try again to register</h3>
<a href="index.php">
<img class="img-responsive" src="static/images/go_to_home.gif" alt="Go to Home Page">
</a>

</center>
</div>
</div>




<?php 
//include header template
require('static/layout/footer.php'); 
?> 	