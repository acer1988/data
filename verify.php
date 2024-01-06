<?php  
session_start();
include('includes/config.php'); 
if (isset($_SESSION['user_id'])) {
    header("Location: user/"); // Redirect to the dashboard if logged in
    exit();
}
elseif (!isset($_SESSION['verify_id'])) {
  header("Location: login.php"); // Redirect to the dashboard if logged in
  exit();
}
elseif (!isset($_SESSION['admin_id'])) {
  header("Location: admin_login.php"); // Redirect to the dashboard if logged in
  exit();
} 
?>
<html lang="en" data-bs-theme="auto">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title><?php echo SITE_VER ?></title>

    <!-- Favicons / CSS-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/verify.css">
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
<main class="form-verify w-100 m-auto"> 
<?php include('includes/verify_process.php') ?>  
<div class="form-verify-body container">         
<div class="text-center">
  <?php echo $global_message; ?>
<img class="mb-4" src="assets/img/transparent-logo.png" alt="" width="100" height="100">
<h1 class="h3 mb-3 fw-normal text-white">Please Verify</h1>
</div>  
  <form action="" method="POST">
    <div class="mb-3">
      <input type="password" class="form-control" id="code" name="code" value="<?php echo $ver_code; ?>" placeholder="Code">
      <?php echo $code_err; ?>
      <input class="form-check-input" type="checkbox" value="Show Password" id="displayPassword" onclick="myVerify()">
      <label class="form-check-label text-white" for="displayPassword">
        Show Code
      </label>
    </div>
    <div>
    <button class="form-verify-button btn btn-primary w-100 py-2" id="user_login" name="user_login" type="submit">Verify</button>
    </div>
    <div class="text-white">
    <p class="mt-5 mb-3 text-center">
      &copy; <?php echo date('Y').' '.SITE_NAME; ?>
      <br>
      <a class="form-verify-link" href="#">Privacy Policy</a> &nbsp; <a class="form-verify-link" href="#">Terms and Conditions</a>
    </p>
    </div>
  </form>
</div>  
</main>

<script src="assets/js/show_password.js"></script>
</body>
</html>