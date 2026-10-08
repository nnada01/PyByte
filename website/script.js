
// Check quiz answers for the "Function" Test Your Knowlegde section
function checkQuizFunction() {
    // Correct answers 
   const answers = {
       q1: "b",
       q2: "b", 
       q3: "a", 
   };

   let score = 0;
   const form = document.getElementById("quiz-form");
   const resultDiv = document.getElementById("quiz-result");

   // Check if the selected answer is correct
   for (const question in answers) {
       const selectedOption = form.querySelector(`input[name="${question}"]:checked`);
       const correctOption = form.querySelector(`input[name="${question}"][value="${answers[question]}"]`);
       const questionDiv = correctOption.closest(".question");

       if (selectedOption) {
           if (selectedOption.value === answers[question]) {
               score++;
               // Mark correct answer (green)
               correctOption.parentNode.style.color = "green";
               correctOption.parentNode.innerHTML += " ✓"; // Optional checkmark
           } else {
               // Mark selected wrong answer (red)
               selectedOption.parentNode.style.color = "red";
               // Also show correct answer (green)
               correctOption.parentNode.style.color = "green";
               correctOption.parentNode.innerHTML += " ✓"; // Optional checkmark
           }
       } else {
           // No answer selected (highlight question or correct answer)
           questionDiv.style.borderLeft = "3px solid red"; // Optional
           correctOption.parentNode.style.color = "green"; // Show correct answer
       }
   }


   // Display result
   resultDiv.innerHTML = `You scored ${score} out of ${Object.keys(answers).length}!`;
   resultDiv.style.color = score === Object.keys(answers).length ? "green" : "red";
}
// Check quiz answers for the "Python-Basics" Test Your Knowlegde section
function checkQuizBasics() {
   const answers = {
       q1: "b", 
       q2: "b", 
       q3: "a", 
   };

   let score = 0;
   const form = document.getElementById("quiz-form");
   const resultDiv = document.getElementById("quiz-result");

   // Check if the selected answer is correct
   for (const question in answers) {
       const selectedOption = form.querySelector(`input[name="${question}"]:checked`);
       const correctOption = form.querySelector(`input[name="${question}"][value="${answers[question]}"]`);
       const questionDiv = correctOption.closest(".question");

       if (selectedOption) {
           if (selectedOption.value === answers[question]) {
               score++;
               // Mark correct answer (green)
               correctOption.parentNode.style.color = "green";
               correctOption.parentNode.innerHTML += " ✓"; // Optional checkmark
           } else {
               // Mark selected wrong answer (red)
               selectedOption.parentNode.style.color = "red";
               // Also show correct answer (green)
               correctOption.parentNode.style.color = "green";
               correctOption.parentNode.innerHTML += " ✓"; // Optional checkmark
           }
       } else {
           // No answer selected (highlight question or correct answer)
           questionDiv.style.borderLeft = "3px solid red"; // Optional
           correctOption.parentNode.style.color = "green"; // Show correct answer
       }
   }


   // Display results
   resultDiv.innerHTML = `You scored ${score} out of ${Object.keys(answers).length}!`;
   resultDiv.style.color = score === Object.keys(answers).length ? "green" : "red";
}
// Check quiz answers for the "Data Structures" Test Your Knowlegde section
function checkQuizDataStructures() {
   const answers = {
       q1: "b", 
       q2: "b", 
       q3: "b", 
   };

   let score = 0;
   const form = document.getElementById("quiz-form");
   const resultDiv = document.getElementById("quiz-result");

   // Check if the selected answer is correct
   for (const question in answers) {
       const selectedOption = form.querySelector(`input[name="${question}"]:checked`);
       const correctOption = form.querySelector(`input[name="${question}"][value="${answers[question]}"]`);
       const questionDiv = correctOption.closest(".question");

       if (selectedOption) {
           if (selectedOption.value === answers[question]) {
               score++;
               // Mark correct answer (green)
               correctOption.parentNode.style.color = "green";
               correctOption.parentNode.innerHTML += " ✓"; // Optional checkmark
           } else {
               // Mark selected wrong answer (red)
               selectedOption.parentNode.style.color = "red";
               // Also show correct answer (green)
               correctOption.parentNode.style.color = "green";
               correctOption.parentNode.innerHTML += " ✓"; // Optional checkmark
           }
       } else {
           // No answer selected (highlight question or correct answer)
           questionDiv.style.borderLeft = "3px solid red"; // Optional
           correctOption.parentNode.style.color = "green"; // Show correct answer
       }
   }

   // Display result
   resultDiv.innerHTML = `You scored ${score} out of ${Object.keys(answers).length}!`;
   resultDiv.style.color = score === Object.keys(answers).length ? "green" : "red";
}
//Check quiz answers for the "Error Handling" Test Your Knowlegde section
function checkQuizErrorHandling() {
   const answers = {
       q1: "b", 
       q2: "c", 
       q3: "a", 
   };

   let score = 0;
   const form = document.getElementById("quiz-form");
   const resultDiv = document.getElementById("quiz-result");

   // Check each question
   for (const question in answers) {
       const selectedOption = form.querySelector(`input[name="${question}"]:checked`);
       const correctOption = form.querySelector(`input[name="${question}"][value="${answers[question]}"]`);
       const questionDiv = correctOption.closest(".question");

       if (selectedOption) {
           if (selectedOption.value === answers[question]) {
               score++;
               // Mark correct answer (green)
               correctOption.parentNode.style.color = "green";
               correctOption.parentNode.innerHTML += " ✓"; // Optional checkmark
           } else {
               // Mark selected wrong answer (red)
               selectedOption.parentNode.style.color = "red";
               // Also show correct answer (green)
               correctOption.parentNode.style.color = "green";
               correctOption.parentNode.innerHTML += " ✓"; // Optional checkmark
           }
       } else {
           // No answer selected (highlight question or correct answer)
           questionDiv.style.borderLeft = "3px solid red"; // Optional
           correctOption.parentNode.style.color = "green"; // Show correct answer
       }
   }


   // Display result
   resultDiv.innerHTML = `You scored ${score} out of ${Object.keys(answers).length}!`;
   resultDiv.style.color = score === Object.keys(answers).length ? "green" : "red";
}
// Function to handle category switching 
function showCategory(category) {
   const categories = document.querySelectorAll('.category-content');
   categories.forEach(cat => cat.style.display = 'none');

    // Display the selected category
   document.getElementById(category).style.display = 'block';

   // Update active button styling
   const buttons = document.querySelectorAll('.category-tabs button');
   buttons.forEach(btn => btn.classList.remove('active'));
   document.querySelector(`.category-tabs button[onclick="showCategory('${category}')"]`).classList.add('active');
}
// Check quiz answers for the "OOP" Test Your Knowlegde section
function checkQuizOOP() {
   const answers = {
       q1: "b", 
       q2: "b", 
       q3: "a", 
   };

   let score = 0;
   const form = document.getElementById("quiz-form");
   const resultDiv = document.getElementById("quiz-result");

   // Check each question
   for (const question in answers) {
       const selectedOption = form.querySelector(`input[name="${question}"]:checked`);
       const correctOption = form.querySelector(`input[name="${question}"][value="${answers[question]}"]`);
       const questionDiv = correctOption.closest(".question");

       if (selectedOption) {
           if (selectedOption.value === answers[question]) {
               score++;
               // Mark correct answer (green)
               correctOption.parentNode.style.color = "green";
               correctOption.parentNode.innerHTML += " ✓"; // Optional checkmark
           } else {
               // Mark selected wrong answer (red)
               selectedOption.parentNode.style.color = "red";
               // Also show correct answer (green)
               correctOption.parentNode.style.color = "green";
               correctOption.parentNode.innerHTML += " ✓"; // Optional checkmark
           }
       } else {
           // No answer selected (highlight question or correct answer)
           questionDiv.style.borderLeft = "3px solid red"; // Optional
           correctOption.parentNode.style.color = "green"; // Show correct answer
       }
   }


   // Display result
   resultDiv.innerHTML = `You scored ${score} out of ${Object.keys(answers).length}!`;
   resultDiv.style.color = score === Object.keys(answers).length ? "green" : "red";
}

// Check quiz answers for the "Attributes" Test Your Knowlegde section
function checkQuizAttributes() {
   const answers = {
       q1: "b", 
       q2: "b", 
       q3: "b", 
   };

   let score = 0;
   const form = document.getElementById("quiz-form");
   const resultDiv = document.getElementById("quiz-result");

   // Check each question
   for (const question in answers) {
       const selectedOption = form.querySelector(`input[name="${question}"]:checked`);
       const correctOption = form.querySelector(`input[name="${question}"][value="${answers[question]}"]`);
       const questionDiv = correctOption.closest(".question");

       if (selectedOption) {
           if (selectedOption.value === answers[question]) {
               score++;
               // Mark correct answer (green)
               correctOption.parentNode.style.color = "green";
               correctOption.parentNode.innerHTML += " ✓"; // Optional checkmark
           } else {
               // Mark selected wrong answer (red)
               selectedOption.parentNode.style.color = "red";
               // Also show correct answer (green)
               correctOption.parentNode.style.color = "green";
               correctOption.parentNode.innerHTML += " ✓"; // Optional checkmark
           }
       } else {
           // No answer selected (highlight question or correct answer)
           questionDiv.style.borderLeft = "3px solid red"; // Optional
           correctOption.parentNode.style.color = "green"; // Show correct answer
       }
   }


   // Display result
   resultDiv.innerHTML = `You scored ${score} out of ${Object.keys(answers).length}!`;
   resultDiv.style.color = score === Object.keys(answers).length ? "green" : "red";
}
// Check quiz answers for the "Inheritance" Test Your Knowlegde section
function checkQuizInheritance() {
   const answers = {
       q1: "b", // Correct answer for question 1
       q2: "b", // Correct answer for question 2
       q3: "b", // Correct answer for question 3
   };

   let score = 0;
   const form = document.getElementById("quiz-form");
   const resultDiv = document.getElementById("quiz-result");

   // Check each question
   for (const question in answers) {
       const selectedOption = form.querySelector(`input[name="${question}"]:checked`);
       const correctOption = form.querySelector(`input[name="${question}"][value="${answers[question]}"]`);
       const questionDiv = correctOption.closest(".question");

       if (selectedOption) {
           if (selectedOption.value === answers[question]) {
               score++;
               // Mark correct answer (green)
               correctOption.parentNode.style.color = "green";
               correctOption.parentNode.innerHTML += " ✓"; // Optional checkmark
           } else {
               // Mark selected wrong answer (red)
               selectedOption.parentNode.style.color = "red";
               // Also show correct answer (green)
               correctOption.parentNode.style.color = "green";
               correctOption.parentNode.innerHTML += " ✓"; // Optional checkmark
           }
       } else {
           // No answer selected (highlight question or correct answer)
           questionDiv.style.borderLeft = "3px solid red"; // Optional
           correctOption.parentNode.style.color = "green"; // Show correct answer
       }
   }


   // Display result
   resultDiv.innerHTML = `You scored ${score} out of ${Object.keys(answers).length}!`;
   resultDiv.style.color = score === Object.keys(answers).length ? "green" : "red";
}
// Check quiz answers for the "Control-Flow" Test Your Knowlegde section
function checkQuizContolFlow() {
   const answers = {
       q1: "a", // Correct answer for question 1
       q2: "b", // Correct answer for question 2
       q3: "b", // Correct answer for question 3
   };

   let score = 0;
   const form = document.getElementById("quiz-form");
   const resultDiv = document.getElementById("quiz-result");

   // Check each question
   for (const question in answers) {
       const selectedOption = form.querySelector(`input[name="${question}"]:checked`);
       const correctOption = form.querySelector(`input[name="${question}"][value="${answers[question]}"]`);
       const questionDiv = correctOption.closest(".question");

       if (selectedOption) {
           if (selectedOption.value === answers[question]) {
               score++;
               // Mark correct answer (green)
               correctOption.parentNode.style.color = "green";
               correctOption.parentNode.innerHTML += " ✓"; // Optional checkmark
           } else {
               // Mark selected wrong answer (red)
               selectedOption.parentNode.style.color = "red";
               // Also show correct answer (green)
               correctOption.parentNode.style.color = "green";
               correctOption.parentNode.innerHTML += " ✓"; // Optional checkmark
           }
       } else {
           // No answer selected (highlight question or correct answer)
           questionDiv.style.borderLeft = "3px solid red"; // Optional
           correctOption.parentNode.style.color = "green"; // Show correct answer
       }
   }


   // Display result
   resultDiv.innerHTML = `You scored ${score} out of ${Object.keys(answers).length}!`;
   resultDiv.style.color = score === Object.keys(answers).length ? "green" : "red";
}


// Block Slider Functionality
let slideIndex = 0;
const visibleBlocks = 3; // Number of blocks to show at a time

function showSlide(index) {
    const blocks = document.querySelector('.page-blocks');
    const totalBlocks = document.querySelectorAll('.page-block').length;

    // Ensure the slideIndex stays within valid bounds
    if (index >= totalBlocks - visibleBlocks + 1) slideIndex = 0;
    if (index < 0) slideIndex = totalBlocks - visibleBlocks;

    // Calculate the width of a single block including margin
    const blockWidth = document.querySelector('.page-block').offsetWidth + 20; // 20px margin
    const offset = -slideIndex * blockWidth;
    blocks.style.transform = `translateX(${offset}px)`; // Use pixels for precise control
}
// Function to move to the next slide
function nextSlide() {
    slideIndex++;
    showSlide(slideIndex);
}
// Function to move to the previous slide
function prevSlide() {
    slideIndex--;
    showSlide(slideIndex);
}

// Initialize the slider and mobile menu functionality
const mobileMenu = document.getElementById('mobile-menu');
const navLinks = document.getElementById('nav-links');

//Toggle navigation menu on mobile
mobileMenu.addEventListener('click', () => {
  navLinks.classList.toggle('active');
});

$(document).ready(function() {
   // Handle View Solution toggle
   $('.view-solution-btn').on('click', function() {
       var container = $(this).closest('.exercise-container');
       var solutionDiv = container.find('.solution');
       solutionDiv.slideToggle();
   });

});



