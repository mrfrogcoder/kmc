<!DOCTYPE html>
<html lang="en">
<head>
<title>KMC | XML converter </title>
<meta charset="utf-8">
<meta name="author" content="Van Aldrin Sarzate">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style type="text/css">
.form {
    max-width: 500px;
    padding: 15px;
    margin: 0 auto;
}
</style>

</head>

<body>
   <div class="container">

   <form class="form-horizontal form" action="/includes/Api.php" method="post">
  <div class="form-group">
    <label for="inputName" class="col-sm-2 control-label">Name   <span>First name only</span></label>
  
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputName" placeholder="" value="" name="name">
    </div>
  </div>
  <div class="form-group">
    <label for="inputBirthday" class="col-sm-2 control-label">Birthday <span>mm-dd-yyyy</span></label>
     
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputBirthday" placeholder="" value="" name="birthday">
    </div>
  </div>
  <div class="form-group">
    
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
       <button type="button" class="btn btn-default">Export to XML</button>
    </div>
  </div>
</form>

    </div> <!-- /container -->
   
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
	$(function(){
		$('form').submit(function(event){
			  $form = $(this),
			  $actionUrl = $form.attr('action');
			  console.log(JSON.stringify($form.serialize()));
			  $.ajax({
				 	url : "."+$actionUrl,
					type: "POST",
					data:  { name : $form.find("#inputName").val() , birthday : $form.find("#inputBirthday").val()},
						beforeSend: function(){
						
					},
					success: function(res){
						console.log(res);	
					}
			  });
			  
			  
			event.preventDefault();
		})
	});


</script>
</html>