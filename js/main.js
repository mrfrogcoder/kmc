$(function(){
	var url = window.location.href;
		$('form').submit(function(event){
			  $form = $(this),
			  $actionUrl = $form.attr('action');
			  $(".submit").attr("disabled","disabled").text("Submitting...");
			  $.ajax({
				 	url : $actionUrl,
					type: "POST",
					data:  { name : $form.find("#inputName").val() , birthday : $form.find("#inputBirthday").val()},
					beforeSend: function(){
						
					},
					success: function(res){
						console.log(res);
						$message = "";
						if(res.result.error == 1){
							
							for(var i = 0; i < res.result.message.length;i++){
								$message += "<p>"+res.result.message[i]+"</p>";
							}
							$(".validation-result").addClass("alert-danger").fadeIn("slow").html($message);
						}else{
							$(".validation-result").show().removeClass("alert-danger").addClass("alert-success").html(res.result.message).delay(1500).fadeOut("slow");
							$form.find("#inputName").val("");
							$form.find("#inputBirthday").val("")
						}
						$(".submit").removeAttr("disabled","disabled").text("Submit");
					}
			  });
			  
			  
			event.preventDefault();
		});
		
		$('.export').click(function(event){
			
			 window.location = url+"includes/xmlApi.php";
					
		});
});