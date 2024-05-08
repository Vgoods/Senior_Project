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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Status</title>
    <link rel="stylesheet" href="SAA_Status.css"> 
</head>
<body>
<header>
    <nav>
      <div class="container">
        <h1>Save An Aggie</h1>
        <ul>
          <li><a href="SAA_Home.html">Home</a></li>
          <li><a href="SAA_Profile.html">Profile</a></li>
          <li><a href="SAA_About.html">About</a></li>
          <li><a href="SAA_Task.php">Help An Aggie</a></li>
        </ul>
      </div>
    </nav>
  </header>

<?php

$stmt = $conn->prepare("SELECT * FROM avrequest WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

echo "<div class='request-grid-container'>";
while ($row = $result->fetch_assoc()) {
    echo "<div class='request-container'>";
    echo "<div class='request-title'>Subject: " . $row['subject'] . "</div>";
    echo "<div class='request-description'>Description: " . $row['description'] . "</div>";
    echo "<div class='request-status'>Status: Active... Awaiting Request Acceptance</div>";
    echo "<form method='post' action='cancel_request.php'>";
    echo "<input type='hidden' name='request_id' value='" . $row['id'] . "'>";
    echo "<input type='submit' name='cancel_request' value='Cancel Request' class='cancel-button'>";
    echo "</form>";
    echo "</div>";
}

$stmt = $conn->prepare("SELECT * FROM actrequest WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    echo "<div class='request-container'>";
    echo "<div class='request-title'>Subject: " . $row['subject'] . "</div>";
    echo "<div class='request-description'>Description: " . $row['description'] . "</div>";
    echo "<div class='request-status'>Status: In Progress</div>";
    echo "<form method='post' action='cancel_request.php'>";
    echo "<input type='hidden' name='request_id' value='" . $row['id'] . "'>";
    echo "<input type='submit' name='cancel_request' value='Cancel Request' class='cancel-button'>";
    echo "</form>";
    echo "</div>";
}

$stmt = $conn->prepare("SELECT * FROM fnrequest WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    echo "<div class='request-container'>";
    echo "<div class='request-title'>Subject: " . $row['subject'] . "</div>";
    echo "<div class='request-description'>Description: " . $row['description'] . "</div>";
    echo "<div class='request-status'>Status: Closed</div>";
    echo "</div>";
}
echo "</div>";

$stmt->close();
$conn->close();
?>

<footer>
    <div class="container">
      <p>&copy; 2024 Save An Aggie</p>
    </div>
  </footer>

</body>
</html>
