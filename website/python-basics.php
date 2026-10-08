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
    <title>Python Basics - PyByte</title>
    <!-- Link to external CSS for styling -->
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <!-- navigation menu -->
          <a href="homepage2.php" class="logo">PyByte</a>
          <ul class="nav-links" id="nav-links">
            <li><a href="homepage2.php">Home</a></li>
            <li><a href="tutorials.php">Tutorials</a></li>
            <li><a href="exercises.php">Exercises</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="logout.php" class="btn btn-logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
          </ul>
          <!-- Mobile menu toggle -->
          <div class="menu-toggle" id="mobile-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
          </div>
        </nav>
      </header>
    <!-- Main content section for Python Basics tutorial -->
    <div class="tutorial-page">
        <h1>Python Basics</h1>
        <p>In this tutorial, you'll learn the fundamentals of Python programming, including variables, data types, operators, and input/output. These concepts are the building blocks of any Python program.</p>

        <!-- Variables Section -->
        <section id="variables">
            <h2>Variables</h2>
            <p>A variable is a container for storing data. In Python, you can create a variable by assigning a value to it using the <code>=</code> operator.</p>
            <div class="code-box">
                <span class="keyword">x</span> <span class="punctuation">=</span> <span class="number">10</span> <span class="comment"># x is a variable storing the value 10</span><br>
                <span class="keyword">name</span> <span class="punctuation">=</span> <span class="string">"Alice"</span> <span class="comment"># name is a variable storing the string "Alice"</span>
            </div>
            <p>Variables can store different types of data, such as numbers, strings, and more.</p>
            <!-- Rules for Valid Variable Names -->
            <h3>Rules for Valid Variable Names</h3>
            <p>To create a valid variable name in Python, follow these rules:</p>
            <ul>
                <li>Variable names must start with a letter (a-z, A-Z) or an underscore (<code>_</code>).</li>
                <li>They cannot start with a number.</li>
                <li>They can only contain letters, numbers, and underscores.</li>
                <li>Variable names are case-sensitive (<code>age</code> and <code>Age</code> are different).</li>
                <li>Avoid using Python keywords (e.g., <code>if</code>, <code>for</code>, <code>while</code>) as variable names.</li>
            </ul>
            <div class="code-box">
                <span class="comment"># Valid variable names</span><br>
                <span class="keyword">age</span> <span class="punctuation">=</span> <span class="number">25</span><br>
                <span class="keyword">_name</span> <span class="punctuation">=</span> <span class="string">"Bob"</span><br>
                <span class="keyword">user1</span> <span class="punctuation">=</span> <span class="string">"Alice"</span><br><br>
                <span class="comment"># Invalid variable names</span><br>
                <span class="keyword">1user</span> <span class="punctuation">=</span> <span class="string">"Invalid"</span> <span class="comment"># Error: Cannot start with a number</span><br>
                <span class="keyword">user-name</span> <span class="punctuation">=</span> <span class="string">"Invalid"</span> <span class="comment"># Error: Hyphens are not allowed</span>
            </div>
        </section>

        <!-- Data Types Section -->
        <section id="data-types">
            <h2>Data Types</h2>
            <p>Python supports several built-in data types:</p>
            <ul>
                <li><strong>Integers:</strong> Whole numbers (e.g., <code>10</code>).</li>
                <li><strong>Floats:</strong> Decimal numbers (e.g., <code>3.14</code>).</li>
                <li><strong>Strings:</strong> Text (e.g., <code>"Hello"</code>).</li>
                <li><strong>Booleans:</strong> True or False values.</li>
            </ul>
            <div class="code-box">
                <span class="keyword">age</span> <span class="punctuation">=</span> <span class="number">25</span> <span class="comment"># Integer</span><br>
                <span class="keyword">pi</span> <span class="punctuation">=</span> <span class="number">3.14</span> <span class="comment"># Float</span><br>
                <span class="keyword">name</span> <span class="punctuation">=</span> <span class="string">"Bob"</span> <span class="comment"># String</span><br>
                <span class="keyword">is_student</span> <span class="punctuation">=</span> <span class="keyword">True</span> <span class="comment"># Boolean</span>
            </div>
        </section>

        <!-- Operators Section -->
        <section id="operators">
            <button id="back-to-top" class="btn-back-to-top" onclick="scrollToTop()">↑</button>
            <h2>Operators</h2>
            <p>Python supports various operators for performing operations on variables:</p>
            <ul>
                <li><strong>Arithmetic Operators:</strong> <code>+</code>, <code>-</code>, <code>*</code>, <code>/</code>, <code>%</code> (modulus).</li>
                <li><strong>Comparison Operators:</strong> <code>==</code>, <code>!=</code>, <code>></code>, <code><</code>, <code>>=</code>, <code><=</code>.</li>
                <li><strong>Logical Operators:</strong> <code>and</code>, <code>or</code>, <code>not</code>.</li>
            </ul>
            <div class="code-box">
                <span class="keyword">a</span> <span class="punctuation">=</span> <span class="number">10</span><br>
                <span class="keyword">b</span> <span class="punctuation">=</span> <span class="number">20</span><br>
                <span class="keyword">sum</span> <span class="punctuation">=</span> <span class="keyword">a</span> <span class="punctuation">+</span> <span class="keyword">b</span> <span class="comment"># Addition</span><br>
                <span class="keyword">is_greater</span> <span class="punctuation">=</span> <span class="keyword">a</span> <span class="punctuation">></span> <span class="keyword">b</span> <span class="comment"># Comparison</span><br>
                <span class="keyword">result</span> <span class="punctuation">=</span> <span class="keyword">is_greater</span> <span class="punctuation">and</span> <span class="keyword">True</span> <span class="comment"># Logical AND</span>
            </div>
        </section>

        <!-- Input and Output Section -->
        <section id="input-output">
            <h2>Input and Output</h2>
            <p>You can use the <code>input()</code> function to get user input and the <code>print()</code> function to display output.</p>
            <div class="code-box">
                <span class="keyword">name</span> <span class="punctuation">=</span> <span class="function">input</span><span class="punctuation">(</span><span class="string">"Enter your name: "</span><span class="punctuation">)</span><br>
                <span class="function">print</span><span class="punctuation">(</span><span class="string">"Hello, "</span> <span class="punctuation">+</span> <span class="keyword">name</span><span class="punctuation">)</span>
            </div>
            <div class="note">
                <strong>Note:</strong> The <code>input()</code> function always returns a string. If you need to work with numbers, you must convert the input to an integer or float using <code>int()</code> or <code>float()</code>.
            </div>
            <div class="code-box">
                <span class="keyword">age</span> <span class="punctuation">=</span> <span class="function">input</span><span class="punctuation">(</span><span class="string">"Enter your age: "</span><span class="punctuation">)</span> <span class="comment"># Returns a string</span><br>
                <span class="keyword">age</span> <span class="punctuation">=</span> <span class="function">int</span><span class="punctuation">(</span><span class="keyword">age</span><span class="punctuation">)</span> <span class="comment"># Convert to integer</span><br>
                <span class="function">print</span><span class="punctuation">(</span><span class="string">"You are "</span> <span class="punctuation">+</span> <span class="function">str</span><span class="punctuation">(</span><span class="keyword">age</span><span class="punctuation">)</span> <span class="punctuation">+</span> <span class="string">" years old."</span><span class="punctuation">)</span>
            </div>
        </section>

        <!-- Quiz Section -->
        <div class="quiz-section">
            <h3>Test Your Knowledge</h3>
            <form id="quiz-form">
                <div class="question">
                    <p>1. Which of the following is a valid variable name?</p>
                    <label><input type="radio" name="q1" value="a"> 1var</label>
                    <label><input type="radio" name="q1" value="b"> var_name</label>
                    <label><input type="radio" name="q1" value="c"> var-name</label>
                </div>

                <div class="question">
                    <p>2. What does the <code>input()</code> function return?</p>
                    <label><input type="radio" name="q2" value="a"> Integer</label>
                    <label><input type="radio" name="q2" value="b"> String</label>
                    <label><input type="radio" name="q2" value="c"> Boolean</label>
                </div>

                <div class="question">
                    <p>3. What is the output of the following code?</p>
                    <div class="code-box">
                        <span class="keyword">x</span> <span class="punctuation">=</span> <span class="number">5</span><br>
                        <span class="keyword">y</span> <span class="punctuation">=</span> <span class="number">2</span><br>
                        <span class="function">print</span><span class="punctuation">(</span><span class="keyword">x</span> <span class="punctuation">+</span> <span class="keyword">y</span><span class="punctuation">)</span>
                    </div>
                    <label><input type="radio" name="q3" value="a"> 7</label>
                    <label><input type="radio" name="q3" value="b"> 52</label>
                    <label><input type="radio" name="q3" value="c"> Error</label>
                </div>

                <button type="button" class="submit-btn" onclick="checkQuizBasics()">Submit</button>
            </form>
            <div id="quiz-result" class="result"></div>
        </div>
<!-- Video Section -->
<section class="video-section">
    <h3>Learn More About Variables and Data Types</h3>
    
    <!-- First Video: Variables -->
    <figure>
        <h4>Video 1: Variables in Python</h4>
        <iframe 
            width="100%" 
            height="400" 
            src="https://www.youtube.com/embed/52RHZdBSjTw?si=BMsp9fJPFdxgXYGH" 
            title="YouTube video player: Variables in Python" 
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
            allowfullscreen
            aria-label="Embedded YouTube video: Variables in Python"
        ></iframe>
        <figcaption>
            This video explains what variables are and how to use them in Python.
        </figcaption>
    </figure>

    <!-- Second Video: Data Types -->
    <figure>
        <h4>Video 2: Data Types in Python</h4>
        <iframe 
            width="100%" 
            height="400" 
            src="https://www.youtube.com/embed/afJ2CuFbHKo?si=tyz6Ghj1wmf__QAh" 
            title="YouTube video player: Data Types in Python" 
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
            allowfullscreen
            aria-label="Embedded YouTube video: Data Types in Python"
        ></iframe>
        <figcaption>
            This video explains the different data types in Python, such as integers, float, strings, and boolean.
        </figcaption>
    </figure>
</section>

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
        <!-- Next Step Section-->
        <h2>Next Steps</h2>
        <p>Now that you've learned the basics of Python, it's time to explore more advanced topics like control flow and functions. Check out the next tutorial on <strong>Control Flow</strong>.</p>
        <a href="control-flow.php" class="btn btn-primary">Next: Control Flow</a>
    </div>
    <button id="back-to-top" class="btn-back-to-top" onclick="scrollToTop()">↑</button>


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