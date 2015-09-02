$(function(){

        //hide the error message for username
        $("#username1").keyup(function (e) {
	    $('#user-name-error-msg').hide(1000);
            $('#user-name-notexist-msg').hide(1000);					
        });
   	
	$('#login_btn').on('click', function(event){ 
		event.preventDefault();
                 $(window).keydown(function(event){
                      if(event.keyCode == 13) {
                       event.preventDefault();
                       return false;
                       }
                });
		
		//removes spaces from username
		var username= $('#username1').val().replace(/\s/g, '');
		
		if (username== '') {
			var divUsernameERROR = document.getElementById('user-name-error-msg');
			$('#user-name-error-msg').html("Username is required");
			divUsernameERROR.style.display = 'block'; 
			return;
		}
		//Input is ok
		var show_loding = document.getElementById('login_next_loding');
		$('#login_next_loding').html('<img class="img-responsive" src="static/images/user_name.gif" />');
		show_loding.style.display = 'block'; 
		
		
		var datastring = '&username='+ username; //sends data to php page
		$.ajax({
			type: "POST", // type
			url: "SocialSave.php", // request file the 'credentialcheck.php'
			data: datastring, // post the data
			success: function(resonse) { // get the response


                                 if (resonse == "1" ){

                                       var div1 = document.getElementById('username-not-loged');
					div1.style.display = 'none';
					//show the first phase (Memorable Word or Question)
					var div2 = document.getElementById('username-loged');
					div2.style.display = 'block' ;
					
                                        
				}else if(resonse == "-1" ) {
                                   
				       show_loding.style.display = 'none';
                                        var divUsernameERROR = document.getElementById('user-name-notexist-msg'); 
					$('#user-name-notexist-msg').html("You are not register for this account type. Please register first!");
					divUsernameERROR.style.display = 'block'; 

     
			        }else{
                                       //PROVLIMA!!!!! --------
                                        show_loding.style.display = 'none';
                                        var divDatabaseERROR = document.getElementById('username-loged'); 
					$('#username-loged').html("Something went wrong with the database request. Please refresh your browser!");
					divDatabaseERROR.style.display = 'block'; 
                                }
                              
                              
			} //end of success response from credentialcheck.php
			
		}); // ajax end
		
		
	}); // click end
	

       //hide the error message for Memorable Word Characters
        $("#memorable_word1").keyup(function (e) {
	    $('#phase2-error-msg').hide(1000);					
        });
        $("#memorable_word2").keyup(function (e) {
	    $('#phase2-error-msg').hide(1000);					
        });
    
        $("#memorable_word3").keyup(function (e) {
	    $('#phase2-error-msg').hide(1000);					
        });



        $('#goToImage').on('click', function(event){ 
                event.preventDefault();

		

                // Gets selected option's value (username only)	
		var mem_char1= $("#memorable_word1").val();
		var mem_char2= $("#memorable_word2").val();
		var mem_char3= $("#memorable_word3").val();
	
                
                if ( (!mem_char1) || (!mem_char2) || (!mem_char3) ){
                      var divPhase2Error = document.getElementById('phase2-error-msg'); 
		      $('#phase2-error-msg').html("Please answer all fields");
		      divPhase2Error.style.display = 'block';
                      return;	
                }


                var show_loding_finish = document.getElementById('login_finish');
		$('#login_finish').html('<img class="img-responsive" src="static/images/user_name.gif" />');
		show_loding_finish.style.display = 'block'; 

                var datastring = '&char1='+mem_char1+'&char2='+mem_char2 +'&char3='+mem_char3; 

		$.ajax({
			
			url: "SocialMedia_login.php",
			type: "POST",          
			data: datastring,
			success: function(responseText) { 
			
                               
                 if(responseText == "1") { 
				window.location = 'SocialMedial_Image.php'; // redirect	
	         }else{
 
                                   $("#login_finish").html('');
                                    var divPhase2Error = document.getElementById('login_finish'); 
		                    $('#login_finish').html("Oups, Something went wrong! Please refresh your browser and try again..");
		                    divPhase2Error.style.display = 'block';
                                    
                 }


			} // end success    


       	
		}); // ajax end
		
		
	}); // click end

});				


     	