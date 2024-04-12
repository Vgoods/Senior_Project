<?php
// Connect to MySQL database
$mysqli = new mysqli("localhost", "root", "", "test");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if close-task button is clicked
    if (isset($_POST['close_task'])) {
        $task_id = $_POST['task_id'];
        
        // Delete the task from actrequest table
        $sql = "DELETE FROM actrequest WHERE id = $task_id";
        
        if ($mysqli->query($sql) === TRUE) {
            echo "Task closed successfully.";
        } else {
            echo "Error closing task: " . $mysqli->error;
        }
    }
    
    // Check if abort-task button is clicked
    if (isset($_POST['abort_task'])) {
        $task_id = $_POST['task_id'];
        
        // Move the task to avrequest table
        $sql = "INSERT INTO avrequest SELECT * FROM actrequest WHERE id = $task_id";
        
        if ($mysqli->query($sql) === TRUE) {
            // Delete the task from actrequest table
            $sql_delete = "DELETE FROM actrequest WHERE id = $task_id";
            
            if ($mysqli->query($sql_delete) === TRUE) {
                echo "Task aborted successfully.";
            } else {
                echo "Error aborting task: " . $mysqli->error;
            }
        } else {
            echo "Error aborting task: " . $mysqli->error;
        }
    }
}

// Close connection
$mysqli->close();
?>
