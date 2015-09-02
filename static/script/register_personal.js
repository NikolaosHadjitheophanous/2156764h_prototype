$(function(){
        //Username live checker
	$("#username2").keyup(function (e) {
                        $('#error_msg_ans').hide(1000);
                        var divClear = document.getElementById('error_msg_username');  
			divClear.style.display = 'none'; 
			//removes spaces from username
			$(this).val($(this).val().replace(/\s/g, ''));
			
			var username2= $(this).val();
			if(username2.length < 4){$("#user-result2").html('');return;}
			
			if(username2.length >= 4){
				$("#user-result2").html('<img class="img-responsive" src="static/images/ajax-loader.gif" />');
				$.post('static/script/check_username.php', {'username':username2}, function(data) {
					$("#user-result2").html(data);
				});
			}
	});
     
	$("#answer1, #answer2, #user_question1, #user_question2").keyup(function (e) {
		$('#error_msg_ans').hide(1000);	
        });
	$("#cq1, #cq2").change(function (e) {
		$('#error_msg_ans').hide(1000);	
                $cq1=$('#cq1>option:selected').text().trim();
		$cq2=$('#cq2>option:selected').text().trim();
	        var temp ="Enter own question";
                if($cq1 == temp) {

                        var showQuestionInput = document.getElementById('user_question1');  
			showQuestionInput.style.display = 'block'; 
			                                        
		}else {
                        
			var showQuestionInput = document.getElementById('user_question1');  
			showQuestionInput.style.display = 'none';   
		 }
                  if($cq2 == temp) {

                        var showQuestionInput = document.getElementById('user_question2');  
			showQuestionInput.style.display = 'block'; 
			                                        
		}else {
                        
			var showQuestionInput = document.getElementById('user_question2');  
			showQuestionInput.style.display = 'none';   
		 }					
	});	
	
	$("#email").keyup(function (e) {
		$('#error_msg_email').hide(1000);					
	});
	

	$('#register').on('click', function(event){
		event.preventDefault();
		
		// -------------------------Gets selected option's value --------------------------------------------------
		$cq1=$('#cq1>option:selected').text().trim();
		$cq2=$('#cq2>option:selected').text().trim();
               
		$ncq1=$('#cq1').val().trim();
		$ncq2=$('#cq2').val().trim();
                // ----------------------------------------------------------------------------
                //removes spaces from inputs
                var ans1=$("#answer1 ").val();
		var ans2=$("#answer2").val();

		var username= $('#username2').val().replace(/\s/g, '');
		var email = $("#email").val().replace(/\s/g, '');
		
		
	       //--------Perform checks to inputs--------------------
	       var error_found=0;
	       error_found=NotEmptyUsernameCHECK(username);
	          

                var inputQuestion1=$("#user_question1").val();
               var inputQuestion2=$("#user_question2").val(); 
                var temp ="Enter own question"; 

              if ($cq1== temp ){
                          
                          if ( inputQuestion1.length == 0 ) {
			       var inputQuestionERR = document.getElementById('error_msg_ans');  
			       $('#error_msg_ans').html("Please insert question 1");
                               inputQuestionERR.style.display = 'block';   
			       error_found=1;
			  } 
			            
                }	
               if ($cq2== temp ){
                          
                          if ( inputQuestion2.length == 0 ) {
			       var inputQuestionERR = document.getElementById('error_msg_ans');  
			       $('#error_msg_ans').html("Please insert question 2");
                               inputQuestionERR.style.display = 'block';   
			       error_found=1;
			  } 
			            
                }

              if ($cq1== temp && $cq2== temp ){
                if (inputQuestion1 == inputQuestion2 ){
                               var inputQuestionERR = document.getElementById('error_msg_ans');  
			       $('#error_msg_ans').html("The question must be different");
                               inputQuestionERR.style.display = 'block';   
			       error_found=1;
                          }
               }



		//CHECK THAT HE ACTUALLY ANSWER All THE QUESTIONS!!!
		if(ans1.length == 0 || ans2.length == 0 || ans1==ans2){ 
			var ans_err = document.getElementById('error_msg_ans'); 
			$('#error_msg_ans').html("Please provide two different answer to each question");
			ans_err.style.display = 'block'; 
			error_found=1;
		}
		//CHECK THAT HE ACTUALLY SELECTED A QUESTION TO ANSWER!!!
		if ($ncq1== '------------------' || $ncq2== '------------------' ) {
                        if ( ($ncq1== $ncq2) && $ncq1!='Enter own question'){
			   var selection_err = document.getElementById('error_msg_ans'); 
			   $('#error_msg_ans').html("You have to select and answer two different questions.");
			   selection_err.style.display = 'block';                    
			   error_found=1;
                       }
		}




                //CHECK input email validity
                var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		if(!re.test(email)){ 
			var email_err = document.getElementById('error_msg_email');  
			$('#error_msg_email').html("Please insert a valid email address!");
			email_err.style.display = 'block'; 
                        error_found=1;
                        return;
		}
       
                // if the input requirements does not much then RETURN
		if ( error_found == 1){
                    return;
                }else{
              

		var loading_next = document.getElementById('loading_msg');  
		$('#loading_msg').html('<img src="static/images/user_name.gif" />');
		loading_next.style.display = 'block';
		
		var datastring ='&username='+username+'&email='+email+'&answer1='+ans1+'&answer2='+ans2+ '&ncq1='+$ncq1+'&ncq2='+ $ncq2+'&question1=' +inputQuestion1 +'&question2=' +inputQuestion2;
		
		
		$.ajax({
			type: "POST",                      // type
			url: "PersonalEmail_register.php",           // request file the 'check_uname2.php'
			data: datastring,                  // post the data
			success: function (response) {
				// ajax success callback
                                var result = $.trim(response);
                                if(result === "1" ){
				  window.location = 'SignUpPictureChallenge2.php'; // redirec
                                }else{
                                              $("#user-result2").html('<img src="static/images/not-available2.png" />');
                                              loading_next.style.display = 'none'; 
			                      var username_err = document.getElementById('error_msg_ans'); 
			                      $('#error_msg_ans').html("Username already exist for this account");
			                      username_err.style.display = 'block'; 
                                }
			}, // end success
			error: function (response) {
				// ajax error callback
			},
			
			
			}).done(function ( ) {
			      //alert('Ajax executed OK');
			
			}).fail(function ( jqXHR, textStatus, errorThrown ) {
			//console.log(jqXHR);
			//console.log(textStatus);
			//console.log(errorThrown);
		});

            }
		
	}); // click end



function NotEmptyUsernameCHECK(username)
{
               if (username== '') {
			var divRegisterERROR = document.getElementById('error_msg_username');  
			$('#error_msg_username').html("Username is required!");
			divRegisterERROR.style.display = 'block'; 
			return 1;
			
		}
               
                return 0;
}



});