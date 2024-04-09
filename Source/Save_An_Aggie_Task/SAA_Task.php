<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Save An Aggie Task Portal</title>
    <link rel="stylesheet" href="SAA_Task.css">
    <style>
        header {
            transition: top 0.3s ease-in-out;
        }
    </style>
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
                    <li><a href="SAA_Active.php">View Your Tasks</a></li>
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

                // Query to retrieve data from "avrequest" table
                $sql = "SELECT * FROM avrequest";
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
                        echo "<form class='accept-task-form' method='post' action='process_task.php'>";
                        echo "<input type='hidden' name='task_id' value='" . $row['id'] . "'>";
                        echo "<button type='submit' class='accept-task'>Click to Accept Task</button>";
                        echo "</form>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No tasks available at the moment.</p>";
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

    <script defer src="SAA_Task.js"></script>
</body>
</html>
