<!doctype html>
<?php

session_start();
if (isset($_SESSION['email'])) {
  header('location: dashboard.php');
}

?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Login</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Exercise</a>
    </div>
  </nav>

  <!-- Registration -->
  <div class="container my-3">

    <h2 class="mb-3">Login</h2>

    <form id="loginForm" method="post">

      <div class="mb-3">
        <label class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>

      <button type="submit" class="btn btn-primary" id="loginBtn">Login</button>

      <p class="mt-2" id="loginThanks"></p>
    </form>

    <p class="text-center mb-4">Not have an account <a href="registration.php">Register now!</a></p>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <!-- JQuery CDN -->
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

  <!-- jQuery Register AJAX -->
  <script>
    jQuery('#loginForm').on('submit', function(e) {
      //jQuery('#loginBtn').attr('disabled', true);
      jQuery.ajax({
        url: 'backend/login.php',
        type: 'post',
        data: jQuery('#loginForm').serialize(),
        success: function(result) {

          if (result === "logged") {
            jQuery('#loginThanks').html('Login successful');
            jQuery('#loginForm')['0'].reset();

            setTimeout(function() {
              location.href = "dashboard.php";
            }, 2000);

          } else {
            jQuery('#loginThanks').html(result);
          }

          jQuery('#loginBtn').attr('disabled', false);

        }

      });
      e.preventDefault();
    });
  </script>

</body>

</html>