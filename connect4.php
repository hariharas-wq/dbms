<?php
if(isset($_POST['name']) || isset($_POST['id']))
	$id = $_POST['id'];
	$name = $_POST['name'];
	

	// Database connection
	$conn = new mysqli('localhost','root','','pharmacy');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into paymenttypes(id,name) values(?, ?,)");
		$stmt->bind_param("is", $id, $name);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>