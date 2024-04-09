<?php

$mysqli = new mysqli("localhost", "root", "", "test");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_id = $_POST['task_id'];

    // Move task from "avrequest" to "actrequest"
    $move_query = "INSERT INTO actrequest SELECT * FROM avrequest WHERE id = ?";
    $move_statement = $mysqli->prepare($move_query);
    $move_statement->bind_param("i", $task_id);
    $move_result = $move_statement->execute();

    // Delete the task from "avrequest"
    $delete_query = "DELETE FROM avrequest WHERE id = ?";
    $delete_statement = $mysqli->prepare($delete_query);
    $delete_statement->bind_param("i", $task_id);
    $delete_result = $delete_statement->execute();

    if ($move_result && $delete_result) {
        // Task successfully processed
        echo "Task accepted successfully";
    } else {
        // Error handling
        echo "Error processing the task";
    }
}

// Close connection
$mysqli->close();
?>
