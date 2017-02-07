<!DOCTYPE html>
<html lang="en">
<head>
<title>KMC | XML converter </title>
<meta charset="utf-8">
<meta name="author" content="Van Aldrin Sarzate">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style type="text/css">
body{
background:#e1f4f8;	
}

.form {
    max-width: 500px;
    padding: 15px;
    margin: 0 auto;
}
.center-block{
 text-align:center;	
}
.wrapper{
background: #ebf4fb;
    border: 2px solid #b1daf1;
    padding: 0 24px;	
	margin: 48% 0;
}
.subText{
	
	color:#667486;font-weight:bold;
	
	}
	h3{
	
	font-weight:bold;
	
	}
label span{
	font-size:11px;
	color:#788398;
}
.btn {
   min-width: 140px;
    margin: 3px;
    background: #212121;
    color: #fff;
    font-weight: bold;
    border-radius: 6px;
    padding: 9px;
}
.alert{
    margin-top: 24px;	
}
input{
	border-color: #b4d5e7 !important;
    border-radius: 0  !important;
}
hr{
border-top: 2px solid #c3e2f4;


}
@media (min-width: 1200px){
	label span{
	display:block;
	}
	.form-horizontal .control-label {
   padding:0px;
    margin-bottom: 0;
    text-align: right;
	}

}
@media (min-width: 992px){
	.form-horizontal .control-label {
   padding:0px;
    margin-bottom: 0;
    text-align: right;
	}
	label span{
	display:block;
	}

}
@media (min-width: 768px){
	.form-horizontal .control-label {
 	 padding:0px;
    margin-bottom: 0;
    text-align: right;
	}
	label span{
	display:block;
	
	}

}


</style>

</head>

<body>
   <div class="container">
 	<div class="row">
   
  <div class="col-md-6 col-md-offset-3">
  
    <div class="wrapper">
    
   <h3>Sign-Up</h3>
   <span class="subText">Complete the following fields.</span>
   <hr />
    <div class="alert alert-danger validation-result" style="display:none;" role="alert">...</div>
   <form class="form-horizontal " action="/includes/Api.php" method="post">
  <div class="form-group">
    <label for="inputName" class="col-sm-4 control-label">Name   <span>First name only</span></label>
    
  
    <div class="col-sm-6">
      <input type="text" class="form-control" id="inputName" placeholder="" value="" name="name">
    </div>
  </div>
  <div class="form-group">
    <label for="inputBirthday" class="col-sm-4 control-label">Birthday <span>mm-dd-yyyy</span></label>
    
    <div class="col-sm-6 ">
      <input type="text" class="form-control" id="inputBirthday" placeholder="" value="" name="birthday">
    </div>
  </div>
 
   <div class="form-group">
    <div class="col-sm-offset-4 col-sm-6">
    
    
    
       <button type="submit" class="btn btn-default submit">Submit</button><br/>
       <button type="button" class="btn btn-default export">Export to XML</button></div>
     
 
    </div>
  </div>
  <!--<div class="form-group">
    <div class="col-sm-10">
    <div class="center-block"> 
       <button type="submit" class="btn btn-default submit">Submit</button><br/>
       <button type="button" class="btn btn-default export">Export to XML</button></div>
     
    </div>
  </div>-->
  
</form>
</div></div></div>
    </div> <!-- /container -->
   
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
	$(function(){
		$('form').submit(function(event){
			  $form = $(this),
			  $actionUrl = $form.attr('action');
			  $(".submit").attr("disabled","disabled").text("Submitting...");
			  $.ajax({
				 	url : "."+$actionUrl,
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
							$(".validation-result").removeClass("alert-danger").addClass("alert-success").html(res.result.message).delay(1500).fadeOut("slow");
							$form.find("#inputName").val("");
							$form.find("#inputBirthday").val("")
						}
						$(".submit").removeAttr("disabled","disabled").text("Submit");
					}
			  });
			  
			  
			event.preventDefault();
		});
		
		$('.export').click(function(event){
			
			 window.location = "./includes/xmlApi.php";
					
		 });
	});


</script>
</html>