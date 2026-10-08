<?php
include("connect.php");

//Function to mark a tutorial as completed
function markTutorialCompleted($userId, $tutorialId) {
    global $conn;
    
    $query = "INSERT INTO user_progress (user_id, tutorial_id, completed, completed_at) 
              VALUES (?, ?, TRUE, NOW())
              ON DUPLICATE KEY UPDATE completed = TRUE, completed_at = NOW()";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("is", $userId, $tutorialId);
    return $stmt->execute();
}

//Function to check if a tutorial is completed
function isTutorialCompleted($userId, $tutorialId) {
    global $conn;
    
    $query = "SELECT completed FROM user_progress 
              WHERE user_id = ? AND tutorial_id = ?";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("is", $userId, $tutorialId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return (bool)$row['completed'];
    }
    return false;
}

//Function to get all completed tutorials for a user
function getCompletedTutorials($userId) {
    global $conn;
    
    $query = "SELECT tutorial_id FROM user_progress 
              WHERE user_id = ? AND completed = TRUE";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $completed = array();
    while ($row = $result->fetch_assoc()) {
        $completed[] = $row['tutorial_id'];
    }
    return $completed;
}
?>