
<?php
	$CarManufacturer = $_POST['CarManufacturer'];
	$CarModel= $_POST['CarModel'];
	$Address = $_POST['Address'];
	$email = $_POST['email'];
	$phonenumber = $_POST['phonenumber'];

	// Database connection
	$conn = new mysqli('localhost','root','','form');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registrationform(CarManufacturer, CarModel, Address, email, phonenumber) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssi", $CarManufacturer, $CarModel, $Address, $email, $phonenumber);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>