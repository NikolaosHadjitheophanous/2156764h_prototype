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
			
			url: "SocialMedia_ImageCheck.php",
			type: "POST",          
			data: datastring,
			success: function(responseText) { // get the response
			
                               
                if(responseText == "-1") { 
				window.location = 'wrong_credentials.php';
	         }

                if(responseText == "1") { 
				window.location = 'success_credentials.php';
	         }

		   
			} // end success            
		}); // ajax end
    }); // btnclass
}); // document