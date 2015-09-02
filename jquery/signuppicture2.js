$(document).ready(function(e) {
    $('.btnclass').click(function(event) {
 
        event = event || window.event; 
        var target = event.target || event.srcElement; 
        var id = target.id;
        var but = document.getElementById(id).parentNode.name;
        var datastring = '&id='+id;
     
 $("#details").html('<img class="img-responsive" src="static/images/loading.gif" />');
 $("#refresh").html('');
        $.ajax({
         
                 url: "updatepicture.php",
                 type: "POST",          
                 data: datastring,
                 success: function(responseText) {  // get the response
                         if(responseText == 1) { window.location = 'success_registration.php';}
                     else { window.location = 'error_registration.php';}
                
                }   
        }); // ajax end
         
         
    }); // button class
      
        //basically refresh the page in order to change display images!
    $('.refreshclass').click(function() {
        window.location = 'SignUpPictureChallenge2.php';    
    });
});