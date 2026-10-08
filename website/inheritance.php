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
$email= $_SESSION['email'];
$userQuery= mysqli_query($conn, "SELECT Id FROM users WHERE email='$email'");
$userRow= mysqli_fetch_assoc($userQuery);
$userId= $userRow['Id'];

$tutorialId = basename($_SERVER['PHP_SELF'], '.php');

//Handle the “mark as done” submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mark_done'])) {
  markTutorialCompleted($userId, $tutorialId);

  // AJAX  return JSON
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
    <title>Inheritance and Polymorphism - PyByte</title>
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

    <!-- Main Content -->
    <div class="tutorial-page">
        <h1>Inheritance and Polymorphism in Python</h1>
        <p>Inheritance and polymorphism are two key concepts in Object-Oriented Programming (OOP). <strong>Inheritance</strong> allows a class to inherit attributes and methods from another class, while <strong>polymorphism</strong> allows objects of different classes to be treated as objects of a common superclass. In this tutorial, you'll learn how to use inheritance and polymorphism in Python.</p>

        <!-- Inheritance Section -->
        <section id="inheritance">
            <h2>Inheritance</h2>
            <p>Inheritance allows a class (called the <strong>child class</strong>) to inherit attributes and methods from another class (called the <strong>parent class</strong>). This promotes code reuse and makes programs easier to maintain.</p>
            <div class="code-box">
                <span class="keyword">class</span> <span class="function">Animal</span><span class="punctuation">:</span><br>
                &nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">def</span> <span class="function">__init__</span><span class="punctuation">(</span><span class="keyword">self</span><span class="punctuation">,</span> <span class="keyword">name</span><span class="punctuation">):</span><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">self</span><span class="punctuation">.</span><span class="keyword">name</span> <span class="punctuation">=</span> <span class="keyword">name</span><br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">def</span> <span class="function">speak</span><span class="punctuation">(</span><span class="keyword">self</span><span class="punctuation">):</span><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="function">print</span><span class="punctuation">(</span><span class="string">f"</span><span class="keyword">{self.name}</span><span class="string"> makes a sound."</span><span class="punctuation">)</span><br><br>
                <span class="keyword">class</span> <span class="function">Dog</span><span class="punctuation">(</span><span class="function">Animal</span><span class="punctuation">):</span><br>
                &nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">def</span> <span class="function">speak</span><span class="punctuation">(</span><span class="keyword">self</span><span class="punctuation">):</span><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="function">print</span><span class="punctuation">(</span><span class="string">f"</span><span class="keyword">{self.name}</span><span class="string"> barks!"</span><span class="punctuation">)</span><br><br>
                <span class="keyword">my_dog</span> <span class="punctuation">=</span> <span class="function">Dog</span><span class="punctuation">(</span><span class="string">"Buddy"</span><span class="punctuation">)</span><br>
                <span class="function">my_dog</span><span class="punctuation">.</span><span class="function">speak</span><span class="punctuation">()</span> <span class="comment"># Output: Buddy barks!</span>
            </div>
            <p>In this example, the <code>Dog</code> class inherits from the <code>Animal</code> class and overrides the <code>speak</code> method.</p>
        </section>

        <!-- Polymorphism Section -->
        <section id="polymorphism">
            <h2>Polymorphism</h2>
            <p>Polymorphism allows objects of different classes to be treated as objects of a common superclass. This is particularly useful when you want to perform the same operation on objects of different classes.</p>
            <div class="code-box">
              <!-- code block example for polymorphism -->
                <span class="keyword">class</span> <span class="function">Cat</span><span class="punctuation">(</span><span class="function">Animal</span><span class="punctuation">):</span><br>
                &nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">def</span> <span class="function">speak</span><span class="punctuation">(</span><span class="keyword">self</span><span class="punctuation">):</span><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="function">print</span><span class="punctuation">(</span><span class="string">f"</span><span class="keyword">{self.name}</span><span class="string"> meows!"</span><span class="punctuation">)</span><br><br>
                <span class="keyword">my_cat</span> <span class="punctuation">=</span> <span class="function">Cat</span><span class="punctuation">(</span><span class="string">"Whiskers"</span><span class="punctuation">)</span><br>
                <span class="function">my_cat</span><span class="punctuation">.</span><span class="function">speak</span><span class="punctuation">()</span> <span class="comment"># Output: Whiskers meows!</span>
            </div>
            <p>In this example, both <code>Dog</code> and <code>Cat</code> are subclasses of <code>Animal</code>, and they both implement the <code>speak</code> method differently.</p>
        </section>

        <!-- Quiz Section -->
        <div class="quiz-section">
            <h3>Test Your Knowledge</h3>
            <form id="quiz-form">
                <div class="question">
                    <p>1. What is inheritance in Python?</p>
                    <label><input type="radio" name="q1" value="a"> A way to hide attributes and methods</label>
                    <label><input type="radio" name="q1" value="b"> A way for a class to inherit attributes and methods from another class</label>
                    <label><input type="radio" name="q1" value="c"> A way to create multiple objects</label>
                </div>

                <div class="question">
                    <p>2. What is polymorphism in Python?</p>
                    <label><input type="radio" name="q2" value="a"> A way to create multiple objects</label>
                    <label><input type="radio" name="q2" value="b"> A way to treat objects of different classes as objects of a common superclass</label>
                    <label><input type="radio" name="q2" value="c"> A way to hide attributes and methods</label>
                </div>

                <div class="question">
                    <p>3. What will the following code output?</p>
                    <div class="code-box">
                        <span class="keyword">class</span> <span class="function">Bird</span><span class="punctuation">(</span><span class="function">Animal</span><span class="punctuation">):</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">def</span> <span class="function">speak</span><span class="punctuation">(</span><span class="keyword">self</span><span class="punctuation">):</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="function">print</span><span class="punctuation">(</span><span class="string">f"</span><span class="keyword">{self.name}</span><span class="string"> chirps!"</span><span class="punctuation">)</span><br><br>
                        <span class="keyword">my_bird</span> <span class="punctuation">=</span> <span class="function">Bird</span><span class="punctuation">(</span><span class="string">"Tweety"</span><span class="punctuation">)</span><br>
                        <span class="function">my_bird</span><span class="punctuation">.</span><span class="function">speak</span><span class="punctuation">()</span>
                    </div>
                    <label><input type="radio" name="q3" value="a"> Tweety makes a sound.</label>
                    <label><input type="radio" name="q3" value="b"> Tweety chirps!</label>
                    <label><input type="radio" name="q3" value="c"> Error</label>
                </div>

                <button type="button" class="submit-btn" onclick="checkQuizInheritance()">Submit</button>
            </form>
            <div class="result" id="quiz-result"></div>
        </div>
<!-- Inheritance and Polymorphism in Python Section -->
<section class="video-section">
    <h3> For More Inheritance and Polymorphism:</h3>
    
    <!-- Video: Inheritance in Python -->
    <figure>
        <h4>Video 1: Inheritance in Python</h4>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/RSl87lqOXDE?si=PYFksUvzXaEquXPb" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        <figcaption>
            This video explains how inheritance works in Python, including how to create subclasses and override methods.
        </figcaption>
    </figure>

    <!-- Video: Polymorphism in Python -->
    <figure>
        <h4>Video 2: Polymorphism in Python</h4>
        <iframe 
            width="100%" 
            height="400" 
            src="https://www.youtube.com/embed/tHN8I_4FIt8?si=ELLBPlcUrQQCwQoR" 
            title="YouTube video player: Polymorphism in Python" 
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
            allowfullscreen
            aria-label="Embedded YouTube video: Polymorphism in Python"
        ></iframe>
        <figcaption>
            This video explains the concept of polymorphism in Python, including method overriding and duck typing.
        </figcaption>
    </figure>

    <!-- Brief Description of Inheritance and Polymorphism -->
</section>
<div class="progress-section">
  <!-- mark the attribute tutorial as done -->
      <?php if ($isCompleted): ?>
        <p class="completed-message">✅ You've completed this tutorial!</p>
      <?php else: ?>
        <form id="mark-done-form" method="post">
          <input type="hidden" name="mark_done" value="1">
          <button type="submit" class="btn btn-primary">Mark as Done</button>
        </form>
      <?php endif; ?>
    </div>
        <!-- Congratulations Section -->
        <div class="note">
            <h2>Congratulations! 🎉</h2>
            <p>You've reached the end of this tutorial on Object-Oriented Programming in Python. By now, you should have a solid understanding of:</p>
            <ul>
                <li>Classes and Objects</li>
                <li>Attributes and Methods</li>
                <li>Inheritance and Polymorphism</li>
            </ul>
            <p>Keep practicing and exploring more advanced OOP concepts to become a Python pro!</p>
            <a href="homepage2.php" class="btn btn-primary">Return to Homepage</a>
        </div>
    </div>
    <button id="back-to-top" class="btn-back-to-top" onclick="scrollToTop()">↑</button>
    <!--Footer-->
    <footer class="footer">
        <p>&copy; 2025 PyByte. All rights reserved.</p> 
    </footer>
    <!-- Link to external JavaScript -->
    <script src="script.js">
    </script>
    
    
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