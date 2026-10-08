<?php

include('connect.php');


session_start();

//Check if the form is submitted
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    //Sanitize inputs for security
    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);

    //Hash the password using md5
    $password = md5($password);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    // Check if the user exists
    if ($result->num_rows > 0) {
        $_SESSION['email'] = $email;
        header("Location: homepage2.php");
        exit();
    } else {
        $_SESSION['login_error'] = "Invalid email or password. Please try again.";
        header("Location: login.php"); 
        exit();
    }
}
?>