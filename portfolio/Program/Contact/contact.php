<?php
	$firstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $email = $_POST['Email'];
    $phoneNumber = $_POST['PhoneNumber'];
    $message = $_POST['message'];

	// Database connection
	$config = include '../config2.php';
	$conn = new mysqli($config['host'], $config['username'], $config['password'], $config['dbname']);
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into contactme(FirstName, LastName, Email, PhoneNumber, message) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssi", $firstName, $lastName, $email, $message, $phoneNumber);
		$execval = $stmt->execute();
		echo $execval;
		echo "Contacted successfully...";
		$stmt->close();
		$conn->close();
	}
?>