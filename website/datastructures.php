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
//Check if already completed
$isCompleted = isTutorialCompleted($userId, $tutorialId);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Structures in Python - PyByte</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Link to Font Awesome library for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body>
    <header>
         <!-- Navbar -->
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

    <!-- Main Content Section -->
    <div class="tutorial-page">
        <h1>Data Structures in Python</h1>
        <p>Python supports several built-in data structures that allow you to store and manipulate data efficiently. In this tutorial, we'll explore the most commonly used data structures: <strong>Strings, Lists, Tuples, Dictionaries, and Sets</strong>.</p>

        <!-- Strings Section -->
        <section id="strings">
            <h2>Strings</h2>
            <p>A string is a sequence of characters enclosed in single (<code>' '</code>) or double (<code>" "</code>) quotes. Strings are immutable, meaning their contents cannot be changed after creation.</p>
            <div class="code-box">
                <span class="keyword">text</span> <span class="punctuation">=</span> <span class="string">"Hello, Python!"</span><br>
                <span class="function">print</span><span class="punctuation">(</span><span class="keyword">text</span><span class="punctuation">)</span> <span class="comment"># Output: Hello, Python!</span>
            </div>
            <p><strong>Common Operations:</strong></p>
            <ul>
                <li>
                    <strong>Concatenation:</strong> Combine strings using <code>+</code>.
                    <div class="code-box">
                        <span class="keyword">greeting</span> <span class="punctuation">=</span> <span class="string">"Hello"</span><br>
                        <span class="keyword">name</span> <span class="punctuation">=</span> <span class="string">"Alice"</span><br>
                        <span class="keyword">message</span> <span class="punctuation">=</span> <span class="keyword">greeting</span> <span class="punctuation">+</span> <span class="string">", "</span> <span class="punctuation">+</span> <span class="keyword">name</span> <span class="punctuation">+</span> <span class="string">"!"</span><br>
                        <span class="function">print</span><span class="punctuation">(</span><span class="keyword">message</span><span class="punctuation">)</span> <span class="comment"># Output: Hello, Alice!</span>
                    </div>
                </li>
                <li>
                    <strong>Slicing:</strong> Access parts of a string using indices.
                    <div class="code-box">
                        <span class="keyword">text</span> <span class="punctuation">=</span> <span class="string">"Python Programming"</span><br>
                        <span class="function">print</span><span class="punctuation">(</span><span class="keyword">text</span><span class="punctuation">[</span><span class="number">0</span><span class="punctuation">:</span><span class="number">6</span><span class="punctuation">])</span> <span class="comment"># Output: Python</span>
                    </div>
                </li>
                <li>
                    <strong>Methods:</strong> Strings have built-in methods like <code>upper()</code>, <code>lower()</code>, and <code>replace()</code>.
                    <div class="code-box">
                        <span class="keyword">text</span> <span class="punctuation">=</span> <span class="string">"Hello, World!"</span><br>
                        <span class="function">print</span><span class="punctuation">(</span><span class="keyword">text</span><span class="punctuation">.</span><span class="function">upper</span><span class="punctuation">())</span> <span class="comment"># Output: HELLO, WORLD!</span>
                    </div>
                </li>
            </ul>
        </section>

        <!-- Lists Section -->
        <section id="lists">
            <h2>Lists</h2>
            <p>A list is an ordered, mutable collection of items. Lists are defined using square brackets (<code>[]</code>).</p>
            <div class="code-box">
                <span class="keyword">fruits</span> <span class="punctuation">=</span> <span class="punctuation">[</span><span class="string">"apple"</span><span class="punctuation">,</span> <span class="string">"banana"</span><span class="punctuation">,</span> <span class="string">"cherry"</span><span class="punctuation">]</span><br>
                <span class="function">print</span><span class="punctuation">(</span><span class="keyword">fruits</span><span class="punctuation">[</span><span class="number">1</span><span class="punctuation">])</span> <span class="comment"># Output: banana</span>
            </div>
            <p><strong>Common Operations:</strong></p>
            <ul>
                <li>
                    <strong>Appending:</strong> Add items to the end of a list using <code>append()</code>.
                    <div class="code-box">
                        <span class="keyword">fruits</span> <span class="punctuation">=</span> <span class="punctuation">[</span><span class="string">"apple"</span><span class="punctuation">,</span> <span class="string">"banana"</span><span class="punctuation">]</span><br>
                        <span class="keyword">fruits</span><span class="punctuation">.</span><span class="function">append</span><span class="punctuation">(</span><span class="string">"cherry"</span><span class="punctuation">)</span><br>
                        <span class="function">print</span><span class="punctuation">(</span><span class="keyword">fruits</span><span class="punctuation">)</span> <span class="comment"># Output: ['apple', 'banana', 'cherry']</span>
                    </div>
                </li>
                <li>
                    <strong>Removing:</strong> Remove items using <code>remove()</code> or <code>pop()</code>.
                    <div class="code-box">
                        <span class="keyword">fruits</span> <span class="punctuation">=</span> <span class="punctuation">[</span><span class="string">"apple"</span><span class="punctuation">,</span> <span class="string">"banana"</span><span class="punctuation">,</span> <span class="string">"cherry"</span><span class="punctuation">]</span><br>
                        <span class="keyword">fruits</span><span class="punctuation">.</span><span class="function">remove</span><span class="punctuation">(</span><span class="string">"banana"</span><span class="punctuation">)</span><br>
                        <span class="function">print</span><span class="punctuation">(</span><span class="keyword">fruits</span><span class="punctuation">)</span> <span class="comment"># Output: ['apple', 'cherry']</span>
                    </div>
                </li>
                <li>
                    <strong>Slicing:</strong> Access sublists using indices.
                    <div class="code-box">
                        <span class="keyword">numbers</span> <span class="punctuation">=</span> <span class="punctuation">[</span><span class="number">1</span><span class="punctuation">,</span> <span class="number">2</span><span class="punctuation">,</span> <span class="number">3</span><span class="punctuation">,</span> <span class="number">4</span><span class="punctuation">,</span> <span class="number">5</span><span class="punctuation">]</span><br>
                        <span class="function">print</span><span class="punctuation">(</span><span class="keyword">numbers</span><span class="punctuation">[</span><span class="number">1</span><span class="punctuation">:</span><span class="number">4</span><span class="punctuation">])</span> <span class="comment"># Output: [2, 3, 4]</span>
                    </div>
                </li>
            </ul>
        </section>

        <!-- Tuples Section -->
        <section id="tuples">
            <h2>Tuples</h2>
            <p>A tuple is an ordered, immutable collection of items. Tuples are defined using parentheses (<code>()</code>).</p>
            <div class="code-box">
                <span class="keyword">coordinates</span> <span class="punctuation">=</span> <span class="punctuation">(</span><span class="number">10</span><span class="punctuation">,</span> <span class="number">20</span><span class="punctuation">)</span><br>
                <span class="function">print</span><span class="punctuation">(</span><span class="keyword">coordinates</span><span class="punctuation">[</span><span class="number">0</span><span class="punctuation">])</span> <span class="comment"># Output: 10</span>
            </div>
            <p><strong>Common Operations:</strong></p>
            <ul>
                <li>
                    <strong>Accessing:</strong> Access items using indices.
                    <div class="code-box">
                        <span class="keyword">coordinates</span> <span class="punctuation">=</span> <span class="punctuation">(</span><span class="number">10</span><span class="punctuation">,</span> <span class="number">20</span><span class="punctuation">)</span><br>
                        <span class="function">print</span><span class="punctuation">(</span><span class="keyword">coordinates</span><span class="punctuation">[</span><span class="number">1</span><span class="punctuation">])</span> <span class="comment"># Output: 20</span>
                    </div>
                </li>
                <li>
                    <strong>Unpacking:</strong> Assign tuple items to variables.
                    <div class="code-box">
                        <span class="keyword">coordinates</span> <span class="punctuation">=</span> <span class="punctuation">(</span><span class="number">10</span><span class="punctuation">,</span> <span class="number">20</span><span class="punctuation">)</span><br>
                        <span class="keyword">x</span><span class="punctuation">,</span> <span class="keyword">y</span> <span class="punctuation">=</span> <span class="keyword">coordinates</span><br>
                        <span class="function">print</span><span class="punctuation">(</span><span class="keyword">x</span><span class="punctuation">)</span> <span class="comment"># Output: 10</span>
                    </div>
                </li>
            </ul>
        </section>

        <!-- Dictionaries Section -->
        <section id="dictionaries">
            <h2>Dictionaries</h2>
            <p>A dictionary is an unordered collection of key-value pairs. Dictionaries are defined using curly braces (<code>{}</code>).</p>
            <div class="code-box">
                <span class="keyword">person</span> <span class="punctuation">=</span> <span class="punctuation">{</span><span class="string">"name"</span><span class="punctuation">:</span> <span class="string">"Alice"</span><span class="punctuation">,</span> <span class="string">"age"</span><span class="punctuation">:</span> <span class="number">25</span><span class="punctuation">}</span><br>
                <span class="function">print</span><span class="punctuation">(</span><span class="keyword">person</span><span class="punctuation">[</span><span class="string">"name"</span><span class="punctuation">])</span> <span class="comment"># Output: Alice</span>
            </div>
            <p><strong>Common Operations:</strong></p>
            <ul>
                <li>
                    <strong>Adding:</strong> Add new key-value pairs.
                    <div class="code-box">
                        <span class="keyword">person</span> <span class="punctuation">=</span> <span class="punctuation">{</span><span class="string">"name"</span><span class="punctuation">:</span> <span class="string">"Alice"</span><span class="punctuation">}</span><br>
                        <span class="keyword">person</span><span class="punctuation">[</span><span class="string">"age"</span><span class="punctuation">]</span> <span class="punctuation">=</span> <span class="number">25</span><br>
                        <span class="function">print</span><span class="punctuation">(</span><span class="keyword">person</span><span class="punctuation">)</span> <span class="comment"># Output: {'name': 'Alice', 'age': 25}</span>
                    </div>
                </li>
                <li>
                    <strong>Updating:</strong> Modify existing values.
                    <div class="code-box">
                        <span class="keyword">person</span> <span class="punctuation">=</span> <span class="punctuation">{</span><span class="string">"name"</span><span class="punctuation">:</span> <span class="string">"Alice"</span><span class="punctuation">,</span> <span class="string">"age"</span><span class="punctuation">:</span> <span class="number">25</span><span class="punctuation">}</span><br>
                        <span class="keyword">person</span><span class="punctuation">[</span><span class="string">"age"</span><span class="punctuation">]</span> <span class="punctuation">=</span> <span class="number">26</span><br>
                        <span class="function">print</span><span class="punctuation">(</span><span class="keyword">person</span><span class="punctuation">)</span> <span class="comment"># Output: {'name': 'Alice', 'age': 26}</span>
                    </div>
                </li>
                <li>
                    <strong>Removing:</strong> Delete key-value pairs using <code>del</code>.
                    <div class="code-box">
                        <span class="keyword">person</span> <span class="punctuation">=</span> <span class="punctuation">{</span><span class="string">"name"</span><span class="punctuation">:</span> <span class="string">"Alice"</span><span class="punctuation">,</span> <span class="string">"age"</span><span class="punctuation">:</span> <span class="number">25</span><span class="punctuation">}</span><br>
                        <span class="keyword">del</span> <span class="keyword">person</span><span class="punctuation">[</span><span class="string">"age"</span><span class="punctuation">]</span><br>
                        <span class="function">print</span><span class="punctuation">(</span><span class="keyword">person</span><span class="punctuation">)</span> <span class="comment"># Output: {'name': 'Alice'}</span>
                    </div>
                </li>
            </ul>
        </section>

        <!-- Sets Section -->
        <section id="sets">
            <h2>Sets</h2>
            <p>A set is an unordered collection of unique items. Sets are defined using curly braces (<code>{}</code>) or the <code>set()</code> function.</p>
            <div class="code-box">
                <span class="keyword">unique_numbers</span> <span class="punctuation">=</span> <span class="punctuation">{</span><span class="number">1</span><span class="punctuation">,</span> <span class="number">2</span><span class="punctuation">,</span> <span class="number">3</span><span class="punctuation">,</span> <span class="number">3</span><span class="punctuation">}</span><br>
                <span class="function">print</span><span class="punctuation">(</span><span class="keyword">unique_numbers</span><span class="punctuation">)</span> <span class="comment"># Output: {1, 2, 3}</span>
            </div>
            <p><strong>Common Operations:</strong></p>
            <ul>
                <li>
                    <strong>Adding:</strong> Add items using <code>add()</code>.
                    <div class="code-box">
                        <span class="keyword">unique_numbers</span> <span class="punctuation">=</span> <span class="punctuation">{</span><span class="number">1</span><span class="punctuation">,</span> <span class="number">2</span><span class="punctuation">}</span><br>
                        <span class="keyword">unique_numbers</span><span class="punctuation">.</span><span class="function">add</span><span class="punctuation">(</span><span class="number">3</span><span class="punctuation">)</span><br>
                        <span class="function">print</span><span class="punctuation">(</span><span class="keyword">unique_numbers</span><span class="punctuation">)</span> <span class="comment"># Output: {1, 2, 3}</span>
                    </div>
                </li>
                <li>
                    <strong>Removing:</strong> Remove items using <code>remove()</code>.
                    <div class="code-box">
                        <span class="keyword">unique_numbers</span> <span class="punctuation">=</span> <span class="punctuation">{</span><span class="number">1</span><span class="punctuation">,</span> <span class="number">2</span><span class="punctuation">,</span> <span class="number">3</span><span class="punctuation">}</span><br>
                        <span class="keyword">unique_numbers</span><span class="punctuation">.</span><span class="function">remove</span><span class="punctuation">(</span><span class="number">2</span><span class="punctuation">)</span><br>
                        <span class="function">print</span><span class="punctuation">(</span><span class="keyword">unique_numbers</span><span class="punctuation">)</span> <span class="comment"># Output: {1, 3}</span>
                    </div>
                </li>
                <li>
                    <strong>Set Operations:</strong> Perform union, intersection, and difference operations.
                    <div class="code-box">
                        <span class="keyword">set1</span> <span class="punctuation">=</span> <span class="punctuation">{</span><span class="number">1</span><span class="punctuation">,</span> <span class="number">2</span><span class="punctuation">,</span> <span class="number">3</span><span class="punctuation">}</span><br>
                        <span class="keyword">set2</span> <span class="punctuation">=</span> <span class="punctuation">{</span><span class="number">3</span><span class="punctuation">,</span> <span class="number">4</span><span class="punctuation">,</span> <span class="number">5</span><span class="punctuation">}</span><br>
                        <span class="function">print</span><span class="punctuation">(</span><span class="keyword">set1</span><span class="punctuation">.</span><span class="function">union</span><span class="punctuation">(</span><span class="keyword">set2</span><span class="punctuation">))</span> <span class="comment"># Output: {1, 2, 3, 4, 5}</span>
                    </div>
                </li>
            </ul>
        </section>


        <!-- Quiz Section -->
        <div class="quiz-section">
            <h3>Test Your Knowledge</h3>
            <form id="quiz-form">
                <div class="question">
                    <p>1. Which of the following is a mutable data type?</p>
                    <label><input type="radio" name="q1" value="a"> Tuple</label>
                    <label><input type="radio" name="q1" value="b"> List</label>
                    <label><input type="radio" name="q1" value="c"> String</label>
                </div>

                <div class="question">
                    <p>2. What is the output of the following code?</p>
                    <div class="code-box">
                        <span class="keyword">my_set</span> <span class="punctuation">=</span> <span class="punctuation">{</span><span class="number">1</span><span class="punctuation">,</span> <span class="number">2</span><span class="punctuation">,</span> <span class="number">2</span><span class="punctuation">,</span> <span class="number">3</span><span class="punctuation">}</span><br>
                        <span class="function">print</span><span class="punctuation">(</span><span class="keyword">my_set</span><span class="punctuation">)</span>
                    </div>
                    <label><input type="radio" name="q2" value="a"> {1, 2, 2, 3}</label>
                    <label><input type="radio" name="q2" value="b"> {1, 2, 3}</label>
                    <label><input type="radio" name="q2" value="c"> Error</label>
                </div>

                <div class="question">
                    <p>3. Which data type is used to store key-value pairs?</p>
                    <label><input type="radio" name="q3" value="a"> List</label>
                    <label><input type="radio" name="q3" value="b"> Dictionary</label>
                    <label><input type="radio" name="q3" value="c"> Tuple</label>
                </div>

                <button type="button" class="submit-btn" onclick="checkQuizDataStructures()">Submit</button>
            </form>
            <div class="result" id="quiz-result"></div>
        </div>
<!-- Data Structures in Python Section -->
<section class="video-section">
    <h3> Know More About Data Structures </h3>
    
    <!-- Video: Detailed Explanation of Data Structures -->
    <figure>
        <h4>Video: List, Dictionary, Tuple, and Set in Python</h4>
        <iframe 
            width="100%" 
            height="400" 
            src="https://www.youtube.com/embed/R-HLU9Fl5ug?si=eTbBf-IaSkLft3IO" 
            title="YouTube video player: Data Structures in Python" 
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
            allowfullscreen
            aria-label="Embedded YouTube video: Data Structures in Python"
        ></iframe>
        <figcaption>
            This video provides a detailed explanation of Python's core data structures: Lists, Dictionaries, Tuples, and Sets.
        </figcaption>
    </figure>

    <!-- Brief Description of Data Structures -->
    <div class="data-structures-info">
        <h4>Key Data Structures in Python</h4>
        <ul>
            <li><strong>List</strong>: Ordered, mutable collection of items. Example: <code>[1, 2, 3]</code></li>
            <li><strong>Dictionary</strong>: Unordered collection of key-value pairs. Example: <code>{"name": "Alice", "age": 25}</code></li>
            <li><strong>Tuple</strong>: Ordered, immutable collection of items. Example: <code>(1, 2, 3)</code></li>
            <li><strong>Set</strong>: Unordered collection of unique items. Example: <code>{1, 2, 3}</code></li>
        </ul>
    </div>
</section>
<!-- mark the datastructure tutorial as done -->
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
        <!-- Next Steps Section -->
        <h2>Next Steps</h2>
        <p>Now that you've learned about data structures, it's time to explore how to organize your code into reusable blocks using <strong>Functions</strong>. Check out the next tutorial to learn more!</p>
        <a href="function.php" class="btn btn-primary">Next: Functions</a>
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