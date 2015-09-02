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
     
	$("#email").keyup(function (e) {
		$('#error_msg_email').hide(1000);					
	});
	
	$("#memorable").keyup(function (e) {
		$('#error_msg_mem').hide(1000);					
	});			

	$('#register').on('click', function(event){
		event.preventDefault();
		
		
		var username= $('#username2').val().replace(/\s/g, '');
		var email = $("#email").val().replace(/\s/g, '');
		var memorable=$("#memorable").val().replace(/\s/g, '');
		
	       //--------Perform checks to inputs--------------------
	       var error_found=0;
	       error_found=NotEmptyUsernameCHECK(username);
	          

                //CHECK input email validity
                var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		if(!re.test(email)){ 
			var email_err = document.getElementById('error_msg_email');  
			$('#error_msg_email').html("Please insert a valid email address!");
			email_err.style.display = 'block'; 
                        error_found=1;
		}
                //CHECK memorable word validity
                 mem_length =memorable.length;
                if (mem_length < 10){    
			var memorable_err = document.getElementById('error_msg_mem');  
			$('#error_msg_mem').html("The memorabale word must be at least 10 chars!");
			memorable_err.style.display = 'block'; 
                         return;
		}

                // if the input requirements does not much then RETURN
		if ( error_found == 1){
                    return;
                }else{
              

		var loading_next = document.getElementById('loading_msg');  
		$('#loading_msg').html('<img src="static/images/user_name.gif" />');
		loading_next.style.display = 'block';
		
		var datastring ='&username='+username+'&email='+email+'&memorable='+memorable;
		
		
		$.ajax({
			type: "POST",                      // type
			url: "SocialMedia_register.php",           // request file the 'check_uname2.php'
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