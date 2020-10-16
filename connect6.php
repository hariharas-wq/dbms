<?php
if(isset($_POST['id']) || isset($_POST['prescription_id']) || isset($_POST['customer_id']) || isset($_POST['customer_name']) || isset($_POST['age']) || isset($_POST['sex']) || isset($_POST['postal_address']) || isset($_POST['invoice_id']) || isset($_POST['phone']) || isset($_POST['date']) )
	$id = $_POST['id'];
    $prescription_id = $_POST['prescription_id'];
    $customer_id = $_POST['customer_id'];
    $customer_name = $_POST['customer_name'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $postal_address = $_POST['postal_address'];
    $invoice_id = $_POST['invoice_id'];
	$phone = $_POST['phone'];
	$date = $_POST['date'];

	// Database connection
	$conn = new mysqli('localhost','root','','pharmacy');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into prescription(id,prescription_id,customer_id,customer_name,age,sex,postal_address,invoice_id,phone,date) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("iiisissiii", $id, $prescription_id, $customer_id, $customer_name,$age,$sex,$postal_address,$invoice_id,$phone,$date);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>