<?php
	$subject = $_POST['subject'];
	$description = $_POST['description'];
    $firstName = $_POST['firstname'];
	$lastName = $_POST['lastname'];
	$phone = $_POST['phone'];
    $email = $_POST['email'];

	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO avrequest(subject, description, firstName, lastName, phone, email) VALUES (?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssss", $subject, $description, $firstName, $lastName, $phone, $email);
		$execval = $stmt->execute();
		if ($execval === FALSE) {
		    echo "Error: " . $conn->error;
		} else {
		    echo "Request successfully...";
		}
		$stmt->close();
		$conn->close();
	}
?>
