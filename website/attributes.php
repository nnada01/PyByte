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

$isCompleted = isTutorialCompleted($userId, $tutorialId);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attributes and Methods - PyByte</title>
    <link rel="stylesheet" href="styles.css">
        <!-- Link to Font Awesome library for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <header>
      <!-- navigation menu -->
        <nav class="navbar">
          <a href="homepage2.php" class="logo">PyByte</a>
          <ul class="nav-links" id="nav-links">
          <li><a href="homepage2.php"> Home</a></li>
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

    <!-- Main Content Section -->
    <div class="tutorial-page">
        <h1>Attributes and Methods in Python</h1>
        <p>In Object-Oriented Programming (OOP), <strong>attributes</strong> are variables that belong to an object, and <strong>methods</strong> are functions that belong to an object. In this tutorial, you'll learn how to define and use attributes and methods in Python classes.</p>

        <!-- Attributes Section -->
        <section id="attributes">
            <h2>Attributes</h2>
            <p>Attributes are variables that store data about an object. They are defined inside the <code>__init__</code> method or directly in the class.</p>
            <!-- code block example for attributes -->
            <div class="code-box">
                <span class="keyword">class</span> <span class="function">Dog</span><span class="punctuation">:</span><br>
                &nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">def</span> <span class="function">__init__</span><span class="punctuation">(</span><span class="keyword">self</span><span class="punctuation">,</span> <span class="keyword">name</span><span class="punctuation">,</span> <span class="keyword">age</span><span class="punctuation">):</span><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">self</span><span class="punctuation">.</span><span class="keyword">name</span> <span class="punctuation">=</span> <span class="keyword">name</span> <span class="comment"># Attribute</span><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">self</span><span class="punctuation">.</span><span class="keyword">age</span> <span class="punctuation">=</span> <span class="keyword">age</span> <span class="comment"># Attribute</span><br><br>
                <span class="keyword">my_dog</span> <span class="punctuation">=</span> <span class="function">Dog</span><span class="punctuation">(</span><span class="string">"Buddy"</span><span class="punctuation">,</span> <span class="number">3</span><span class="punctuation">)</span><br>
                <span class="function">print</span><span class="punctuation">(</span><span class="string">f"</span><span class="keyword">{my_dog.name}</span><span class="string"> is </span><span class="keyword">{my_dog.age}</span><span class="string"> years old."</span><span class="punctuation">)</span> <span class="comment"># Output: Buddy is 3 years old.</span>
            </div>
            <p>In this example, <code>name</code> and <code>age</code> are attributes of the <code>Dog</code> class.</p>
        </section>

       
        <section id="methods">
            <h2>Methods</h2>
            <p>Methods are functions that belong to a class. They define the behavior of an object. Methods are defined using the <code>def</code> keyword inside the class.</p>
            <div class="code-box">
              <!-- code block example for methods -->
                <span class="keyword">class</span> <span class="function">Dog</span><span class="punctuation">:</span><br>
                &nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">def</span> <span class="function">__init__</span><span class="punctuation">(</span><span class="keyword">self</span><span class="punctuation">,</span> <span class="keyword">name</span><span class="punctuation">,</span> <span class="keyword">age</span><span class="punctuation">):</span><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">self</span><span class="punctuation">.</span><span class="keyword">name</span> <span class="punctuation">=</span> <span class="keyword">name</span><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">self</span><span class="punctuation">.</span><span class="keyword">age</span> <span class="punctuation">=</span> <span class="keyword">age</span><br><br>
                &nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">def</span> <span class="function">bark</span><span class="punctuation">(</span><span class="keyword">self</span><span class="punctuation">):</span> <span class="comment"># Method</span><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="function">print</span><span class="punctuation">(</span><span class="string">f"</span><span class="keyword">{self.name}</span><span class="string"> is barking!"</span><span class="punctuation">)</span><br><br>
                <span class="keyword">my_dog</span> <span class="punctuation">=</span> <span class="function">Dog</span><span class="punctuation">(</span><span class="string">"Buddy"</span><span class="punctuation">,</span> <span class="number">3</span><span class="punctuation">)</span><br>
                <span class="function">my_dog</span><span class="punctuation">.</span><span class="function">bark</span><span class="punctuation">()</span> <span class="comment"># Output: Buddy is barking!</span>
            </div>
            <p>In this example, <code>bark</code> is a method of the <code>Dog</code> class.</p>
        </section>

        <!-- Quiz Section -->
        <div class="quiz-section">
            <h3>Test Your Knowledge</h3>
            <form id="quiz-form">
                <div class="question">
                    <p>1. What are attributes in a class?</p>
                    <label><input type="radio" name="q1" value="a"> Functions that belong to a class</label>
                    <label><input type="radio" name="q1" value="b"> Variables that store data about an object</label>
                    <label><input type="radio" name="q1" value="c"> Built-in Python functions</label>
                </div>

                <div class="question">
                    <p>2. What is the purpose of methods in a class?</p>
                    <label><input type="radio" name="q2" value="a"> To store data about an object</label>
                    <label><input type="radio" name="q2" value="b"> To define the behavior of an object</label>
                    <label><input type="radio" name="q2" value="c"> To import modules</label>
                </div>

                <div class="question">
                    <p>3. What will the following code output?</p>
                    <div class="code-box">
                        <span class="keyword">class</span> <span class="function">Car</span><span class="punctuation">:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">def</span> <span class="function">__init__</span><span class="punctuation">(</span><span class="keyword">self</span><span class="punctuation">,</span> <span class="keyword">brand</span><span class="punctuation">):</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">self</span><span class="punctuation">.</span><span class="keyword">brand</span> <span class="punctuation">=</span> <span class="keyword">brand</span><br><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">def</span> <span class="function">display</span><span class="punctuation">(</span><span class="keyword">self</span><span class="punctuation">):</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="function">print</span><span class="punctuation">(</span><span class="string">f"Brand: </span><span class="keyword">{self.brand}</span><span class="string">"</span><span class="punctuation">)</span><br><br>
                        <span class="keyword">my_car</span> <span class="punctuation">=</span> <span class="function">Car</span><span class="punctuation">(</span><span class="string">"Toyota"</span><span class="punctuation">)</span><br>
                        <span class="function">my_car</span><span class="punctuation">.</span><span class="function">display</span><span class="punctuation">()</span>
                    </div>
                    <label><input type="radio" name="q3" value="a"> Toyota</label>
                    <label><input type="radio" name="q3" value="b"> Brand: Toyota</label>
                    <label><input type="radio" name="q3" value="c"> Error</label>
                </div>

                <button type="button" class="submit-btn" onclick="checkQuizAttributes()">Submit</button>
            </form>
            <div class="result" id="quiz-result"></div>
        </div>
<!-- Class Methods in Python Section -->
<section class="video-section">
    <h3>Class Methods in Python</h3>
    
    <!-- Video: Class Methods in Python -->
    <figure>
        <h4>Video: Class Methods in Python</h4>
        <iframe 
            width="100%" 
            height="400" 
            src="https://www.youtube.com/embed/g-qRKZD3FgE?si=2BO6zkW8LwU8sWT4" 
            title="YouTube video player: Class Methods in Python" 
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
            allowfullscreen
            aria-label="Embedded YouTube video: Class Methods in Python"
        ></iframe>
        <figcaption>
            This video explains how to define and use class methods in Python.
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

        <!-- Next Steps section -->
        <h2>Next Steps</h2>
        <p>Now that you've learned about attributes and methods, the next step is to explore <strong>inheritance and polymorphism</strong>. Check out the next tutorial to dive deeper into OOP!</p>
        <a href="inheritance.php" class="btn btn-primary">Next: Inheritance and Polymorphism</a>
    </div>
    <button id="back-to-top" class="btn-back-to-top" onclick="scrollToTop()">↑</button>


    <!--Footer-->
    <footer class="footer">
        <p>&copy; 2025 PyByte. All rights reserved.</p> 
    </footer>
    <!--Link for javascript-->
    <script src="script.js"> </script>

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
        scrollButton.style.display = "block"; 
    } else {
        scrollButton.style.display = "none"; 
    }
};

function scrollToTop() {
    window.scrollTo({ top: 0, behavior: "smooth" });
}
</script>
</body>
</html>