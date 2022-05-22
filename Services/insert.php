<?php



if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// print_r($_POST);
	$name = $_POST["name"];
	$year = $_POST["year"];
	$id =$_POST["id"];
	$message ='';
	if (strlen($name)<5 or strlen($name)>40){
	$message = 'Error: Name must be a string with length >=5 and <=40 character.';
	$color='danger';
	echo json_encode(array('message'=> $message, 'color' => $color));
	} elseif ($year<1990 or $year >2015) {
		$message = 'Error: Year should be between 1990 and 2015';
		$color='danger';
		echo json_encode(array('message'=> $message, 'color' => $color));
	}

	else{


// $sql="INSERT INTO cars (name, year) VALUES ($name, $year)";
$sql="INSERT INTO `cars` ( `id`,`name`, `year`) VALUES ('$id','$name', '$year')";


$servername = "localhost";
$username = "root";
$password = "";
$db ='examples';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if ($conn->query($sql)===true){
	$message ='Successfully!';
	$color='success';

} else{
	// print_r(strpos('Duplicate',$conn->error)) ;
	if (str_contains($conn->error,'Duplicate')==true) $message='Error: This ID already exists';
	else{
	$message = "Error: " . $sql . "<br>" . $conn->error;
}
	$color='danger';
}

;
echo json_encode(array('message'=> $message, 'color' => $color));
	}
}


?>