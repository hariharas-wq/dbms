<?php
if(isset($_POST['stock_id']) || isset($_POST['drug_name']) || isset($_POST['category']) || isset($_POST['description']) || isset($_POST['company']) || isset($_POST['supplier']) || isset($_POST['quantity']) || isset($_POST['cost']) || isset($_POST['status']) || isset($_POST['date_supplied']) )
	$stock_id = $_POST['stock_id'];
    $drug_name = $_POST['drug_name'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $company = $_POST['company'];
    $supplier = $_POST['supplier'];
    $quantity = $_POST['quantity'];
    $cost = $_POST['cost'];
	$status = $_POST['status'];
	$date_supplied = $_POST['date_supplied'];

	// Database connection
	$conn = new mysqli('localhost','root','','pharmacy');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into stock(stock_id,drug_name,category,description,company,supplier,quantity,cost,status,date_supplied) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("isssssiisi", $stock_id, $drug_name, $category, $description,$company,$supplier,$quantity,$cost,$status,$date_supplied);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>