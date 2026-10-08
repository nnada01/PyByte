<?php
session_start();
// Include database connection
include 'connect.php';
// If there's an error passed through the URL, display an alert with the error message
if (isset($_GET['error'])) {
    $error = $_GET['error'];
    echo "<script>alert('$error');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="styles.css">
    <script>
      // If there's an error passed through the URL, display an alert with the error message
        function validatePassword() {
            const password = document.getElementById('password').value;
            const requirements = {
                length: password.length >= 8,
                uppercase: /[A-Z]/.test(password),
                lowercase: /[a-z]/.test(password),
                number: /[0-9]/.test(password),
                special: /[!@#$%^&*(),.?":{}|<>]/.test(password)
            };
            
            let isValid = true;
              // Check if password meets all criteria
            for (const key in requirements) {
                if (!requirements[key]) {
                    isValid = false;
                    break;
                }
            }
            // If validation fails, alert the user and prevent form submission
            if (!isValid) {
                alert('Password must contain:\n- At least 8 characters\n- At least one uppercase letter\n- At least one lowercase letter\n- At least one number\n- At least one special character (!@#$%^&*(),.?":{}|<>)');
                return false;
            }
            return true;
        }
    </script>
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
      <div class="auth-page">
        <h1>Create Your PyByte Account</h1>
        <div class="auth-form">
          <h2>Sign Up</h2>
          <!-- Sign up form with validation -->
          <form method="post" action="register.php" onsubmit="return validatePassword()" >
            <label for="fName"> First Name</label>
            <input type="text" id="fName" name="fName" placeholder="Enter your first name" required>
            <label for="lName"> Last Name</label>
            <input type="text" id="lName" name="lName" placeholder="Enter your last name" required>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
            <span class="passwordhint">Password must contain at least 8 characters with uppercase, lowercase, number, and special character</span>
            <button type="submit"  class="btn btn-primary" value="Sign up" name="signup">Sign Up</button>
          </form>
          <p>Already have an account? <a href="login.php">Log In</a></p>
        </div>
      </div>
      <footer class="footer">
        <p>&copy; 2025 PyByte. All rights reserved.</p>
      </footer>
    

</body>
</html>