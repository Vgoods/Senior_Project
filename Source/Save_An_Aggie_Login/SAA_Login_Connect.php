<?php
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = new mysqli('localhost', 'root', '', 'test');
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT id FROM register WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt_result = $stmt->get_result();

    if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        $_SESSION['user_id'] = $data['id'];
        echo json_encode(array("message" => "Login Successfully"));
    } else {
        echo json_encode(array("error" => "Invalid Email or Password"));
    }

    $stmt->close();
    $conn->close();
?>
