<?php
    session_start();

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

        $conn = new mysqli('localhost', 'root', '', 'test');
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("SELECT firstName, lastName, email, username FROM register WHERE id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt_result = $stmt->get_result();

        if ($stmt_result->num_rows > 0) {
            $data = $stmt_result->fetch_assoc();
            echo json_encode(array("message" => "Profile Data Retrieved", "user" => $data));
        } else {
            echo json_encode(array("error" => "User not found"));
        }

        $stmt->close();
        $conn->close();
    } else {
        echo json_encode(array("error" => "User not authenticated"));
    }
?>
