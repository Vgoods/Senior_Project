<?php
session_start();

if(!isset($_SESSION['user_id'])) {
    header("Location: SAA_Login_Connect.php"); // Redirect to login page if not logged in
    exit();
}

if(isset($_POST['cancel_request'])) {
    $requestId = $_POST['request_id'];
    
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'test');
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }
    
    // Retrieve email of the logged-in user
    $userId = $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT email FROM register WHERE id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $userData = $result->fetch_assoc();
    $email = $userData['email'];
    
    // Delete request
    $stmt = $conn->prepare("DELETE FROM avrequest WHERE id = ? AND email = ?");
    $stmt->bind_param("is", $requestId, $email);
    $stmt->execute();
    
    // Check if deletion was successful
    if ($stmt->affected_rows > 0) {
        echo "Request canceled successfully.";
        echo "<script>window.location = 'SAA_Status.php';</script>"; // Reload the page using JavaScript
    } else {
        echo "Error canceling request. Either the request does not exist or you do not have permission to cancel it.";
    }
    
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
} else {
    echo "Invalid request.";
}
?>
