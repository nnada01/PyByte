<?php
session_start();
// Include the database connection file
include('connect.php');
// Check if there's a login error
if (isset($_SESSION['login_error'])) {
    echo '<script>alert("'.$_SESSION['login_error'].'");</script>';
    unset($_SESSION['login_error']); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In - Pybyte</title>
    <link rel="stylesheet" href="styles.css">
    
</head>
<body>
    <header>
        <nav class="navbar">
          <a href="homepage.html" class="logo">PyByte</a>
          <ul>
            <li><a href="homepage.html">Back to Homepage</a></li>
          </ul>
        </nav>
      </header>
       <!-- Main content for the login page -->
      <div class="auth-page">
        <h1>Welcome Back to Pybyte</h1>
        <div class="auth-form">
          <h2>Log In</h2>
    <!-- Login form that submits to authen.php for processing -->
          <form method="post" action="authen.php">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            <label for="password">Password</label>
            <input type="password" id="password"  name="password" placeholder="Enter your password" required>
            <button type="submit"  class="btn btn-primary" value="Log In" name="login">Log In</button>
          </form>
          <!-- Link to the signup page for users who don't have an account -->
          <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
        </div>
      </div>
      <footer class="footer">
        <p>&copy; 2025 PyByte. All rights reserved.</p>
      </footer>
    
      <script src="script.js"></script>
</body>
</html>