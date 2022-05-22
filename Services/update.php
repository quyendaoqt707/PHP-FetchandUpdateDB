<?php
$servername = "localhost";
$username = "root";
$password = "";
$db ='examples';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST["name"];
	$year = $_POST["year"];
	$id =$_POST["id"];
	$message ='';
	if (strlen($name)<5 or strlen($name)>40){
	$message = 'Error: Name must be a string with length >=5 and <=40 character.';
	$color='danger';
	echo json_encode(array('message'=> $message, 'color' => $color));
	}

	if ($year<1990 or $year >2020) {
		$message = 'Error: Year should be between 1990 and 2022';
		$color='danger';
		echo json_encode(array('message'=> $message, 'color' => $color));
	}
	
	else{


// $sql="INSERT INTO cars (name, year) VALUES ($name, $year)";
$sql="UPDATE `cars` SET `name`= '$name', `year` ='$year' WHERE `id`=$id";




// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if ($conn->query($sql)===true){
	$message ="Update Successfully!";
	$color='success';

} else{
	$message = "Error: " . $sql . "<br>" . $conn->error;
	$color='danger';
}

;
echo json_encode(array('message'=> $message, 'color' => $color));
	}
} 



