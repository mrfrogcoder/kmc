<!DOCTYPE html>
<html lang="en">
<head>
<title>KMC | XML converter</title>
<meta charset="utf-8">
<meta name="author" content="Van Aldrin Sarzate">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
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
      <form class="form-horizontal " action="includes/Api.php" method="post">
        <div class="form-group">
          <label for="inputName" class="col-sm-4 control-label">Name <span>First name only</span></label>
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
            <button type="submit" class="btn btn-default submit">Submit</button>
            <br/>
            <button type="button" class="btn btn-default export">Export to XML</button>
          </div>
        </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="js/main.js"></script>
</html>