<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = 'examples';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// echo 'ERRRRRRRRR';
	$isPost=true;
	$message = '';
	$id = $_POST['id'];
	


		// $sql="INSERT INTO cars (name, year) VALUES ($name, $year)";
		$sql = "DELETE FROM `cars` WHERE `id`=$id";




		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $db);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		if ($conn->query($sql) === true) {
			// $message = "Delete Successfully! Click Cancel to return 'a.php' page.";
			// $color = 'success';
			echo "true";
		} else {
			// $message = "Error: " . $sql . "<br>" . $conn->error;
			// $color = 'danger';
			echo 'false';
		};
	
}



?>
