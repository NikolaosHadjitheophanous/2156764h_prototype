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
			url: "credentialcheck.php", // request file the 'credentialcheck.php'
			data: datastring, // post the data
			success: function(questions) { // get the response


                                 if (questions== "-1" ){
					
                                        show_loding.style.display = 'none';
                                        var divUsernameERROR = document.getElementById('user-name-notexist-msg'); 
					$('#user-name-notexist-msg').html("You are not register for this account type. Please register first!");
					divUsernameERROR.style.display = 'block'; 
				}else{
                                     var result = $.parseJSON(questions);
				     if(result[0] != "aaa") {
					// ajax success callback
					//Hide the username input element            
					var div1 = document.getElementById('username-not-loged');
					div1.style.display = 'none';
					//show the first phase (Memorable Word or Question)
					var div2 = document.getElementById('username-loged');
					div2.style.display = 'block' ;
					
					//display one of the two secure questions!
					$('#question').html(result[0]);

                                     
					  var showPanel_2 = document.getElementById('panel_2');
					  showPanel_2.style.display = 'block' ;
                                          //display a second secure questions!
					 $('#question2').html(result[1]);
                                       
			             }else{
                                        show_loding.style.display = 'none';
                                        var sqlERROR = document.getElementById('user-name-notexist-msg'); 
					$('#user-name-notexist-msg').html("Oups, MySQL error!");
					sqlERROR.style.display = 'block'; 
                                     }
                              
                                }
			} //end of success response from credentialcheck.php
			
		}); // ajax end
		
		
	}); // click end
	
       //hide the error messages when user start typing
        $(" #answer_1 , #answer_2, #memorable_word1,  #memorable_word2,#memorable_word3 ").keyup(function (e) {
	    $('#phase2-error-msg').hide(1000);					
        });    


	$('#goToPhase2_btn').on('click', function(event){ 
		event.preventDefault();
		
		var mem_char1= $("#memorable_word1").val();
		var mem_char2= $("#memorable_word2").val();
		var mem_char3= $("#memorable_word3").val(); 
		var question_answer1 = $("#answer_1").val(); 
                var question_answer2= $("#answer_2").val(); 

                //---------------------   Perform input checking   ---------------------
                var error=0;
		// Check that all memorable characters are was given		               
                if ( (!mem_char1) || (!mem_char2) || (!mem_char3) ){
                    error=1;
                }
		//Check both of the question were answered
		if(question_answer1 == "" || question_answer2 == "") { // check if answer is blank
			error=1;
			
		}

                //IF any input was not given thet print error 
		if (error!=0){
                      var divPhase2Error = document.getElementById('phase2-error-msg'); 
		      $('#phase2-error-msg').html("Please answer all fields");
		      divPhase2Error.style.display = 'block';
                      return;
                }
                //--------------------- -----------------------------------------------

                $("#loading_next").html('<img class="img-responsive" src="static/images/user_name.gif" />');
		var username= $("#username1").val();

		var datastring = '&username='+ username +'&sans1='+question_answer1+'&sans2='+question_answer2 +'&char1='+mem_char1+'&char2='+mem_char2 +'&char3='+mem_char3; 		
		$.ajax({
			type: "POST", // type
			url: "BankAccount_loginDecoy.php", // request file the 'IndexPicture.php'
			data: datastring, 
			success: function(responseText) {
				
				if(responseText == 1) { 
					window.location = 'BankAccount_loginImage.php'; // redirect	
				}
				
			}// end of success			
		}); // end of ajax for add button 
		
		
		
	}); // click end
});				