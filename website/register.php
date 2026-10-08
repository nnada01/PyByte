<?php 
// Include the pybyte connection file
include 'connect.php';

// Check if the signup form is submitted
if(isset($_POST['signup'])){
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check password length (minimum 8 characters)
    if (strlen($password) < 8) {
        header("Location: signup.php?error=" . urlencode("Password must be at least 8 characters long."));
        exit();
    }
    // Check if password contains at least one uppercase letter
    if (!preg_match('/[A-Z]/', $password)) {
        header("Location: signup.php?error=" . urlencode("Password must contain at least one uppercase letter."));
        exit();
    }
    // Check if password contains at least one lowercase letter
    if (!preg_match('/[a-z]/', $password)) {
        header("Location: signup.php?error=" . urlencode("Password must contain at least one lowercase letter."));
        exit();
    }
    // Check if password contains at least one number
    if (!preg_match('/[0-9]/', $password)) {
        header("Location: signup.php?error=" . urlencode("Password must contain at least one number."));
        exit();
    }
    // Check if password contains at least one special character
    if (!preg_match('/[!@#$%^&*(),.?\":{}|<>]/', $password)) {
        header("Location: signup.php?error=" . urlencode("Password must contain at least one special character."));
        exit();
    }
// password hashing
    $password = md5($password);

    // Check if the email already exists in the database
    $checkEmail = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkEmail);
    if($result->num_rows > 0){
        header("Location: signup.php?error=" . urlencode("Email Address Already Exists!"));
        exit();
    }
    else{
        // Insert new user into the database
        $insertQuery = "INSERT INTO users(firstName,lastName,email,password) 
                        VALUES ('$firstName','$lastName','$email','$password')";
        if($conn->query($insertQuery) === TRUE){
            header("Location: login.php");
            exit();
        }
        else{
            header("Location: signup.php?error=" . urlencode("Error: " . $conn->error));
            exit();
        }
    }
}
?>
