<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Registration</title>

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

    <h2 class="mb-3">Registration</h2>

    <form id="registerForm" method="post">
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Address</label>
        <textarea name="address" class="form-control" rows="3" required></textarea>
      </div>

      <div class="mb-3">
        <label class="form-label">Phone number</label>
        <input type="number" name="phone" class="form-control" required>
      </div>

      <button type="submit" class="btn btn-primary" id="registerBtn">Register</button>

      <p class="mt-2" id="registerThanks"></p>

    </form>

    <p class="text-center mb-4">Already have account <a href="login.php">Login now!</a></p>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <!-- JQuery CDN -->
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

  <!-- jQuery Register AJAX -->
  <script>
      jQuery('#registerForm').on('submit', function(e) {
      jQuery('#registerBtn').attr('disabled', true);
      jQuery.ajax({
        url: 'backend/registration.php',
        type: 'post',
        data: jQuery('#registerForm').serialize(),
        success: function(result) {
          if (result === "registered") {
            jQuery('#registerThanks').html('Registration successful');
            jQuery('#registerForm')['0'].reset();

            setTimeout(function() {
              location.href = "login.php";
            }, 2000);

          } else {
            jQuery('#registerThanks').html(result);
          }

          jQuery('#registerBtn').attr('disabled', false);

        }
      });
      e.preventDefault();
    });
  </script>

</body>

</html>