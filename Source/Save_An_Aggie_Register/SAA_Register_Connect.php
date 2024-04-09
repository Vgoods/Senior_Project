<?php
	$firstName = $_POST['firstname'];
	$lastName = $_POST['lastname'];
	$email = $_POST['email'];
    $username = $_POST['username'];
	$password = $_POST['password'];

	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO register(firstName, lastName, email, username, password) VALUES (?, ?, ?, ?, ?)");
		$stmt->bind_param("sssss", $firstName, $lastName, $email, $username, $password);
		$execval = $stmt->execute();
		if ($execval === FALSE) {
		    echo "Error: " . $conn->error;
		} else {
		    echo "Registration successfully...";
		}
		$stmt->close();
		$conn->close();
	}
?>
