<?php
session_start();
include("connect.php");
include("progress.php");

//Check login
if (!isset($_SESSION['email'])) {
  header("Location: homepage.html");
  exit();
}

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
    <title>Control Flow - PyByte</title>
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

    <!-- Main Content Section -->
    <div class="tutorial-page">
        <h1>Control Flow in Python</h1>
        <p>Control flow allows you to control the execution of your code based on conditions or loops. In this tutorial, you'll learn about <strong>conditional statements</strong> and <strong>loops</strong> in Python.</p>

        <!-- If-Statements Section -->
        <section id="if-statements">
            <h2>If-Statements</h2>
            <p>Conditional statements allow you to execute code only if certain conditions are met. Python uses <code>if</code>, <code>elif</code>, and <code>else</code> for conditional logic.</p>
            <div class="code-box">
                 <!-- code block example for if statements -->
                <span class="keyword">age</span> <span class="punctuation">=</span> <span class="number">18</span><br><br>
                <span class="keyword">if</span> <span class="keyword">age</span> <span class="punctuation"><</span> <span class="number">18</span><span class="punctuation">:</span><br>
                &nbsp;&nbsp;&nbsp;&nbsp;<span class="function">print</span><span class="punctuation">(</span><span class="string">"You are a minor."</span><span class="punctuation">)</span><br>
                <span class="keyword">elif</span> <span class="keyword">age</span> <span class="punctuation">==</span> <span class="number">18</span><span class="punctuation">:</span><br>
                &nbsp;&nbsp;&nbsp;&nbsp;<span class="function">print</span><span class="punctuation">(</span><span class="string">"You just became an adult!"</span><span class="punctuation">)</span><br>
                <span class="keyword">else</span><span class="punctuation">:</span><br>
                &nbsp;&nbsp;&nbsp;&nbsp;<span class="function">print</span><span class="punctuation">(</span><span class="string">"You are an adult."</span><span class="punctuation">)</span>
            </div>
            <p>In this example:</p>
            <ul>
                <li>If <code>age</code> is less than 18, the first block runs.</li>
                <li>If <code>age</code> is exactly 18, the second block runs.</li>
                <li>Otherwise, the <code>else</code> block runs.</li>
            </ul>
        </section>

        <!-- Loops Section -->
        <section id="loops">
            <h2>Loops</h2>
            <p>Loops allow you to repeat a block of code multiple times. Python supports two types of loops: <code>for</code> and <code>while</code>.</p>

            <h3>For Loop</h3>
            <p>The <code>for</code> loop is used to iterate over a sequence (e.g., a list, string, or range).</p>
            <div class="code-box">
                <span class="keyword">for</span> <span class="keyword">i</span> <span class="keyword">in</span> <span class="function">range</span><span class="punctuation">(</span><span class="number">5</span><span class="punctuation">):</span><br>
                &nbsp;&nbsp;&nbsp;&nbsp;<span class="function">print</span><span class="punctuation">(</span><span class="string">"Iteration:"</span><span class="punctuation">,</span> <span class="keyword">i</span><span class="punctuation">)</span>
            </div>
            <p>This loop runs 5 times, printing the value of <code>i</code> in each iteration.</p>

            <h3>While Loop</h3>
            <p>The <code>while</code> loop repeats a block of code as long as a condition is true.</p>
            <div class="code-box">
                <span class="keyword">count</span> <span class="punctuation">=</span> <span class="number">0</span><br>
                <span class="keyword">while</span> <span class="keyword">count</span> <span class="punctuation"><</span> <span class="number">5</span><span class="punctuation">:</span><br>
                &nbsp;&nbsp;&nbsp;&nbsp;<span class="function">print</span><span class="punctuation">(</span><span class="string">"Count:"</span><span class="punctuation">,</span> <span class="keyword">count</span><span class="punctuation">)</span><br>
                &nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">count</span> <span class="punctuation">+=</span> <span class="number">1</span>
            </div>
            <p>This loop runs until <code>count</code> is no longer less than 5.</p>
        </section>

        <!-- Break and Continue Section -->
        <section id="break-continue">
            <h2>Break and Continue</h2>
            <p>You can use <code>break</code> to exit a loop early and <code>continue</code> to skip the rest of the current iteration.</p>
            <div class="code-box">
                <span class="keyword">for</span> <span class="keyword">i</span> <span class="keyword">in</span> <span class="function">range</span><span class="punctuation">(</span><span class="number">10</span><span class="punctuation">):</span><br>
                &nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">if</span> <span class="keyword">i</span> <span class="punctuation">==</span> <span class="number">5</span><span class="punctuation">:</span><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">break</span> <span class="comment"># Exit the loop when i is 5</span><br>
                &nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">if</span> <span class="keyword">i</span> <span class="punctuation">%</span> <span class="number">2</span> <span class="punctuation">==</span> <span class="number">0</span><span class="punctuation">:</span><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">continue</span> <span class="comment"># Skip even numbers</span><br>
                &nbsp;&nbsp;&nbsp;&nbsp;<span class="function">print</span><span class="punctuation">(</span><span class="string">"Odd:"</span><span class="punctuation">,</span> <span class="keyword">i</span><span class="punctuation">)</span>
            </div>
        </section>

        <!-- Quiz Section -->
        <div class="quiz-section">
            <h3>Test Your Knowledge</h3>
            <form id="quiz-form">
                <div class="question">
                    <p>1. What is the output of the following code?</p>
                    <div class="code-box">
                        <span class="keyword">x</span> <span class="punctuation">=</span> <span class="number">10</span><br>
                        <span class="keyword">if</span> <span class="keyword">x</span> <span class="punctuation">></span> <span class="number">5</span><span class="punctuation">:</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="function">print</span><span class="punctuation">(</span><span class="string">"Hello"</span><span class="punctuation">)</span>
                    </div>
                    <label><input type="radio" name="q1" value="a"> Hello</label>
                    <label><input type="radio" name="q1" value="b"> Nothing</label>
                    <label><input type="radio" name="q1" value="c"> Error</label>
                </div>

                <div class="question">
                    <p>2. How many times will the following loop run?</p>
                    <div class="code-box">
                        <span class="keyword">for</span> <span class="keyword">i</span> <span class="keyword">in</span> <span class="function">range</span><span class="punctuation">(</span><span class="number">3</span><span class="punctuation">):</span><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="function">print</span><span class="punctuation">(</span><span class="string">"Loop"</span><span class="punctuation">)</span>
                    </div>
                    <label><input type="radio" name="q2" value="a"> 2</label>
                    <label><input type="radio" name="q2" value="b"> 3</label>
                    <label><input type="radio" name="q2" value="c"> 4</label>
                </div>

                <div class="question">
                    <p>3. What does the <code>break</code> statement do?</p>
                    <label><input type="radio" name="q3" value="a"> Skips the current iteration</label>
                    <label><input type="radio" name="q3" value="b"> Exits the loop</label>
                    <label><input type="radio" name="q3" value="c"> Restarts the loop</label>
                </div>

                <button type="button" class="submit-btn" onclick="checkQuizContolFlow()">Submit</button>
            </form>
            <div class="result" id="quiz-result"></div>
        </div>
        <!-- Video Section -->
<section class="video-section">
    <h3>For Extra Information, Check These Videos</h3>
    
    <!-- First Video -->
    <figure>
        <h4>Video 1: Conditional Statements in Python</h4>
        <iframe 
            width="100%" 
            height="400" 
            src="https://www.youtube.com/embed/q0bQrGhdPm4?si=_KDlXTSHlPIhL2u9" 
            title="YouTube video player: Control Flow in Python" 
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
            allowfullscreen
            aria-label="Embedded YouTube video: Control Flow in Python"
        ></iframe>
        <figcaption>
            This video explains if-elif-else statements in Python.
        </figcaption>
    </figure>

    <!-- Second Video -->
    <figure>
        <h4>Video 2: While Loops</h4>
        <iframe 
            width="100%" 
            height="400" 
            src="https://www.youtube.com/embed/KsiWTrZQFXg?si=wC2b-qzN03Mm-Gq0" 
            title="YouTube video player: Advanced Control Flow Techniques" 
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
            allowfullscreen
            aria-label="Embedded YouTube video: Advanced Control Flow Techniques"
        ></iframe>
        <figcaption>
            This video explains while loops in Python.
        </figcaption>
    </figure>

    <!-- Third Video -->
    <figure>
        <h4>Video 3: for Loops Explained</h4>
        <iframe 
            width="100%" 
            height="400" 
            src="https://www.youtube.com/embed/QpLf-0MfAgc?si=60RGpL3r8pH1Kngp" 
            title="YouTube video player: Python Loops Explained" 
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
            allowfullscreen
            aria-label="Embedded YouTube video: Python Loops Explained"
        ></iframe>
        <figcaption>
            This video provides a detailed explanation of for loops in Python.
        </figcaption>
    </figure>
</section>
<!-- mark the control-flow tutorial as done -->
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

        <!-- Updated Next Steps Section -->
        <div class="note">
            <h2>Congratulations! 🎉</h2>
            <p>You've reached the end of this tutorial on Basic Python. By now, you should have a solid understanding of:</p>
            <ul>
                <li>Variables and Data Types</li>
                <li>  Conditional Statements (If-Else)</li>
                <li>Loops</li>
            </ul>
            <p>Keep practicing and exploring more advanced Python concepts to become a Python pro!</p>
            <a href="datastructures.php" class="btn btn-primary">Continue to Intermediate Level </a>
        </div>
    </div>
    <button id="back-to-top" class="btn-back-to-top" onclick="scrollToTop()">↑</button>

    <!-- Footer Section -->
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