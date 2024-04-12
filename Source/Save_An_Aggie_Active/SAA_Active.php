<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Save An Aggie Task Portal</title>
    <link rel="stylesheet" href="SAA_Active.css">
</head>
<body>
    <header>
        <nav>
            <div class="container">
                <h1>Save An Aggie Task Portal</h1>
                <ul>
                    <li><a href="SAA_Home.html">Home</a></li>
                    <li><a href="SAA_Profile.html">Profile</a></li>
                    <li><a href="SAA_Request.html">Request Form</a></li>
                    <li><a href="SAA_Task.php">View Available Tasks</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <section class="task">
        <div class="container">
            <h2>Available Task</h2>

            <div class="task-grid">
                <?php
                // Connect to MySQL database
                $mysqli = new mysqli("localhost", "root", "", "test");

                // Check connection
                if ($mysqli->connect_error) {
                    die("Connection failed: " . $mysqli->connect_error);
                }

                // Query to retrieve data from "actrequest" table
                $sql = "SELECT * FROM actrequest";
                $result = $mysqli->query($sql);

                // Check if there are rows returned
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='task-item'>";
                        echo "<h3>" . $row["subject"] . "</h3>";
                        echo "<p><strong>Description:</strong> " . $row["description"] . "</p>";
                        echo "<p><strong>Posted By:</strong> " . $row["firstname"] . " " . $row["lastname"] . "</p>";
                        echo "<p><strong>Contact:</strong> " . $row["phone"] . ", " . $row["email"] . "</p>";
                        echo "<form class='close-task-form' method='post' action='process_request.php'>";
                        echo "<input type='hidden' name='task_id' value='" . $row['id'] . "'>";
                        echo "<button type='submit' class='close-task' name='close_task'>Click to Close Task</button>";
                        echo "</form>";

                        echo "<form class='abort-task-form' method='post' action='process_request.php'>";
                        echo "<input type='hidden' name='task_id' value='" . $row['id'] . "'>";
                        echo "<button type='submit' class='abort-task' name='abort_task'>Click to Abort Task</button>";
                        echo "</form>";
                        
                        echo "</div>";
                    }
                } else {
                    echo "<p>No tasks accepted at the moment.</p>";
                }

                // Close connection
                $mysqli->close();
                ?>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2024 Save An Aggie Request System</p>
        </div>
    </footer>

</body>
</html>
