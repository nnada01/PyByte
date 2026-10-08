<?php
include('connect.php');

// Start session
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// Get the logged-in user's email from session
$email = $_SESSION['email'];

// Fetch user information
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
// Handle profile update
if (isset($_POST['updateProfile'])) {
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];

    // Update user data in the database
    $updateSql = "UPDATE users SET firstName='$firstName', lastName='$lastName' WHERE Id='" . $user['Id'] . "'";
    if ($conn->query($updateSql) === TRUE) {
        // Redirect to the same page to refresh the data
        header("Location: profile.php");
        exit();
    } else {
        echo "Error updating profile: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile</title>
    <link rel="stylesheet" href="styles.css">
      <!-- Link to Font Awesome library for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <a href="homepage2.php" class="logo">PyByte</a>
            <ul>
                <li><a href="homepage2.php">Back to Homepage</a></li>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
            </ul>
        </nav>
    </header>

    <div class="profile-container">
        <h1>Your Profile</h1>

        <!-- Displaying User Information -->
        <div class="profile-info">
            <p><span>First Name:</span> <?php echo $user['firstName']; ?></p>
            <p><span>Last Name:</span> <?php echo $user['lastName']; ?></p>
            <p><span>Email:</span> <?php echo $user['email']; ?></p>
        </div>

        <!-- Edit Profile Form -->
        <div class="edit-form">
            <form method="POST" action="profile.php">
                <label for="fName">First Name</label>
                <input type="text" id="fName" name="fName" value="<?php echo $user['firstName']; ?>" required>

                <label for="lName">Last Name</label>
                <input type="text" id="lName" name="lName" value="<?php echo $user['lastName']; ?>" required>

                <button type="submit" name="updateProfile">Update Profile</button>
            </form>
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2025 PyByte. All rights reserved.</p> 
    </footer>
</body>
</html>