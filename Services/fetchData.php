
<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {

$servername = "localhost";
$username = "root";
$password = "";
$db = 'examples';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);
// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, name, year FROM cars";
$result = mysqli_query($conn, $sql);

$temparray = array();
$total_records = mysqli_num_rows($result);

if ($total_records >= 1) {
	while ($row = mysqli_fetch_assoc($result)) {
        $temparray[] = $row;
    } 
}   
echo json_encode($temparray);

}
?>
