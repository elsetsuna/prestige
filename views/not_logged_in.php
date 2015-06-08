<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Login - Bootstrap Admin Template</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

<link href="css/font-awesome.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/pages/signin.css" rel="stylesheet" type="text/css">

</head>

<body>
  
<div class="account-container">
  
  <div class="content clearfix">
    
    <form method="post" action="index.php" name="loginform">
    
      <h1>Member Login</h1>   
      
      <div class="login-fields">
        
        <p>Please provide your details</p>
        <?php
// show potential errors / feedback (from login object)
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo $error;
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
            echo $message;
        }
    }
}
?>
        <div class="field">
          <label for="username">Username</label>
          <input type="text" id="login_input_username" name="user_name" placeholder="Username" class="login username-field" />
        </div> <!-- /field -->
        
        <div class="field">
          <label for="password">Password:</label>
          <input type="password" id="login_input_password" name="user_password" placeholder="Password" class="login password-field"/>
        </div> <!-- /password -->
        
      </div> <!-- /login-fields -->
      
      <div class="login-actions">
        
        <span class="login-checkbox">
          <input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
          <label class="choice" for="Field">Keep me signed in</label>
        </span>
                  
        <button class="button btn btn-success btn-large" type="submit" name="login">Sign In</button>
        
      </div> <!-- .actions -->
      
      
      
    </form>
    
  </div> <!-- /content -->
  
</div> <!-- /account-container -->



<div class="login-extra">
  <a href="#">Reset Password</a>
</div> <!-- /login-extra -->


<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/bootstrap.js"></script>

<script src="js/signin.js"></script>

</body>

</html>
