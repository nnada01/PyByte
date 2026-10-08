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

// Handle the “mark as done” submission
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

// Check if already completed
$isCompleted = isTutorialCompleted($userId, $tutorialId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classes and Objects - PyByte</title>
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
          <!--Mobile menu button -->
          <div class="menu-toggle" id="mobile-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
          </div>
        </nav>
      </header>

    <!-- Main Content -->
    <div class="tutorial-page">
        <h1>Classes and Objects in Python</h1>
        <p>Object-Oriented Programming (OOP) is a programming paradigm that uses <strong>classes</strong> and <strong>objects</strong> to structure software. A <strong>class</strong> is a blueprint for creating objects, and an <strong>object</strong> is an instance of a class. In this tutorial, you'll learn how to define classes and create objects in Python.</p>

        <!-- What is a Class? Section -->
        <section id="what-is-a-class">
            <h2>What is a Class?</h2>
            <p>A class is a template or blueprint for creating objects. It defines the properties (attributes) and behaviors (methods) that the objects created from the class will have.</p>
            <div class="code-box">
                <span class="keyword">class</span> <span class="function">Dog</span><span class="punctuation">:</span><br>
                &nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">pass</span>
            </div>
            <p>In the example above, <code>Dog</code> is a class. However, it doesn't do anything yet because it has no attributes or methods.</p>
        </section>

        <!-- Creating Objects Section -->
        <section id="creating-objects">
            <h2>Creating Objects</h2>
            <p>An object is an instance of a class. You can create an object by calling the class as if it were a function.</p>
            <div class="code-box">
                <span class="keyword">my_dog</span> <span class="punctuation">=</span> <span class="function">Dog</span><span class="punctuation">()</span><br>
                <span class="function">print</span><span class="punctuation">(</span><span class="function">type</span><span class="punctuation">(</span><span class="keyword">my_dog</span><span class="punctuation">))</span> <span class="comment"># Output: &lt;class '__main__.Dog'&gt;</span>
            </div>
            <p>Here, <code>my_dog</code> is an object of the <code>Dog</code> class.</p>
        </section>

        <!-- The __init__ Method Section -->
        <section id="init-method">
            <h2>The <code>__init__</code> Method</h2>
            <p>The <code>__init__</code> method is a special method in Python classes. It is called when an object is created and is used to initialize the object's attributes.</p>
            <div class="code-box">
                 <!-- code block example for oop -->
                <span class="keyword">class</span> <span class="function">Dog</span><span class="punctuation">:</span><br>
                &nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">def</span> <span class="function">__init__</span><span class="punctuation">(</span><span class="keyword">self</span><span class="punctuation">,</span> <span class="keyword">name</span><span class="punctuation">,</span> <span class="keyword">age</span><span class="punctuation">):</span><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">self</span><span class="punctuation">.</span><span class="keyword">name</span> <span class="punctuation">=</span> <span class="keyword">name</span><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">self</span><span class="punctuation">.</span><span class="keyword">age</span> <span class="punctuation">=</span> <span class="keyword">age</span><br><br>
                <span class="keyword">my_dog</span> <span class="punctuation">=</span> <span class="function">Dog</span><span class="punctuation">(</span><span class="string">"Buddy"</span><span class="punctuation">,</span> <span class="number">3</span><span class="punctuation">)</span><br>
                <span class="function">print</span><span class="punctuation">(</span><span class="string">f"</span><span class="keyword">{my_dog.name}</span><span class="string"> is </span><span class="keyword">{my_dog.age}</span><span class="string"> years old."</span><span class="punctuation">)</span> <span class="comment"># Output: Buddy is 3 years old.</span>
            </div>
            <p>In this example, the <code>__init__</code> method initializes the <code>name</code> and <code>age</code> attributes of the <code>Dog</code> class.</p>
        </section>

        <!-- Quiz Section -->
        <div class="quiz-section">
            <h3>Test Your Knowledge</h3>
            <form id="quiz-form">
                <div class="question">
                    <p>1. What is a class in Python?</p>
                    <label><input type="radio" name="q1" value="a"> A function that returns a value</label>
                    <label><input type="radio" name="q1" value="b"> A blueprint for creating objects</label>
                    <label><input type="radio" name="q1" value="c"> A built-in data type</label>
                </div>

                <div class="question">
                    <p>2. What is the purpose of the <code>__init__</code> method?</p>
                    <label><input type="radio" name="q2" value="a"> To destroy an object</label>
                    <label><input type="radio" name="q2" value="b"> To initialize an object's attributes</label>
                    <label><input type="radio" name="q2" value="c"> To import a module</label>
                </div>

                <div class="question">
                    <p>3. What will the following code output?</p>
                    <div class="code-box">
                        <span class="keyword">class</span> <span class="function">Car</span><span class="punctuation">:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">def</span> <span class="function">__init__</span><span class="punctuation">(</span><span class="keyword">self</span><span class="punctuation">,</span> <span class="keyword">brand</span><span class="punctuation">):</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">self</span><span class="punctuation">.</span><span class="keyword">brand</span> <span class="punctuation">=</span> <span class="keyword">brand</span><br><br>
                        <span class="keyword">my_car</span> <span class="punctuation">=</span> <span class="function">Car</span><span class="punctuation">(</span><span class="string">"Toyota"</span><span class="punctuation">)</span><br>
                        <span class="function">print</span><span class="punctuation">(</span><span class="keyword">my_car</span><span class="punctuation">.</span><span class="keyword">brand</span><span class="punctuation">)</span>
                    </div>
                    <label><input type="radio" name="q3" value="a"> Toyota</label>
                    <label><input type="radio" name="q3" value="b"> Car</label>
                    <label><input type="radio" name="q3" value="c"> Error</label>
                </div>

                <button type="button" class="submit-btn" onclick="checkQuizOOP()">Submit</button>
            </form>
            <div class="result" id="quiz-result"></div>
        </div>
<!-- Classes and Self in Python Section -->
<section class="video-section">
    <h3>Classes and Self in Python</h3>
    
    <!-- Video: Classes in Python -->
    <figure>
        <h4>Video 1: Classes in Python</h4>
        <iframe 
    width="100%" 
    height="400" 
    src="https://www.youtube.com/embed/ZDa-Z5JzLYM?si=IjFLA9LAvdC5mAQi" 
    title="YouTube video player: Classes in Python" 
    frameborder="0" 
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
    allowfullscreen
    aria-label="Embedded YouTube video: Classes in Python"
></iframe>
        <figcaption>
            This video explains how to define and use classes in Python, including attributes, methods, and object-oriented programming concepts.
        </figcaption>
    </figure>

    <!-- Video: Self in Python -->
    <figure>
        <h4>Video 2: Self in Python</h4>
        <iframe 
            width="100%" 
            height="400" 
            src="https://www.youtube.com/embed/JH4q65dZPvY?si=bM-i7o_dJgXjkuBS" 
            title="YouTube video player: Self in Python" 
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
            allowfullscreen
            aria-label="Embedded YouTube video: Self in Python"
        ></iframe>
        <figcaption>
            This video explains the concept of <code>self</code> in Python classes and how it is used to access instance attributes and methods.
        </figcaption>
    </figure>

    <!-- Brief Description of Classes and Self -->
    <div class="classes-info">
        <h4>Key Concepts in Classes and Self</h4>
        <ul>
            <li><strong>Classes</strong>: A blueprint for creating objects. Defined using the <code>class</code> keyword.</li>
            <li><strong>Attributes</strong>: Variables that belong to a class or instance. Example: <code>self.name = name</code></li>
            <li><strong>Methods</strong>: Functions that belong to a class. Example: <code>def greet(self):</code></li>
            <li><strong>Self</strong>: A reference to the current instance of the class, used to access its attributes and methods.</li>
        </ul>
    </div>
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
        <h2>Next Steps</h2>
        <p>Now that you've learned about classes and objects, the next step is to explore <strong>attributes and methods</strong> in more detail. Check out the next tutorial to dive deeper into OOP!</p>
        <a href="attributes.php" class="btn btn-primary">Next: Attributes and Methods</a>
    </div>
    <button id="back-to-top" class="btn-back-to-top" onclick="scrollToTop()">↑</button>
    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 PyByte. All rights reserved.</p> 
    </footer>
    <!-- Link to external JavaScript -->
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