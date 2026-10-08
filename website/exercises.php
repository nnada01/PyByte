<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercises - PyByte</title>
    <link rel="stylesheet" href="styles.css">
          <!-- Link to Font Awesome library for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <header>
         <!-- Navigation Menu -->
        <nav class="navbar">
          <a href="homepage2.php" class="logo">PyByte</a>
          <ul class="nav-links" id="nav-links">
            <li><a href="homepage2.php"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="tutorials.php"><i class="fas fa-book"></i> Tutorials</a></li>
            <li><a href="profile.php"><i class="fas fa-user"></i> Profile</a></li>
            <li><a href="logout.php" class="btn btn-logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
          </ul>
            <!-- Mobile menu for small screens -->
          <div class="menu-toggle" id="mobile-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
          </div>
        </nav>
      </header>

    <div class="exercises-page">
        <h1>Python Exercises</h1>
        <p>Practice your Python skills with these exercises. Write your code in the editor and click "Run" to see the output.</p>

        <!-- Categories: Easy Medium Hard -->
        <div class="category-tabs">
            <button class="active" onclick="showCategory('easy')">Easy</button>
            <button onclick="showCategory('medium')">Medium</button>
            <button onclick="showCategory('hard')">Hard</button>
        </div>

        <!-- Easy Exercises -->
        <div id="easy" class="category-content">
            <div class="exercise-container" data-exercise-id="1">
                <h3>Exercise 1: Print Your Name</h3>
                <p><strong>Objective:</strong> Learn how to display output in Python.</p>
                <p><strong>Task:</strong> Write a program that prints your name.</p>
                <p><strong>Explanation:</strong> Printing is one of the most basic operations in programming. This exercise will help you understand how to display text on the screen.</p>
                <p><strong>Sample Output:</strong> <code>John Doe</code></p>
                <p><a href="https://www.programiz.com/python-programming/online-compiler/" class="online-compiler-link" target="_blank">Write and test your code here</a> </p>
                <button class="view-solution-btn">View Solution</button>

                <!-- Mark as Solved Button -->
                <button class="mark-solved-btn">Mark as done</button>
            
                <!-- Solution Container (initially hidden) -->
                <div class="solution" style="display: none;">
                    <p>print("John Doe")</p> 
                </div>
            </div>

            <div class="exercise-container" data-exercise-id="2">
                <h3>Exercise 2: Add Two Numbers</h3>
                <p><strong>Objective:</strong> Learn how to perform basic arithmetic operations.</p>
                <p><strong>Task:</strong> Write a program that adds two numbers and prints the result.</p>
                <p><strong>Explanation:</strong> Arithmetic operations are fundamental in programming. This exercise will help you understand how to work with numbers.</p>
                <p><strong>Sample Input:</strong> <code>5, 10</code></p>
                <p><strong>Sample Output:</strong> <code>The sum is 15</code></p>
                <p><a href="https://www.programiz.com/python-programming/online-compiler/" class="online-compiler-link" target="_blank">Write and test your code here</a> </p>
                 <!-- Mark as Solved Button -->
                 <button class="view-solution-btn">View Solution</button>
                 <button class="mark-solved-btn">Mark as done</button>
            
                 <!-- Solution Container (initially hidden) -->
                 <div class="solution" style="display: none;">
                     <p>a = 5</p>
                     <p>b = 10</p>
                     <p>print("The sum is", a + b)</p> 
                 </div>
            </div>

            <div class="exercise-container" data-exercise-id="3">
                <h3>Exercise 3: Check Even or Odd</h3>
                <p><strong>Objective:</strong> Learn how to use conditions in Python.</p>
                <p><strong>Task:</strong> Write a program that checks if a number is even or odd.</p>
                <p><strong>Explanation:</strong> Conditions allow you to make decisions in your code. This exercise will help you understand how to use them effectively.</p>
                <p><strong>Sample Input:</strong> <code>7</code></p>
                <p><strong>Sample Output:</strong> <code>The number is odd</code></p>
                <p><a href="https://www.programiz.com/python-programming/online-compiler/" class="online-compiler-link" target="_blank">Write and test your code here</a> </p>
                 <!-- Mark as Solved Button -->
                 <button class="view-solution-btn">View Solution</button>
                 <button class="mark-solved-btn">Mark as done</button>
            
                 <!-- Solution Container (initially hidden) -->
                 <div class="solution" style="display: none;">
                     <p>num = 7</p>
                     <p>if num % 2 == 0:</p>
                     <p>   print("The number is even")</p>
                     <p>else:</p>
                     <p>   print("The number is odd")</p> 
                 </div>
            </div>

            <div class="exercise-container" data-exercise-id="4">
                <h3>Exercise 4: Print Numbers from 1 to 10</h3>
                <p><strong>Objective:</strong> Learn how to use loops in Python.</p>
                <p><strong>Task:</strong> Write a program that prints numbers from 1 to 10.</p>
                <p><strong>Explanation:</strong> Loops allow you to repeat a block of code multiple times. This exercise will help you understand how to use loops effectively.</p>
                <p><strong>Sample Output:</strong></p>
                <pre><code>1
2
3
...
10</code></pre>
                <p><a href="https://www.programiz.com/python-programming/online-compiler/" class="online-compiler-link" target="_blank">Write and test your code here</a> </p>
                 <!-- Mark as Solved Button -->
                 <button class="view-solution-btn">View Solution</button>
                 <button class="mark-solved-btn">Mark as done</button>
            
                 <!-- Solution Container (initially hidden) -->
                 <div class="solution" style="display: none;">
                     <p>for i in range(1, 11):</p>
                     <p>   print(i)</p> 
                 </div>
            </div>

            <div class="exercise-container" data-exercise-id="5">
                <h3>Exercise 5: Find the Largest Number</h3>
                <p><strong>Objective:</strong> Learn how to compare numbers in Python.</p>
                <p><strong>Task:</strong> Write a program that finds the largest of three numbers.</p>
                <p><strong>Explanation:</strong> Comparisons are essential for decision-making in programming. This exercise will help you understand how to compare multiple values.</p>
                <p><strong>Sample Input:</strong> <code>3, 7, 2</code></p>
                <p><strong>Sample Output:</strong> <code>The largest number is 7</code></p>
                <p><a href="https://www.programiz.com/python-programming/online-compiler/" class="online-compiler-link" target="_blank">Write and test your code here</a> </p>
                 <!--View Solution and  Mark as Solved Button -->
                 <button class="view-solution-btn">View Solution</button>
                 <button class="mark-solved-btn">Mark as done</button>
            
                 <!-- Solution Container (initially hidden) -->
                 <div class="solution" style="display: none;">
                     <p>a = 3</p>
                     <p>b = 7</p>
                     <p>c = 2</p>
                     <p>largest = max(a, b, c)</p>
                     <p>print("The largest number is", largest)</p> 
                 </div>
            </div>

            <div class="exercise-container" data-exercise-id="6">
                <h3>Exercise 6: Reverse a String</h3>
                <p><strong>Objective:</strong> Learn how to manipulate strings in Python.</p>
                <p><strong>Task:</strong> Write a program that reverses a given string.</p>
                <p><strong>Explanation:</strong> String manipulation is a common task in programming. This exercise will help you understand how to work with strings.</p>
                <p><strong>Sample Input:</strong> <code>"hello"</code></p>
                <p><strong>Sample Output:</strong> <code>olleh</code></p>
                <p><a href="https://www.programiz.com/python-programming/online-compiler/" class="online-compiler-link" target="_blank">Write and test your code here</a> </p>
                 <!-- Mark as Solved Button -->
                 <button class="view-solution-btn">View Solution</button>
                 <button class="mark-solved-btn">Mark as done</button>
            
                 <!-- Solution Container (initially hidden) -->
                 <div class="solution" style="display: none;">
                     <p>string = "hello"</p>
                     <p>reversed_string = string[::-1]</p>
                     <p>print(reversed_string)</p> 
                 </div>
            </div>

            <div class="exercise-container" data-exercise-id="7">
                <h3>Exercise 7: Calculate Factorial</h3>
                <p><strong>Objective:</strong> Learn how to solve problems using loops.</p>
                <p><strong>Task:</strong> Write a program that calculates the factorial of a number.</p>
                <p><strong>Explanation:</strong> Factorials are a common mathematical concept. This exercise will help you understand how to solve problems using loops.</p>
                <p><strong>Sample Input:</strong> <code>5</code></p>
                <p><strong>Sample Output:</strong> <code>The factorial is 120</code></p>
                <p><a href="https://www.programiz.com/python-programming/online-compiler/" class="online-compiler-link" target="_blank">Write and test your code here</a> </p>
                 <!-- Mark as Solved Button -->
                 <button class="view-solution-btn">View Solution</button>
                 <button class="mark-solved-btn">Mark as done</button>
            
                 <!-- Solution Container (initially hidden) -->
                 <div class="solution" style="display: none;">
                     <p>num = 5</p>
                     <p>factorial = 1</p>
                     <p>for i in range(1, num + 1):</p>
                     <p>factorial *= i</p>
                     <p>print("The factorial is", factorial)</p> 
                 </div>
            </div>
        </div>

        <!-- Medium Exercises -->
        <div id="medium" class="category-content" style="display: none;">
            <div class="exercise-container" data-exercise-id="8">
                <h3>Exercise 1: Count Vowels in a String</h3>
                <p><strong>Objective:</strong> Learn how to work with strings and loops.</p>
                <p><strong>Task:</strong> Write a program that counts the number of vowels in a given string.</p>
                <p><strong>Explanation:</strong> Counting specific characters in a string is a common task. This exercise will help you understand how to process strings.</p>
                <p><strong>Sample Input:</strong> <code>"hello world"</code></p>
                <p><strong>Sample Output:</strong> <code>The number of vowels is 3</code></p>
                <p><a href="https://www.programiz.com/python-programming/online-compiler/" class="online-compiler-link" target="_blank">Write and test your code here</a> </p>
                 <!-- Mark as Solved Button -->
                 <button class="view-solution-btn">View Solution</button>
                 <button class="mark-solved-btn">Mark as done</button>
            
                 <!-- Solution Container (initially hidden) -->
                 <div class="solution" style="display: none;">
                     <p>string = "hello world"</p>
                     <p>vowels = "aeiou"</p>
                     <p>count = sum(1 for char in string if char in vowels)</p>
                     <p>print("The number of vowels is", count)</p> 
                 </div>
            </div>

            <div class="exercise-container" data-exercise-id="9">
                <h3>Exercise 2: Check Palindrome</h3>
                <p><strong>Objective:</strong> Learn how to manipulate and compare strings.</p>
                <p><strong>Task:</strong> Write a program that checks if a string is a palindrome.</p>
                <p><strong>Explanation:</strong> Palindromes are strings that read the same backward as forward. This exercise will help you understand how to compare strings.</p>
                <p><strong>Sample Input:</strong> <code>"racecar"</code></p>
                <p><strong>Sample Output:</strong> <code>The string is a palindrome</code></p>
                <p><a href="https://www.programiz.com/python-programming/online-compiler/" class="online-compiler-link" target="_blank">Write and test your code here</a> </p>
                 <!-- Mark as Solved Button -->
                 <button class="view-solution-btn">View Solution</button>
                 <button class="mark-solved-btn">Mark as done</button>
            
                 <!-- Solution Container (initially hidden) -->
                 <div class="solution" style="display: none;">
                     <p>string = "racecar"</p>
                     <p>if string == string[::-1]:</p>
                        <p>print("The string is a palindrome")</p>
                     <p>else:</p>
                     <p>   print("The string is not a palindrome")</p> 
                 </div>
            </div>

            <div class="exercise-container" data-exercise-id="10">
                <h3>Exercise 3: Find the Second Largest Number</h3>
                <p><strong>Objective:</strong> Learn how to work with lists and sorting.</p>
                <p><strong>Task:</strong> Write a program that finds the second largest number in a list.</p>
                <p><strong>Explanation:</strong> Sorting and selecting elements from a list are common tasks. This exercise will help you understand how to work with lists.</p>
                <p><strong>Sample Input:</strong> <code>[5, 1, 9, 7, 2]</code></p>
                <p><strong>Sample Output:</strong> <code>The second largest number is 7</code></p>
                <p><a href="https://www.programiz.com/python-programming/online-compiler/" class="online-compiler-link" target="_blank">Write and test your code here</a> </p>
                 <!-- Mark as Solved Button -->
                 <button class="view-solution-btn">View Solution</button>
                 <button class="mark-solved-btn">Mark as done</button>
            
                 <!-- Solution Container (initially hidden) -->
                 <div class="solution" style="display: none;">
                     <p>numbers = [5, 1, 9, 7, 2]</p>
                     <p>numbers.sort()</p>
                     <p>second_largest = numbers[-2]</p>
                     <p>print("The second largest number is", second_largest)</p> 
                 </div>
            </div>

            <div class="exercise-container" data-exercise-id="11">
                <h3>Exercise 4: Remove Duplicates from a List</h3>
                <p><strong>Objective:</strong> Learn how to manipulate lists.</p>
                <p><strong>Task:</strong> Write a program that removes duplicates from a list.</p>
                <p><strong>Explanation:</strong> Removing duplicates is a common task when working with lists. This exercise will help you understand how to process lists effectively.</p>
                <p><strong>Sample Input:</strong> <code>[1, 2, 2, 3, 4, 4, 5]</code></p>
                <p><strong>Sample Output:</strong> <code>[1, 2, 3, 4, 5]</code></p>
                <p><a href="https://www.programiz.com/python-programming/online-compiler/" class="online-compiler-link" target="_blank">Write and test your code here</a> </p>
                 <!-- Mark as Solved Button -->
                 <button class="view-solution-btn">View Solution</button>
                 <button class="mark-solved-btn">Mark as done</button>
            
                 <!-- Solution Container (initially hidden) -->
                 <div class="solution" style="display: none;">
                     <p>numbers = [1, 2, 2, 3, 4, 4, 5]</p>
                     <p>unique_numbers = list(set(numbers))</p>
                     <p>print(unique_numbers)</p> 
                 </div>
            </div>

            <div class="exercise-container" data-exercise-id="12">
                <h3>Exercise 5: Check Prime Number</h3>
                <p><strong>Objective:</strong> Learn how to solve mathematical problems.</p>
                <p><strong>Task:</strong> Write a program that checks if a number is prime.</p>
                <p><strong>Explanation:</strong> Prime numbers are numbers greater than 1 that have no divisors other than 1 and themselves. This exercise will help you understand how to solve mathematical problems.</p>
                <p><strong>Sample Input:</strong> <code>13</code></p>
                <p><strong>Sample Output:</strong> <code>The number is prime</code></p>
                <p><a href="https://www.programiz.com/python-programming/online-compiler/" class="online-compiler-link" target="_blank">Write and test your code here</a> </p>
                 <!-- Mark as Solved Button -->
                 <button class="view-solution-btn">View Solution</button>
                 <button class="mark-solved-btn">Mark as done</button>
            
                 <!-- Solution Container (initially hidden) -->
                 <div class="solution" style="display: none;">
                     <p>num = 13</p>
                     <p>if num > 1:</p>
                     <p>for i in range(2, num):</p>
                        <p>if num % i == 0:</p>
                            <p>print("The number is not prime")</p>
                            <p> break</p>
                            <p> else:</p>
                                <p>print("The number is prime")</p>
                                <p>else:</p>
                                    <p>print("The number is not prime")</p> 
                 </div>
            </div>

            <div class="exercise-container" data-exercise-id="13">
                <h3>Exercise 6: Count Words in a String</h3>
                <p><strong>Objective:</strong> Learn how to process strings.</p>
                <p><strong>Task:</strong> Write a program that counts the number of words in a given string.</p>
                <p><strong>Explanation:</strong> Counting words is a common task in text processing. This exercise will help you understand how to work with strings.</p>
                <p><strong>Sample Input:</strong> <code>"Hello world, how are you?"</code></p>
                <p><strong>Sample Output:</strong> <code>The number of words is 5</code></p>
                <p><a href="https://www.programiz.com/python-programming/online-compiler/" class="online-compiler-link" target="_blank">Write and test your code here</a> </p>
                 <!-- Mark as Solved Button -->
                 <button class="view-solution-btn">View Solution</button>
                 <button class="mark-solved-btn">Mark as done</button>
            
                 <!-- Solution Container (initially hidden) -->
                 <div class="solution" style="display: none;">
                     <p>string = "Hello world, how are you?"</p>
                     <p>words = string.split()</p>
                     <p>word_count = len(words)</p>
                     <p>print("The number of words is", word_count)</p> 
                 </div>
            </div>

            <div class="exercise-container" data-exercise-id="14">
                <h3>Exercise 7: Find the Longest Word</h3>
                <p><strong>Objective:</strong> Learn how to work with strings and lists.</p>
                <p><strong>Task:</strong> Write a program that finds the longest word in a given string.</p>
                <p><strong>Explanation:</strong> Finding the longest word is a common task in text processing. This exercise will help you understand how to manipulate strings and lists.</p>
                <p><strong>Sample Input:</strong> <code>"Python is a great programming language"</code></p>
                <p><strong>Sample Output:</strong> <code>The longest word is "programming"</code></p>
                <p><a href="https://www.programiz.com/python-programming/online-compiler/" class="online-compiler-link" target="_blank">Write and test your code here</a> </p>
                 <!-- Mark as Solved Button -->
                 <button class="view-solution-btn">View Solution</button>
                 <button class="mark-solved-btn">Mark as done</button>
            
                 <!-- Solution Container (initially hidden) -->
                 <div class="solution" style="display: none;">
                     <p>string = "Python is a great programming language"</p>
                     <p>words = string.split()</p>
                     <p>longest_word = max(words, key=len)</p>
                     <p>print("The longest word is", longest_word)</p> 
                 </div>
            </div>
        </div>

        <!-- Hard Exercises -->
        <div id="hard" class="category-content" style="display: none;">
            <div class="exercise-container" data-exercise-id="15">
                <h3>Exercise 1: Reverse a List</h3>
                <p><strong>Objective:</strong> Learn how to manipulate lists.</p>
                <p><strong>Task:</strong> Write a program that reverses a given list.</p>
                <p><strong>Explanation:</strong> Reversing a list is a common task in programming. This exercise will help you understand how to manipulate lists effectively.</p>
                <p><strong>Sample Input:</strong> <code>[1, 2, 3, 4, 5]</code></p>
                <p><strong>Sample Output:</strong> <code>[5, 4, 3, 2, 1]</code></p>
                <p><a href="https://www.programiz.com/python-programming/online-compiler/" class="online-compiler-link" target="_blank">Write and test your code here</a></p>
                 <!-- Mark as Solved Button -->
                 <button class="view-solution-btn">View Solution</button>
                 <button class="mark-solved-btn">Mark as done</button>
            
                 <!-- Solution Container (initially hidden) -->
                 <div class="solution" style="display: none;">
                     <p>lst = [1, 2, 3, 4, 5]</p>
                     <p>reversed_lst = lst[::-1]</p>
                     <p>print(reversed_lst)</p> 
                 </div>
            </div>

            <div class="exercise-container" data-exercise-id="16">
                <h3>Exercise 2: Find the Missing Number</h3>
                <p><strong>Objective:</strong> Learn how to solve problems using logic.</p>
                <p><strong>Task:</strong> Write a program that finds the missing number in a sequence of numbers from 1 to n.</p>
                <p><strong>Explanation:</strong> Finding missing numbers is a common problem in programming. This exercise will help you understand how to solve problems using logic.</p>
                <p><strong>Sample Input:</strong> <code>[1, 2, 3, 5]</code></p>
                <p><strong>Sample Output:</strong> <code>The missing number is 4</code></p>
                <p><a href="https://www.programiz.com/python-programming/online-compiler/" class="online-compiler-link" target="_blank">Write and test your code here</a></p>
                 <!-- Mark as Solved Button -->
                 <button class="view-solution-btn">View Solution</button>
                 <button class="mark-solved-btn">Mark as done</button>
            
                 <!-- Solution Container (initially hidden) -->
                 <div class="solution" style="display: none;">
                     <p>numbers = [1, 2, 3, 5]</p>
                     <p>n = len(numbers) + 1</p>
                     <p>expected_sum = n * (n + 1) // 2</p>
                     <p>actual_sum = sum(numbers)</p>
                     <p>missing_number = expected_sum - actual_sum</p>
                     <p>print("The missing number is", missing_number)</p> 
                 </div>
            </div>

            <div class="exercise-container" data-exercise-id="17">
                <h3>Exercise 3: Check Anagrams</h3>
                <p><strong>Objective:</strong> Learn how to compare and manipulate strings.</p>
                <p><strong>Task:</strong> Write a program that checks if two strings are anagrams.</p>
                <p><strong>Explanation:</strong> Anagrams are words or phrases formed by rearranging the letters of another. This exercise will help you understand how to compare strings.</p>
                <p><strong>Sample Input:</strong> <code>"listen", "silent"</code></p>
                <p><strong>Sample Output:</strong> <code>The strings are anagrams</code></p>
                <p><a href="https://www.programiz.com/python-programming/online-compiler/" class="online-compiler-link" target="_blank">Write and test your code here</a></p>
                 <!-- Mark as Solved Button -->
                 <button class="view-solution-btn">View Solution</button>
                 <button class="mark-solved-btn">Mark as done</button>
            
                 <!-- Solution Container (initially hidden) -->
                 <div class="solution" style="display: none;">
                     <p>string1 = "listen"</p>
                     <p>string2 = "silent"</p>
                     <p>if sorted(string1) == sorted(string2):</p>
                        <p>print("The strings are anagrams")</p>
                        <p>else:</p>
                            <p>print("The strings are not anagrams")</p> 
                 </div>
            </div>

            <div class="exercise-container" data-exercise-id="18">
                <h3>Exercise 4: Find the First Non-Repeating Character</h3>
                <p><strong>Objective:</strong> Learn how to process strings efficiently.</p>
                <p><strong>Task:</strong> Write a program that finds the first non-repeating character in a string.</p>
                <p><strong>Explanation:</strong> Finding unique characters is a common task in string processing. This exercise will help you understand how to process strings efficiently.</p>
                <p><strong>Sample Input:</strong> <code>"swiss"</code></p>
                <p><strong>Sample Output:</strong> <code>The first non-repeating character is 'w'</code></p>
                <p><a href="https://www.programiz.com/python-programming/online-compiler/" class="online-compiler-link" target="_blank">Write and test your code here</a></p>
                 <!-- Mark as Solved Button -->
                 <button class="view-solution-btn">View Solution</button>
                 <button class="mark-solved-btn">Mark as done</button>
            
                 <!-- Solution Container (initially hidden) -->
                 <div class="solution" style="display: none;">
                     <p>string = "swiss"</p>
                     <p>for char in string:</p>
                        <p>if string.count(char) == 1:</p>
                            <p>print("The first non-repeating character is", char)</p>
                            <p>break</p> 
                 </div>
            </div>

            <div class="exercise-container" data-exercise-id="19">
                <h3>Exercise 5: Find the Longest Substring Without Repeating Characters</h3>
                <p><strong>Objective:</strong> Learn how to solve complex string problems.</p>
                <p><strong>Task:</strong> Write a program that finds the length of the longest substring without repeating characters.</p>
                <p><strong>Explanation:</strong> Substrings are sequences of characters within a string. This exercise will help you understand how to solve complex string problems.</p>
                <p><strong>Sample Input:</strong> <code>"abcabcbb"</code></p>
                <p><strong>Sample Output:</strong> <code>The length of the longest substring is 3</code></p>
                <p><a href="https://www.programiz.com/python-programming/online-compiler/" class="online-compiler-link" target="_blank">Write and test your code here</a></p>
                 <!-- Mark as Solved Button -->
                 <button class="view-solution-btn">View Solution</button>
                 <button class="mark-solved-btn">Mark as done</button>
            
                 <!-- Solution Container (initially hidden) -->
                 <div class="solution" style="display: none;">
                     <p>string = "abcabcbb"</p>
                     <p>start = 0</p>
                     <p>max_length = 0</p>
                     <p>seen_chars = {}</p>

                     <p>for end in range(len(string)):</p>
                     <p>if string[end] in seen_chars and seen_chars[string[end]] >= start:</p>
                     <p>start = seen_chars[string[end]] + 1</p>
                     <p>seen_chars[string[end]] = end</p>
                     <p>max_length = max(max_length, end - start + 1)</p>

                    <p>print("The length of the longest substring is", max_length)</p> 
                 </div>
            </div>

            <div class="exercise-container" data-exercise-id="20">
                <h3>Exercise 6: Find the Intersection of Two Lists</h3>
                <p><strong>Objective:</strong> Learn how to work with lists and sets.</p>
                <p><strong>Task:</strong> Write a program that finds the intersection of two lists.</p>
                <p><strong>Explanation:</strong> Finding common elements between two lists is a common task. This exercise will help you understand how to work with lists and sets.</p>
                <p><strong>Sample Input:</strong> <code>[1, 2, 3, 4], [3, 4, 5, 6]</code></p>
                <p><strong>Sample Output:</strong> <code>The intersection is [3, 4]</code></p>
                <p><a href="https://www.programiz.com/python-programming/online-compiler/" class="online-compiler-link" target="_blank">Write and test your code here</a></p>
                 <!-- Mark as Solved Button -->
                 <button class="view-solution-btn">View Solution</button>
                 <button class="mark-solved-btn">Mark as done</button>
            
                 <!-- Solution Container (initially hidden) -->
                 <div class="solution" style="display: none;">
                     <p>list1 = [1, 2, 3, 4]</p>
                     <p>list2 = [3, 4, 5, 6]</p>
                     <p>intersection = list(set(list1) & set(list2))</p>
                     <p>print("The intersection is", intersection)</p> 
                 </div>
            </div>

            <div class="exercise-container" data-exercise-id="21">
                <h3>Exercise 7: Count the Frequency of Elements in a List</h3>
                <p><strong>Objective:</strong> Learn how to work with dictionaries and lists.</p>
                <p><strong>Task:</strong> Write a program that counts the frequency of each element in a list.</p>
                <p><strong>Explanation:</strong> Counting the frequency of elements is a common task in data processing. This exercise will help you understand how to work with dictionaries and lists.</p>
                <p><strong>Sample Input:</strong> <code>[1, 2, 2, 3, 3, 3]</code></p>
                <p><strong>Sample Output:</strong> <code>{1: 1, 2: 2, 3: 3}</code></p>
                <p><a href="https://www.programiz.com/python-programming/online-compiler/" class="online-compiler-link" target="_blank">Write and test your code here</a> </p>
                 <!-- Mark as Solved Button -->
                 <button class="view-solution-btn">View Solution</button>
                 <button class="mark-solved-btn">Mark as done</button>
            
                 <!-- Solution Container (initially hidden) -->
                 <div class="solution" style="display: none;">
                     <p>lst = [1, 2, 2, 3, 3, 3]</p>
                     <p>frequency = {}</p>
                     <p>for num in lst:</p>
                     <p>  if num in frequency:</p>
                     <p>     frequency[num] += 1</p>
                     <p>  else:</p>
                     <p>     frequency[num] = 1</p>
                     <p>print(frequency)</p> 
                 </div>
            </div>
        </div>

        <!-- Recommendations Section -->
        <div class="recommendations">
            <h2>Recommended Platforms</h2>
            <p>Check out these platforms for more Python exercises and challenges:</p>
            <ul>
                <li><a href="https://leetcode.com/" target="_blank">LeetCode</a></li>
                <li><a href="https://codeforces.com/" target="_blank">Codeforces</a></li>
                <li><a href="https://www.hackerrank.com/" target="_blank">HackerRank</a></li>
                <li><a href="https://www.codewars.com/" target="_blank">Codewars</a></li>
            </ul>
        </div>
        <h2>Congratulations! 🎉</h2>
        <p>You've solved all the exercises</p>
        
        
        <p>Keep practicing and solving more to become a Python pro!</p>
        <a href="homepage2.php" class="btn btn-primary">Return to Homepage</a>
    </div>
    </div>
    <button id="back-to-top" class="btn-back-to-top" onclick="scrollToTop()">↑</button>
    
    <footer class="footer">
        <p>&copy; 2025 PyByte. All rights reserved.</p>
    </footer>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
    // Get all exercise containers
    const containers = document.querySelectorAll(".exercise-container");
    
    containers.forEach(container => {
        const exerciseId = container.dataset.exerciseId;
        const button = container.querySelector(".mark-solved-btn");
        
        const isSolved = localStorage.getItem(`exercise-${exerciseId}`) === "true";
        
        // Apply visual state if already solved
        if (isSolved) {
            container.classList.add("solved");
            button.textContent = "✓ Done";
        }
        
        //TOGGLE STATE ON BUTTON CLICK 
        button.addEventListener("click", () => {
            // Toggle the solved state
            const isNowSolved = !container.classList.contains("solved");
            
            // Update UI immediately
            container.classList.toggle("solved", isNowSolved);
            button.textContent = isNowSolved ? "✓ Done" : "Mark as done";
            
            // Save to localStorage
            localStorage.setItem(`exercise-${exerciseId}`, isNowSolved);
        });
    });
});
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
</body>
</html>