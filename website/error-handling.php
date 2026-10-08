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

//Check if already completed
$isCompleted = isTutorialCompleted($userId, $tutorialId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error Handling - PyByte</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Link to Font Awesome library for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </head>
<body>
    
    <header>
      <!-- Navbar Section -->
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
        <h1>Error Handling in Python</h1>
        <p>Errors are a natural part of programming. They occur when something goes wrong in your code, such as invalid input, missing files, or unexpected behavior. Python provides tools to handle these errors gracefully, ensuring your program doesn't crash unexpectedly. In this tutorial, you'll learn about common types of errors and how to handle them using <strong>try-except blocks</strong>.</p>

        <h2>Common Types of Errors</h2>
        <p>Here are some common types of errors you'll encounter in Python:</p>

        <h3>1. SyntaxError</h3>
        <p>A <code>SyntaxError</code> occurs when the Python interpreter encounters invalid syntax. This usually happens due to typos or incorrect use of Python's grammar.</p>
        <div class="code-box">
            <span class="comment"># Example of a SyntaxError</span><br>
            <span class="keyword">print</span><span class="punctuation">(</span><span class="string">"Hello, World!"</span> <span class="comment"># Missing closing parenthesis</span>
        </div>
        <p><strong>How to Fix:</strong> Carefully check your code for typos or missing symbols.</p>

        <h3>2. NameError</h3>
        <p>A <code>NameError</code> occurs when you try to use a variable or function that hasn't been defined.</p>
        <div class="code-box">
            <span class="comment"># Example of a NameError</span><br>
            <span class="function">print</span><span class="punctuation">(</span><span class="keyword">x</span><span class="punctuation">)</span> <span class="comment"># 'x' is not defined</span>
        </div>
        <p><strong>How to Fix:</strong> Make sure all variables and functions are defined before use.</p>

        <h3>3. TypeError</h3>
        <p>A <code>TypeError</code> occurs when you perform an operation on an object of an inappropriate type.</p>
        <div class="code-box">
            <span class="comment"># Example of a TypeError</span><br>
            <span class="keyword">result</span> <span class="punctuation">=</span> <span class="number">5</span> <span class="punctuation">+</span> <span class="string">"10"</span> <span class="comment"># Cannot add an integer and a string</span>
        </div>
        <p><strong>How to Fix:</strong> Ensure that the types of your variables are compatible with the operations you're performing.</p>

        <h3>4. ValueError</h3>
        <p>A <code>ValueError</code> occurs when a function receives an argument of the correct type but an inappropriate value.</p>
        <div class="code-box">
            <span class="comment"># Example of a ValueError</span><br>
            <span class="keyword">num</span> <span class="punctuation">=</span> <span class="function">int</span><span class="punctuation">(</span><span class="string">"abc"</span><span class="punctuation">)</span> <span class="comment"># 'abc' cannot be converted to an integer</span>
        </div>
        <p><strong>How to Fix:</strong> Validate inputs before passing them to functions.</p>

        <h3>5. IndexError</h3>
        <p>An <code>IndexError</code> occurs when you try to access an index that doesn't exist in a list or other sequence.</p>
        <div class="code-box">
            <span class="comment"># Example of an IndexError</span><br>
            <span class="keyword">my_list</span> <span class="punctuation">=</span> <span class="punctuation">[</span><span class="number">1</span><span class="punctuation">,</span> <span class="number">2</span><span class="punctuation">,</span> <span class="number">3</span><span class="punctuation">]</span><br>
            <span class="function">print</span><span class="punctuation">(</span><span class="keyword">my_list</span><span class="punctuation">[</span><span class="number">3</span><span class="punctuation">])</span> <span class="comment"># Index 3 is out of range</span>
        </div>
        <p><strong>How to Fix:</strong> Ensure the index you're accessing exists in the sequence.</p>

        <h3>6. KeyError</h3>
        <p>A <code>KeyError</code> occurs when you try to access a key that doesn't exist in a dictionary.</p>
        <div class="code-box">
            <span class="comment"># Example of a KeyError</span><br>
            <span class="keyword">my_dict</span> <span class="punctuation">=</span> <span class="punctuation">{</span><span class="string">"name"</span><span class="punctuation">:</span> <span class="string">"Alice"</span><span class="punctuation">}</span><br>
            <span class="function">print</span><span class="punctuation">(</span><span class="keyword">my_dict</span><span class="punctuation">[</span><span class="string">"age"</span><span class="punctuation">])</span> <span class="comment"># Key 'age' does not exist</span>
        </div>
        <p><strong>How to Fix:</strong> Check if the key exists in the dictionary before accessing it.</p>

        <h2>Handling Errors with Try-Except</h2>
        <p>Python provides the <code>try-except</code> block to handle errors gracefully. This allows you to catch and handle exceptions without crashing your program.</p>
         <!-- code block example for handling errors -->
        <div class="code-box">
            <span class="keyword">try</span><span class="punctuation">:</span><br>
            &nbsp;&nbsp;&nbsp;&nbsp;<span class="comment"># Code that might raise an error</span><br>
            &nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">num</span> <span class="punctuation">=</span> <span class="function">int</span><span class="punctuation">(</span><span class="string">"abc"</span><span class="punctuation">)</span><br>
            <span class="keyword">except</span> <span class="function">ValueError</span><span class="punctuation">:</span><br>
            &nbsp;&nbsp;&nbsp;&nbsp;<span class="comment"># Code to handle the error</span><br>
            &nbsp;&nbsp;&nbsp;&nbsp;<span class="function">print</span><span class="punctuation">(</span><span class="string">"Invalid input! Please enter a number."</span><span class="punctuation">)</span>
        </div>
        <p><strong>Explanation:</strong></p>
        <ul>
            <li>The <code>try</code> block contains the code that might raise an error.</li>
            <li>The <code>except</code> block catches the error and executes alternative code.</li>
        </ul>

        <h3>Handling Multiple Exceptions</h3>
        <p>You can handle multiple exceptions by adding multiple <code>except</code> blocks.</p>
        <div class="code-box">
            <span class="keyword">try</span><span class="punctuation">:</span><br>
            &nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">num</span> <span class="punctuation">=</span> <span class="function">int</span><span class="punctuation">(</span><span class="string">"abc"</span><span class="punctuation">)</span><br>
            &nbsp;&nbsp;&nbsp;&nbsp;<span class="function">print</span><span class="punctuation">(</span><span class="number">10</span> <span class="punctuation">/</span> <span class="number">0</span><span class="punctuation">)</span><br>
            <span class="keyword">except</span> <span class="function">ValueError</span><span class="punctuation">:</span><br>
            &nbsp;&nbsp;&nbsp;&nbsp;<span class="function">print</span><span class="punctuation">(</span><span class="string">"Invalid input! Please enter a number."</span><span class="punctuation">)</span><br>
            <span class="keyword">except</span> <span class="function">ZeroDivisionError</span><span class="punctuation">:</span><br>
            &nbsp;&nbsp;&nbsp;&nbsp;<span class="function">print</span><span class="punctuation">(</span><span class="string">"Cannot divide by zero!"</span><span class="punctuation">)</span>
        </div>

        <h3>The Finally Block</h3>
        <p>The <code>finally</code> block is used to execute code that should run regardless of whether an error occurred.</p>
        <div class="code-box">
            <span class="keyword">try</span><span class="punctuation">:</span><br>
            &nbsp;&nbsp;&nbsp;&nbsp;<span class="keyword">num</span> <span class="punctuation">=</span> <span class="function">int</span><span class="punctuation">(</span><span class="string">"123"</span><span class="punctuation">)</span><br>
            <span class="keyword">except</span> <span class="function">ValueError</span><span class="punctuation">:</span><br>
            &nbsp;&nbsp;&nbsp;&nbsp;<span class="function">print</span><span class="punctuation">(</span><span class="string">"Invalid input!"</span><span class="punctuation">)</span><br>
            <span class="keyword">finally</span><span class="punctuation">:</span><br>
            &nbsp;&nbsp;&nbsp;&nbsp;<span class="function">print</span><span class="punctuation">(</span><span class="string">"This will always run."</span><span class="punctuation">)</span>
        </div>

        <!-- Quiz Section -->
        <div class="quiz-section">
            <h3>Test Your Knowledge</h3>
            <form id="quiz-form">
                <div class="question">
                    <p>1. What type of error occurs when you try to divide by zero?</p>
                    <label><input type="radio" name="q1" value="a"> ValueError</label>
                    <label><input type="radio" name="q1" value="b"> ZeroDivisionError</label>
                    <label><input type="radio" name="q1" value="c"> TypeError</label>
                </div>

                <div class="question">
                    <p>2. What does the <code>finally</code> block do?</p>
                    <label><input type="radio" name="q2" value="a"> Runs only if an error occurs</label>
                    <label><input type="radio" name="q2" value="b"> Runs only if no error occurs</label>
                    <label><input type="radio" name="q2" value="c"> Runs regardless of whether an error occurs</label>
                </div>

                <div class="question">
                    <p>3. Which block is used to catch and handle errors in Python?</p>
                    <label><input type="radio" name="q3" value="a"> try-except</label>
                    <label><input type="radio" name="q3" value="b"> if-else</label>
                    <label><input type="radio" name="q3" value="c"> for-else</label>
                </div>

                <button type="button" class="submit-btn" onclick="checkQuizErrorHandling()">Submit</button>
            </form>
            <div class="result" id="quiz-result"></div>
        </div>
        <div class="progress-section">
    <!-- mark the error handling tutorial as done -->
      <?php if ($isCompleted): ?>
        <p class="completed-message">✅ You've completed this tutorial!</p>
      <?php else: ?>
        <form id="mark-done-form" method="post">
          <input type="hidden" name="mark_done" value="1">
          <button type="submit" class="btn btn-primary">Mark as Done</button>
        </form>
      <?php endif; ?>
    </div>
        <!--End of tutorial Section-->
        <div class="note">
            <h2>Congratulations! 🎉</h2>
            <p>You've reached the end of this tutorial on Intermediate Python. By now, you should have a solid understanding of:</p>
            <ul>
                <li>Data Structures in Python</li>
                <li>  Functions</li>
                <li>How to handle errors</li>
            </ul>
            <p>Keep practicing and exploring more advanced Python concepts to become a Python pro!</p>
            <a href="oop.php" class="btn btn-primary">Continue to Advanced Level OOP</a>
        </div>
    </div>
    <button id="back-to-top" class="btn-back-to-top" onclick="scrollToTop()">↑</button>
    <!-- Footer Section -->
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