<?php
if(isset($_POST['username']) || isset($_POST['manager_id']) || isset($_POST['first_name']) || isset($_POST['last_name']) || isset($_POST['staff_id']) || isset($_POST['postal_address']) || isset($_POST['phone']) || isset($_POST['email']) || isset($_POST['password']) || isset($_POST['date']) )
	$manager_id = $_POST['manager_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $staff_id = $_POST['staff_id'];
    $postal_address = $_POST['postal_address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $username = $_POST['username'];
	$password = $_POST['password'];
	$date = $_POST['date'];

	// Database connection
	$conn = new mysqli('localhost','root','','pharmacy');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into manager(manager_id,first_name,last_name,staff_id,postal_address,phone,email,username,password,date) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("issssssssi", $manager_id, $first_name, $last_name, $staff_id,$postal_address,$phone,$email,$username,$password,$date);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>