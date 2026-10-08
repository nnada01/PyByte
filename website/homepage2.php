<?php

session_start();
include("connect.php");
include("progress.php");

// Ensure user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: homepage.html");
    exit();
}

//Look up numeric user_id
$email = $_SESSION['email'];
$stmt  = $conn->prepare("SELECT Id, firstName FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$res     = $stmt->get_result();
$userRow = $res->fetch_assoc();
$userId  = $userRow['Id'] ?? 0;
$firstName = $userRow['firstName'] ?? '';
$stmt->close();

//tutorial slugs in sequence
$tutorials = [
    "intro-to-python",
    "python-basics",
    "control-flow",
    "datastructures",
    "function",
    "error-handling",
    "oop",
    "attributes",
    "inheritance"
];

// Fetch completed tutorials 
$stmt = $conn->prepare("
    SELECT tutorial_id
      FROM user_progress
     WHERE user_id = ?
       AND completed = TRUE
     ORDER BY completed_at ASC
");
$stmt->bind_param("i", $userId);
$stmt->execute();
$res  = $stmt->get_result();
$done = [];
while ($row = $res->fetch_assoc()) {
    $done[] = $row['tutorial_id'];
}
$stmt->close();

// Decide the button label & link
if (count($done) > 0) {
    $lastTutorial = end($done);
    $btnText      = "Continue Learning";
    $btnLink      = $lastTutorial . ".php";
} else {
    $btnText = "Start Learning";
    $btnLink = $tutorials[0] . ".php";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PyByte - Learn Python</title>
    <!-- Link to external CSS for styling -->
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<body>
    <header>
      
        <nav class="navbar">
            <a href="homepage2.php" class="logo">PyByte</a>
            <ul class="nav-links" id="nav-links">
              <li><a href="tutorials.php"> <i class="fas fa-book"></i> Tutorials</a></li>
              <li><a href="exercises.php"><i class="fas fa-code"></i> Exercises</a></li>
              <li><a href="profile.php"><i class="fas fa-user"></i> Profile</a></li>
              <li><a href="logout.php" class="btn btn-logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
            <!--Mobile menu toggle-->
            <div class="menu-toggle" id="mobile-menu">
              <span class="bar"></span>
              <span class="bar"></span>
              <span class="bar"></span>
            </div>
          </nav>
        </header>

    <!-- Welcome Section -->
    <div class="page-hero">
    <h1>Welcome <?php echo htmlspecialchars($firstName); ?>!</h1>
    <p>Start or continue your Python journey with PyByte. Dive into our comprehensive tutorials, practice with hands-on exercises, and grow your skills.</p>
    <div class="hero-buttons">
      <!-- Dynamic Start/Continue button with original CSS class -->
      <button 
        class="btn-hero btn-secondary" 
        onclick="window.location.href='<?php echo htmlspecialchars($btnLink); ?>'"><i class="fas fa-graduation-cap"></i>
        <?php echo htmlspecialchars($btnText); ?>
      </button>
      <!--  exercise button -->
      <button
        class="btn-hero btn-secondary"
        onclick="window.location.href='exercises.php'"> <i class="fas fa-laptop-code"></i>
        Start Exercising
      </button>
    </div>
  </div>

    <!-- Content Section -->
    <div class="page-content">
        <h2>Why Learn Python?</h2>
        <div class="page-blocks-container">
            <div class="page-blocks">
                <div class="page-block"><i class="fas fa-graduation-cap"></i>
                    <h3>Easy to Learn</h3>
                    <p>Python's readable syntax makes it easy to get started, perfect for beginners!</p>
                </div>
                <div class="page-block"> <i class="fas fa-bolt"></i>
                    <h3>Powerful & Versatile</h3>
                    <p>Python is widely used in web development, data science, automation, and more.</p>
                </div>
                <div class="page-block"> <i class="fas fa-users"></i>
                    <h3>Active Community</h3>
                    <p>With millions of developers around the world, you will always find support and resources.</p>
                </div>
                <div class="page-block"> <i class="fas fa-box-open"></i>
                    <h3>Extensive Libraries</h3>
                    <p>Vast collection of libraries and frameworks, such as NumPy, Pandas, and Django.</p>
                </div>
                <div class="page-block"> <i class="fas fa-briefcase"></i>
                    <h3>Career Opportunities</h3>
                    <p>Python skills are in high demand across various industries, making it a valuable asset for career growth and job opportunities.</p>
                </div>
            </div>
            <button class="page-slider-btn prev" onclick="prevSlide()">&#10094;</button>
            <button class="page-slider-btn next" onclick="nextSlide()">&#10095;</button>
        </div>

        <!-- Let's Start With A Simple Example -->
        <div class="content2">
            <h2>Let's Start With A Simple Example</h2>
            <p>Here’s how easy it is to print something on the screen in Python. Just write:</p>
            <div class="code-box">
                <span class="function">print</span><span class="punctuation">(</span><span class="string">"Hello, World!"</span><span class="punctuation">)</span>
            </div>
            <p>This is the classic "Hello, World!" program in Python, which is often the first step for every Python learner.</p>
        </div>


        <!-- Explore Topics Section -->
        <div class="explore-section">
            <h2>Explore Topics</h2>
            <div class="page-dropdown-container">
                <!-- Python Fundamentals Dropdown -->
                <div class="page-dropdown">
                    <span>Python Fundamentals</span>
                    <div class="page-dropdown-content">
                        <span onclick="window.location.href='python-basics.php#variables'">Variables</span>
                        <span onclick="window.location.href='python-basics.php#data-types'">Data Types</span>
                        <span onclick="window.location.href='python-basics.php#operators'">Operators</span>
                        <span onclick="window.location.href='python-basics.php#input-output'">Input and Output</span>
                    </div>
                </div>

                <!-- Python Flow Control Dropdown -->
                <div class="page-dropdown">
                    <span>Python Flow Control</span>
                    <div class="page-dropdown-content">
                        <span onclick="window.location.href='control-flow.php#if-statements'">If-Statements</span>
                        <span onclick="window.location.href='control-flow.php#loops'">Loops</span>
                        <span onclick="window.location.href='control-flow.php#break-continue'">Break and Continue</span>
                    </div>
                </div>

                <!-- Python Data Structures Dropdown -->
                <div class="page-dropdown">
                    <span>Python Data Structures</span>
                    <div class="page-dropdown-content">
                        <span onclick="window.location.href='datastructures.php#strings'">Strings</span>
                        <span onclick="window.location.href='datastructures.php#lists'">Lists</span>
                        <span onclick="window.location.href='datastructures.php#tuples'">Tuples</span>
                        <span onclick="window.location.href='datastructures.php#dictionaries'">Dictionaries</span>
                        <span onclick="window.location.href='datastructures.php#sets'">Sets</span>
                    </div>
                </div>

                <!-- Python Functions Dropdown -->
                <div class="page-dropdown">
                    <span>Python Functions</span>
                    <div class="page-dropdown-content">
                        <span onclick="window.location.href='function.php#defining-functions'">Defining Functions</span>
                        <span onclick="window.location.href='function.php#arguments-return'">Arguments and Return</span>
                        <span onclick="window.location.href='function.php#lambda-functions'">Lambda Functions</span>
                        <span onclick="window.location.href='function.php#recursion'">Recursion</span>
                    </div>
                </div>

                <!-- Python OOP Dropdown -->
                <div class="page-dropdown">
                    <span>Python OOP</span>
                    <div class="page-dropdown-content">
                        <span onclick="window.location.href='oop.php#classes-objects'">Classes and Objects</span>
                        <span onclick="window.location.href='attributes.php'">Attributes and Methods</span>
                        <span onclick="window.location.href='inheritance.php'">Inheritance and Polymorphism</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Start Learning Button -->
        <button class="page-start-learning-btn" onclick="window.location.href='<?php echo htmlspecialchars($btnLink); ?>'">
        <?php echo htmlspecialchars($btnText); ?>
      </button>
    </div>
    <button id="back-to-top" class="btn-back-to-top" onclick="scrollToTop()">↑</button>
    <!-- Footer -->
    <footer class="footerr">
        <p>&copy; 2025 PyByte. All rights reserved.</p> <!--Copyright notice-->
        <div class="contact-info">
            <!--Contact info-->
            <p>Contact Us</p>
            <a href="mailto:pybyte@hotmail.com">pybyte@hotmail.com</a>
    <!--Footer-->        
    </footer>

 
    <script src="script.js"> </script>
      <script>
 // Back to Top button    
window.onscroll = function() {
    let scrollButton = document.getElementById("back-to-top");
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        scrollButton.style.display = "block"; // Show the button
    } else {
        scrollButton.style.display = "none"; // Hide the button
    }
};

function scrollToTop() {
    window.scrollTo({ top: 0, behavior: "smooth" });
}
</script>

</body>
</html>