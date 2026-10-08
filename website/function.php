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

$isCompleted = isTutorialCompleted($userId, $tutorialId);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Functions - PyByte</title> 
    <link rel="stylesheet" href="styles.css">
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
          <!-- Mobile menu button -->
          <div class="menu-toggle" id="mobile-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
          </div>
        </nav>
      </header>
    <!--Explaining functions-->
    <div class="tutorial-page">
        <h1>Functions in Python</h1>
        <p>Functions are reusable blocks of code that perform a specific task. They help you organize your code, avoid repetition, and make your programs easier to understand. In this tutorial, you'll learn how to define and use functions in Python.</p>

        <h2>Defining Functions</h2>
        <p>To define a function, use the <code>def</code> keyword followed by the function name and parentheses. The code inside the function is indented.</p>
        <div class="code-box">
            <span class="keyword">def</span> <span class="function">greet</span><span class="punctuation">():</span><br>
            &nbsp;&nbsp;&nbsp;&nbsp;<span class="function">print</span><span class="punctuation">(</span><span class="string">"Hello, World!"</span><span class="punctuation">)</span>
        </div>
        <p>To call the function, use its name followed by parentheses:</p>
        <div class="code-box">
            <span class="function">greet</span><span class="punctuation">()</span> <span class="comment"># Output: Hello, World!</span>
        </div>

        <h2>Arguments and Return Values</h2>
        <p>Functions can take arguments (inputs) and return values (outputs). Use the <code>return</code> keyword to return a value.</p>
        <div class="code-box">
            <span class="keyword">def</span> <span class="function">add</span><span class="punctuation">(</span><span class="keyword">a</span><span class="punctuation">,</span> <span class="keyword">b</span><span class="punctuation">):</span><br>
            &nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">return</span> <span class="keyword">a</span> <span class="punctuation">+</span> <span class="keyword">b</span><br><br>
            <span class="keyword">result</span> <span class="punctuation">=</span> <span class="function">add</span><span class="punctuation">(</span><span class="number">3</span><span class="punctuation">,</span> <span class="number">5</span><span class="punctuation">)</span><br>
            <span class="function">print</span><span class="punctuation">(</span><span class="keyword">result</span><span class="punctuation">)</span> <span class="comment"># Output: 8</span>
        </div>

        <h2>Lambda Functions</h2>
        <p>Lambda functions are small, anonymous functions defined with the <code>lambda</code> keyword. They are useful for short, one-time operations.</p>
        <div class="code-box">
            <span class="keyword">square</span> <span class="punctuation">=</span> <span class="keyword">lambda</span> <span class="keyword">x</span><span class="punctuation">:</span> <span class="keyword">x</span> <span class="punctuation">*</span> <span class="keyword">x</span><br>
            <span class="function">print</span><span class="punctuation">(</span><span class="function">square</span><span class="punctuation">(</span><span class="number">5</span><span class="punctuation">))</span> <span class="comment"># Output: 25</span>
        </div>

        <h2>Recursion</h2>
        <p>Recursion is a programming technique where a function calls itself to solve a problem. It is particularly useful for problems that can be broken down into smaller, similar subproblems. A recursive function typically consists of two parts:</p>
        <ul>
            <li><strong>Base Case:</strong> The condition under which the recursion stops. Without a base case, the function would call itself indefinitely, leading to a stack overflow error.</li>
            <li><strong>Recursive Case:</strong> The part of the function where it calls itself with a modified input, moving closer to the base case.</li>
        </ul>

        <p>When writing recursive functions, it's important to trust that the function works for smaller inputs (this is often called the "leap of faith"). You don't need to trace every recursive call; instead, focus on defining the base case and ensuring the recursive case moves toward it.</p>

        <h3>Example: Factorial Function</h3>
        <p>The factorial of a number <code>n</code> (denoted as <code>n!</code>) is the product of all positive integers less than or equal to <code>n</code>. The formula for factorial is:</p>
        <p><code>n! = n * (n-1) * (n-2) * ... * 1</code></p>
        <p>For example, <code>5! = 5 * 4 * 3 * 2 * 1 = 120</code>.</p>

        <p>Here's how the factorial function is implemented using recursion:</p>
          <!-- code block example for functions -->
        <div class="code-box">
            <span class="keyword">def</span> <span class="function">factorial</span><span class="punctuation">(</span><span class="keyword">n</span><span class="punctuation">):</span><br>
            &nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">if</span> <span class="keyword">n</span> <span class="punctuation">==</span> <span class="number">1</span><span class="punctuation">:</span> <span class="comment"># Base case</span><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">return</span> <span class="number">1</span><br>
            &nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">else</span><span class="punctuation">:</span> <span class="comment"># Recursive case</span><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">return</span> <span class="keyword">n</span> <span class="punctuation">*</span> <span class="function">factorial</span><span class="punctuation">(</span><span class="keyword">n</span> <span class="punctuation">-</span> <span class="number">1</span><span class="punctuation">)</span><br><br>
            <span class="function">print</span><span class="punctuation">(</span><span class="function">factorial</span><span class="punctuation">(</span><span class="number">5</span><span class="punctuation">))</span> <span class="comment"># Output: 120</span>
        </div>

        <p><strong>Explanation:</strong></p>
        <ul>
            <li>The base case is <code>if n == 1: return 1</code>. This stops the recursion when <code>n</code> reaches 1.</li>
            <li>The recursive case is <code>return n * factorial(n - 1)</code>. Here, the function calls itself with <code>n - 1</code>, reducing the problem size each time.</li>
        </ul>

        <p>Recursion is a powerful tool, but it can be less efficient than iterative solutions for some problems due to the overhead of function calls. However, it often leads to cleaner and more intuitive code for problems that are naturally recursive, such as tree traversals or divide-and-conquer algorithms.</p>

        <!-- Quiz Section -->
        <div class="quiz-section">
            <h3>Test Your Knowledge</h3>
            <form id="quiz-form">
                <div class="question">
                    <p>1. What is the output of the following code?</p>
                    <div class="code-box">
                        <span class="keyword">def</span> <span class="function">multiply</span><span class="punctuation">(</span><span class="keyword">a</span><span class="punctuation">,</span> <span class="keyword">b</span><span class="punctuation">):</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">return</span> <span class="keyword">a</span> <span class="punctuation">*</span> <span class="keyword">b</span><br><br>
                        <span class="function">print</span><span class="punctuation">(</span><span class="function">multiply</span><span class="punctuation">(</span><span class="number">3</span><span class="punctuation">,</span> <span class="number">4</span><span class="punctuation">))</span>
                    </div>
                    <label><input type="radio" name="q1" value="a"> 7</label>
                    <label><input type="radio" name="q1" value="b"> 12</label>
                    <label><input type="radio" name="q1" value="c"> Error</label>
                </div>

                <div class="question">
                    <p>2. What does the <code>lambda</code> keyword do?</p>
                    <label><input type="radio" name="q2" value="a"> Defines a recursive function</label>
                    <label><input type="radio" name="q2" value="b"> Creates an anonymous function</label>
                    <label><input type="radio" name="q2" value="c"> Imports a module</label>
                </div>

                <div class="question">
                    <p>3. What is the base case in the following recursive function?</p>
                    <div class="code-box">
                        <span class="keyword">def</span> <span class="function">factorial</span><span class="punctuation">(</span><span class="keyword">n</span><span class="punctuation">):</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">if</span> <span class="keyword">n</span> <span class="punctuation">==</span> <span class="number">1</span><span class="punctuation">:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">return</span> <span class="number">1</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">else</span><span class="punctuation">:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">return</span> <span class="keyword">n</span> <span class="punctuation">*</span> <span class="function">factorial</span><span class="punctuation">(</span><span class="keyword">n</span> <span class="punctuation">-</span> <span class="number">1</span><span class="punctuation">)</span>
                    </div>
                    <label><input type="radio" name="q3" value="a"> <code>n == 1</code></label>
                    <label><input type="radio" name="q3" value="b"> <code>n * factorial(n - 1)</code></label>
                    <label><input type="radio" name="q3" value="c"> <code>return 1</code></label>
                </div>

                <button type="button" class="submit-btn" onclick="checkQuizFunction()">Submit</button>
            </form>
            <div class="result" id="quiz-result"></div>
        </div>
        <!-- Functions in Python Section -->
<section class="video-section">
    <h3>More About Functions and Recursion</h3>
    
    <!-- Video: Functions in Python -->
    <figure>
        <h4>Video 1: Functions in Python</h4>
        <iframe 
            width="100%" 
            height="400" 
            src="https://www.youtube.com/embed/89cGQjB5R4M?si=4Y71n8ADUZXQod_b" 
            title="YouTube video player: Functions in Python" 
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
            allowfullscreen
            aria-label="Embedded YouTube video: Functions in Python"
        ></iframe>
        <figcaption>
            This video explains how to define and use functions in Python, including parameters, return values, and scope.
        </figcaption>
    </figure>

    <!-- Video: Recursion in Python -->
    <figure>
        <h4>Video 2: Recursion in Python</h4>
        <iframe 
            width="100%" 
            height="400" 
            src="https://www.youtube.com/embed/ivl5-snqul8?si=Upj98jzhNe2ka9Mh" 
            title="YouTube video player: Recursion in Python" 
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
            allowfullscreen
            aria-label="Embedded YouTube video: Recursion in Python"
        ></iframe>
        <figcaption>
            This video explains the concept of recursion in Python, including how to write recursive functions and their use cases.
        </figcaption>
    </figure>

    <!-- Brief Description of Functions and Recursion -->
</section>
<div class="progress-section">
<!-- mark the function tutorial as done -->
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
        <p>Now that you've learned about functions, it's time to explore how to handle errors in Python using <strong>Try-Except blocks</strong>. Check out the next tutorial on <strong>Error Handling (Try-Catch)</strong>.</p>
<a href="error-handling.php" class="btn btn-primary">Next: Error Handling</a>
    </div>
    <button id="back-to-top" class="btn-back-to-top" onclick="scrollToTop()">↑</button>

    <!--Footer-->
    <footer class="footer">
        <p>&copy; 2025 PyByte. All rights reserved.</p> 
    </footer>

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