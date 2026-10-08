<?php
session_start();
include("connect.php");
include("progress.php");

//Check login
if (!isset($_SESSION['email'])) {
  header("Location: homepage.html");
  exit();
}

//Lookup user ID
$email     = $_SESSION['email'];
$userQuery = mysqli_query($conn, "SELECT Id FROM users WHERE email='$email'");
$userRow   = mysqli_fetch_assoc($userQuery);
$userId    = $userRow['Id'];
$tutorialId = basename($_SERVER['PHP_SELF'], '.php');

//Handle the “mark as done” submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mark_done'])) {
  markTutorialCompleted($userId, $tutorialId);

  // AJAX return JSON
  if (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])
      && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'
  ) {
    header('Content-Type: application/json');
    echo json_encode(['success' => true]);
    exit;
  }

  header("Location: " . $_SERVER['PHP_SELF']);
  exit;
}

//Check if already completed
$isCompleted = isTutorialCompleted($userId, $tutorialId);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introduction to Python - PyByte</title>
    <!-- Link to external CSS for styling -->
    <link rel="stylesheet" href="styles.css">
    <!-- Link to Font Awesome library for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <header>
        <nav class="navbar">
          <a href="homepage2.php" class="logo">PyByte</a>
          <ul class="nav-links" id="nav-links">
            <li><a href="homepage2.php">Home</a></li>
            <li><a href="tutorials.php">Tutorials</a></li>
            <li><a href="exercises.php">Exercises</a></li>
            <li><a href="profile.php">Profile</a></li>
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
    <div class="tutorial-page">
       <!--Inroduction section-->
        <h1>Introduction to Python</h1>
        <p>Python is a high-level, interpreted programming language known for its simplicity and readability. It is widely used in web development, data science, automation, and more. In this tutorial, you'll learn the basics of Python and write your first program.</p>
        <img src="anim.png" alt="Python Programming Illustration" class="top-image">
        <h2>What is Python?</h2>
        <p>Python is a versatile programming language created by Guido van Rossum in 1991. It emphasizes code readability and allows developers to express concepts in fewer lines of code compared to other languages.</p>

        <h2>Why Learn Python?</h2>
        <ul>
            <li><strong>Easy to Learn:</strong> Python's syntax is simple and intuitive, making it perfect for beginners.</li>
            <li><strong>Versatile:</strong> Python is used in web development, data analysis, artificial intelligence, and more.</li>
            <li><strong>Large Community:</strong> Python has a vast community of developers who contribute to its libraries and frameworks.</li>
        </ul>
        <!--Installing python help-->
        <h2>Installing Python</h2>
        <p>To get started with Python, you'll need to install it on your computer. Follow these steps:</p>
        <ol>
            <li>Visit the official Python website: <a href="https://www.python.org" target="_blank">python.org</a>.</li>
            <li>Download the latest version of Python for your operating system.</li>
            <li>Run the installer and follow the on-screen instructions.</li>
            <li>Verify the installation by opening a terminal and typing <code>python --version</code>.</li>
        </ol>

        <div class="note">
            <strong>Note:</strong> Python comes pre-installed on most Linux and macOS systems. You can check if it's installed by running <code>python3 --version</code> in the terminal.
        </div>
        <!--Hello world example-->
        <h2>Your First Python Program</h2>
        <p>Let's write a simple Python program to print "Hello, World!" to the screen.</p>
        <div class="code-box">
            <span class="function">print</span><span class="punctuation">(</span><span class="string">"Hello, World!"</span><span class="punctuation">)</span>
        </div>
        <p>This program uses the <code>print()</code> function to display text on the screen. It's a great way to get started with Python!</p>
<!-- More Info About Python Section -->
<section class="video-section">
    <h3> For More Info About Python</h3>
    
    <!-- Video: What You Can Do with Python -->
    <figure>
        <h4>Video 1: Introduction to Python</h4>
        <iframe 
            width="100%" 
            height="400" 
            src="https://www.youtube.com/embed/xkZMUX_oQX4?si=SQFwS0UJTThelJgN" 
            title="YouTube video player: What You Can Do with Python" 
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
            allowfullscreen
            aria-label="Embedded YouTube video: What You Can Do with Python"
        ></iframe>
        <figcaption>
            This video explains why Python is a powerful programming language and what you can do with it.
        </figcaption>
    </figure>
</section>
<!-- mark the attribute tutorial as done -->
<div class="progress-section">
      <?php if ($isCompleted): ?>
        <p class="completed-message">✅ You've completed this tutorial!</p>
      <?php else: ?>
        <form id="mark-done-form" method="post">
          <input type="hidden" name="mark_done" value="1">
          <button type="submit" class="btn btn-primary">Mark as Done</button>
        </form>
      <?php endif; ?>
    </div>
        <!--Next steps section-->
        <h2>Next Steps</h2>
        <p>Now that you've written your first Python program, it's time to dive deeper. Check out the next tutorial on <strong>Python Basics</strong> to learn about variables, data types, and more.</p>
        <a href="python-basics.php" class="btn btn-primary">Next: Python Basics</a>
    </div>
    <!--Footer-->
    <footer class="footer">
        <p>&copy; 2025 PyByte. All rights reserved.</p> <!--Copyright notice-->
    </footer>
    <button id="back-to-top" class="btn-back-to-top" onclick="scrollToTop()">↑</button>
<!--Link for external Javascript-->
<script src="script.js"></script>
<script>
  // Handle form submission with AJAX to mark the tutorial as completed without page reload
    document.getElementById('mark-done-form')?.addEventListener('submit', function(e) {
      e.preventDefault();
      const xhr = new XMLHttpRequest();
      xhr.open('POST', location.href, true);
      xhr.setRequestHeader('X-Requested-With','XMLHttpRequest');
      xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
      xhr.onload = () => {
        if (xhr.status === 200 && JSON.parse(xhr.responseText).success) {
          document.querySelector('.progress-section').innerHTML =
            '<p class="completed-message">✅ You\'ve completed this tutorial!</p>';
        }
      };
      xhr.send('mark_done=1');
    });

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