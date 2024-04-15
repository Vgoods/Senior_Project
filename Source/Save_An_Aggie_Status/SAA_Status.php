<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: SAA_Login_Connect.php");
    exit();
}

$conn = new mysqli('localhost', 'root', '', 'test');
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

$userId = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT email FROM register WHERE id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$userData = $result->fetch_assoc();
$email = $userData['email'];

$stmt = $conn->prepare("SELECT * FROM avrequest WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    echo "Subject: " . $row['subject'] . "<br>";
    echo "Description: " . $row['description'] . "<br>";
    echo "Status: Active. Awaiting Request Acceptance<br>"; 

    echo "<form method='post' action='cancel_request.php'>";
    echo "<input type='hidden' name='request_id' value='" . $row['id'] . "'>";
    echo "<input type='submit' name='cancel_request' value='Cancel Request'>";
    echo "</form>";

    echo "<br>";
}

$stmt = $conn->prepare("SELECT * FROM actrequest WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    echo "Subject: " . $row['subject'] . "<br>";
    echo "Description: " . $row['description'] . "<br>";
    echo "Status: In Progress<br>"; 

    echo "<form method='post' action='cancel_request.php'>";
    echo "<input type='hidden' name='request_id' value='" . $row['id'] . "'>";
    echo "<input type='submit' name='cancel_request' value='Cancel Request'>";
    echo "</form>";

    echo "<br>";
}

$stmt = $conn->prepare("SELECT * FROM fnrequest WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    echo "Subject: " . $row['subject'] . "<br>";
    echo "Description: " . $row['description'] . "<br>";
    
    echo "<form>";
    echo "Status: Closed";
    echo "</form>";

    echo "<br>";
}

$stmt->close();
$conn->close();
?>
