<?php
if(isset($_POST['invoice_id']) || isset($_POST['customer_name']) || isset($_POST['served_by']) || isset($_POST['status']) || isset($_POST['date']))
	$invoice_id = $_POST['invoice_id'];
	$customer_name = $_POST['customer_name'];
	$served_by = $_POST['served_by'];
	$status = $_POST['status'];
	$date = $_POST['date']

	// Database connection
	$conn = new mysqli('localhost','root','','pharmacy');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into invoice(invoice_id,customer_name,served_by,status,date) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("isssi", $invoice_id, $customer_name, $served_by,$status,$date);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>