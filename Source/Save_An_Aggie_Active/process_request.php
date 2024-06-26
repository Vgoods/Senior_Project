<?php
$mysqli = new mysqli("localhost", "root", "", "test");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['close_task'])) {
        $task_id = $_POST['task_id'];

        $sql_select = "SELECT * FROM actrequest WHERE id = $task_id";
        $result = $mysqli->query($sql_select);
        
        if ($result && $result->num_rows > 0) {
            $task_data = $result->fetch_assoc();
            
            $sql_insert = "INSERT INTO fnrequest (subject, description, firstname, lastname, phone, email) 
                            VALUES ('" . $task_data['subject'] . "', '" . $task_data['description'] . "', '" . $task_data['firstname'] . "', '" . $task_data['lastname'] . "', '" . $task_data['phone'] . "', '" . $task_data['email'] . "')";
            
            if ($mysqli->query($sql_insert) === TRUE) {
                $sql_delete = "DELETE FROM actrequest WHERE id = $task_id";
                
                if ($mysqli->query($sql_delete) === TRUE) {
                    header("Location: SAA_Active.php"); 
                    exit;
                } else {
                    echo "Error closing task: " . $mysqli->error;
                }
            } else {
                echo "Error closing task: " . $mysqli->error;
            }
        } else {
            echo "Error retrieving task data: " . $mysqli->error;
        }
    }

    if (isset($_POST['abort_task'])) {
        $task_id = $_POST['task_id'];
        
        $sql = "INSERT INTO avrequest SELECT * FROM actrequest WHERE id = $task_id";
        
        if ($mysqli->query($sql) === TRUE) {
            $sql_delete = "DELETE FROM actrequest WHERE id = $task_id";
            
            if ($mysqli->query($sql_delete) === TRUE) {
                header("Location: SAA_Active.php"); 
                exit;
            } else {
                echo "Error aborting task: " . $mysqli->error;
            }
        } else {
            echo "Error aborting task: " . $mysqli->error;
        }
    }
}

$mysqli->close();
?>
