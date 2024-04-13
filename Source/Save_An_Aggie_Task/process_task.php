<?php

$mysqli = new mysqli("localhost", "root", "", "test");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_id = $_POST['task_id'];

    $move_query = "INSERT INTO actrequest SELECT * FROM avrequest WHERE id = ?";
    $move_statement = $mysqli->prepare($move_query);
    $move_statement->bind_param("i", $task_id);
    $move_result = $move_statement->execute();

    $delete_query = "DELETE FROM avrequest WHERE id = ?";
    $delete_statement = $mysqli->prepare($delete_query);
    $delete_statement->bind_param("i", $task_id);
    $delete_result = $delete_statement->execute();

    if ($move_result && $delete_result) {
        echo "Task accepted successfully";
    } else {
        echo "Error processing the task";
    }
}

$mysqli->close();
?>
