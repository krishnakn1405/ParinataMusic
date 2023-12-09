<?php
define('SITE', true);
include('includes/db.php');
include('includes/function.php');

// print_r($_POST);

if ($_POST["email"] != '') {

    $email = validate($_POST["email"]);
    $password = validate($_POST["password"]);

    $email_query = mysqli_query($connect, "SELECT * FROM users WHERE email='$email'");

    if (mysqli_num_rows($email_query) == 1) {

        $email_assoc = mysqli_fetch_assoc($email_query);

        if (password_verify($password, $email_assoc['password'])) {

            $_SESSION['email'] = $email;

            if (isset($_SESSION['email'])) {
                echo "logged";
            } else {
                echo "Some error occured";
            }
        } else {
            echo "Invalid password";
        }
    } else {
        echo "Email not exists";
    }
} else {
    echo "Some error occured";
}
