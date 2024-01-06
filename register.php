<?php  
session_start();
include('includes/config.php');
if (isset($_SESSION['user_id'])) {
  header("Location: user/"); // Redirect to the dashboard if logged in
  exit();
}
elseif (isset($_SESSION['verify_id'])) {
  header("Location: verify.php"); // Redirect to the dashboard if logged in
  exit();
}
elseif (isset($_SESSION['admin_id'])) {
  header("Location: admin/"); // Redirect to the dashboard if logged in
  exit();
}
elseif (isset($_SESSION['forgot_id'])) {
  header("Location: change_password.php"); // Redirect to the dashboard if logged in
  exit();
}
else {}
?>
<html lang="en" data-bs-theme="auto">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title><?php echo SITE_REG ?></title>

    <!-- Favicons / CSS-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/register.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" type="image/x-icon" href="assets/img/transparent-logo.png">
    <meta name="theme-color" content="#712cf9">
<body class="d-flex align-items-center py-4 bg-body-tertiary">
<!-- Icons -->
<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
  <symbol id="check-circle-fill" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>  
<!-- Icons --> 
<main class="form-signup w-100 m-auto"> 
<div>
  <?php include('includes/register_process.php') ?>
</div>  
<div class="form-signup-body container">         
<div class="text-center">
  <?php 
  echo $global_message; 
  ?>
<img class="mb-4" src="assets/img/transparent-logo.png" alt="" width="100" height="100">
<h1 class="h3 mb-3 fw-normal text-white">Please Sign Up</h1>
</div>  
  <form action="" method="POST">
    <div class="mb-3">
      <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $first_name; ?>" placeholder="First Name">
      <?php echo $first_name_err; ?>
    </div>
    <div class="mb-3">
      <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $last_name; ?>" placeholder="Last Name">
      <?php echo $last_name_err; ?>
    </div>
    <div class="mb-3">
      <input type="text" class="form-control" id="username" name="username" value="<?php echo $user_name; ?>" placeholder="Username">
      <?php echo $user_name_err; ?>
    </div>
    <div class="mb-3">
      <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>" placeholder="email address">
      <?php echo $email_err; ?>
    </div>  
    <div class="mb-3">
      <input type="password" class="form-control" id="newpassword" name="newpassword" value="<?php echo $newpassword; ?>" placeholder="Password">
      <?php echo $newpassword_err; 
      echo $passwordmatch_error; ?>
    </div>
    <div class="mb-3">
      <input type="password" class="form-control" id="conpassword" name="conpassword" value="<?php echo $conpassword; ?>" placeholder="Confirm Password">
      <div id="passwordHelp" class="form-text text-white lead">Only Uppercase, Lowercase, Digit and Special Characters are allowed.</div>
      <?php echo $conpassword_err; 
      echo $passwordmatch_error; ?>
      <input class="form-check-input" type="checkbox" value="Show Password" id="displayPassword" onclick="myRegister()">
      <label class="form-check-label text-white" for="displayPassword">
        Show Password
      </label>
    </div>      
    <div class="form-check text-start my-3">
      <input class="form-check-input" type="checkbox" value="remember-me" id="rememberme" name="rememberme" checked required="required">
      <label class="form-check-label text-white" for="rememberme">I accept the Terms & Conditions</label>
    </div>
    <div>
    <button class="form-signup-button btn btn-primary w-100 py-2" name="user_register" id="user_register" type="submit">Sign Up</button>
    <hr>
    <p><a class="form-signup-link" href="login.php">Already a Member</a><br><a class="form-signup-link" href="forgot.php">Need Help</a></p>
    <hr>
    </div>
    <div class="text-white">
    <p class="mt-5 mb-3 text-center">
      &copy; <?php echo date('Y').' '.SITE_NAME; ?>
      <br>
      <a class="form-signup-link" href="#">Privacy Policy</a> &nbsp; <a class="form-signup-link" href="#">Terms and Conditions</a>
    </p>
    </div>
  </form>
</div>  
</main>
<script src="assets/js/show_password.js"></script>
</body>
</html>