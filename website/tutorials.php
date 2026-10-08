<?php
session_start();
  // Include the database connection
include("connect.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PyByte - Tutorials</title>
  <link rel="stylesheet" href="styles.css">
  <!-- Link to Font Awesome library for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
<body>
  <header>
    <nav class="navbar">
       <!-- Navigation bar -->
      <a href="homepage2.php" class="logo">PyByte</a> 
      <ul class="nav-links" id="nav-links">
        <li><a href="homepage2.php"><i class="fas fa-home"></i> Home</a></li>
        <li><a href="exercises.php"><i class="fas fa-code"></i> Exercises</a></li> 
        <li><a href="profile.php"><i class="fas fa-user"></i> Profile</a></li>
        <li><a href="logout.php" class="btn btn-logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li> 
      </ul>
      <div class="menu-toggle" id="mobile-menu"> 
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
      </div>
    </nav>
  </header>

  <div class="tutorials-page">
    <h1>Python Tutorials</h1> 
     <!-- Search Bar to filter tutorials -->
    <div class="search-bar"> 
      <input type="text" id="search" placeholder="Search tutorials..." oninput="filterTutorials()">
      <button>Search</button>
    </div>

    <div class="tutorial-categories"> 
      <div class="category" >
        <h2>Beginner Tutorials</h2> 
        <ul>
          <li><a href="intro-to-python.php">Introduction to Python</a></li>
          <li><a href="python-basics.php">Python Basics</a></li>
          <li><a href="control-flow.php">Control Flow</a></li>
        </ul>
      </div>
      <div class="category">
        <h2>Intermediate Tutorials</h2> <!-- Section for intermediate-level tutorials -->
        <ul>
          <li><a href="datastructures.php">Data Structures</a></li>
          <li><a href="function.php">Functions</a></li>
          <li><a href="error-handling.php">Error Handling (Try-Catch)</a></li>
        </ul>
      </div>
      <div class="category">
        <h2>Advanced Tutorials</h2> <!-- Section for advanced-level tutorials -->
        <ul>
          <li><a href="oop.php">Object-Oriented Programming</a></li>
          <li><a href="attributes.php">Attributes and Methods</a></li>
          <li><a href="inheritance.php">Inheritance and Polymorphism</a></li>
        </ul>
      </div>
    </div>

    <div class="featured-tutorial"> <!-- Highlighting an important tutorial -->
      <h2>Featured Tutorial: Introduction to Python</h2>
      <p>Learn the fundamentals of Python programming, including variables, data types, and operators.</p>
      <a href="intro-to-python.php" class="btn btn-primary">Start Learning</a> 
    </div>
  </div>
    <!-- Back to Top Button -->
  <button id="back-to-top" class="btn-back-to-top" onclick="scrollToTop()">↑</button>
  <footer class="footer">
    <p>&copy; 2025 PyByte. All rights reserved.</p> 
  </footer>

  <!-- JavaScript file -->
  <script src="script.js"> 
  </script>
    <script>
      // Function to filter tutorials based on search input
    function filterTutorials() {
      const q = document.getElementById('search').value.toLowerCase();
      document.querySelectorAll('.category').forEach(cat => {
        let anyVisible = false;
        cat.querySelectorAll('ul li').forEach(li => {
          if (li.textContent.toLowerCase().includes(q)) {
            li.style.display = '';
            anyVisible = true;
          } else {
            li.style.display = 'none';
          }
        });
        // Hide entire category if no items match
        cat.style.display = anyVisible ? '' : 'none';
      });
    }
  // Function to show the "Back to Top" button
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
