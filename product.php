

<?php

$host = 'localhost';
$username = "mochamood";
$password = "voipulla";
$dbname = "cafe";
$table = "product";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM $table";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {

	while($row = $result->fetch_assoc()) {
		$data[] = $row;	
	}

} else {
	echo "0 results";
}
$conn->close();

$json_data = json_encode($data, JSON_PRETTY_PRINT);


file_put_contents('data.json', $json_data);


echo "Data has been converted to JSON and saved as product.json file";
?>

