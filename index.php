<?PHP
require_once("include/membersite_config.php");
if(isset($_POST['submitted']))
{
  {
    if($fgmembersite->Login())
    {
      $fgmembersite->RedirectToURL("typecheck.php");   
    } 
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>LOGIN</title>
  <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
  <script type='text/javascript'>
    function clearnow()
    {
    var u = document.getElementById("username");
    u.value = "";
    var p = document.getElementById("password");
    p.value = "";
    }
  </script>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>
<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form id='login' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
          <input type='hidden' name='submitted' id='submitted' value='1'/>
          <div><font color= red><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></font></div>
          <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control" type='text' name='username' id='username' value='<?php echo $fgmembersite->SafeDisplay('username') ?>' maxlength="50" />
            <font color= red><span id='login_username_errorloc' class='error'></span></font>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type='password' name='password' id='password' maxlength="50" />
            <font color= red><span id='login_password_errorloc' class='error'></span></font>
          </div>
          <button class="btn btn-primary btn-block" type='submit' name='submitted'>Login </button>
          <button class="btn btn-primary btn-block" onClick = "clearnow();" type='button' name='submitted'>Clear</button>
        </form>
        <script type='text/javascript'>
          var frmvalidator  = new Validator("login");
          frmvalidator.EnableOnPageErrorDisplay();
          frmvalidator.EnableMsgsTogether();
          frmvalidator.addValidation("username","req","Please provide your username");
          frmvalidator.addValidation("password","req","Please provide the password");
        </script>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
