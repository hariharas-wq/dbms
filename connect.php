<?php
if(isset($_POST['username']))
	$admin_id = $_POST['admin_id'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$date = $_POST['date'];

	// Database connection
	$conn = new mysqli('localhost','root','','pharmacy');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into admin(admin_id,username,password,date) values(?, ?, ?, ?)");
		$stmt->bind_param("issi", $admin_id, $username, $password, $date);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>