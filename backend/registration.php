<?php
define('SITE', true);
include('includes/db.php');
include('includes/function.php');

// print_r($_POST);

if ($_POST["email"] != '') {

    $name = validate($_POST["name"]);
    $email = validate($_POST["email"]);
    $password = validate($_POST["password"]);
    $address = validate($_POST["address"]);
    $phone = validate($_POST["phone"]);

    $email_query = mysqli_query($connect, "SELECT * FROM users WHERE email='$email'");

    if (mysqli_num_rows($email_query) > 0) {
        echo "Email alredy exists";
    } else {

        $hash_password = password_hash($password, PASSWORD_DEFAULT);

        $insert_record = mysqli_query($connect, "INSERT INTO users(name,email,password,address,phone) VALUES ('$name','$email','$hash_password','$address','$phone')");

        if ($insert_record) {
            echo "registered";
        } else {
            echo "Some error occured";
        }
    }
} else {
    echo "Some error occured";
}
